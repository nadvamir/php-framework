<?php
    class UserController extends Controller
    {
        protected static $access = array (
            'default' => array ('user'),
            'login' => array ('guest'),
        );
        protected $defaultAction = 'dashboard';
        
        /**
         * before everything else
         */
        protected function _beforeAction ()
        {
            // categories will be used a lot
            System::registerConfig ('categories', Category::find ());
        }
        
        /**
         * index page is basically a html page.
         */
        public function indexAction ()
        {
            $this->render ('user/index');
        }
        
        /**
         * dashboard
         */
        public function dashboardAction ()
        {
            $this->render ('user/dashboard');
        }
        
        /**
         * log in
         */
        public function loginAction ()
        {
            // creating form
            $form = new LoginForm ();
            
            // retrieving
            if (!$form->retrieveData () || !$form->validate ())
                $this->render ('user/login', array ('form' => $form));
            else 
            {
                // doing ldap authorisation if needed
                $ldap = System::getConfig ('ldap');
                if ($ldap['enabled'])
                {
                    $ld = new LDAPHelper ();
                    // might want to convert everything to utf-8... but for ascii characters this shouldn't be a problem?
                    $login = (preg_match ('/[0-9]{7}./', $form->login)) ? strtoupper ($form->login) : $form->login;
                    $user = $ld->searchUser ($form->login, $form->password);
                    if (!$user)
                        throw new GameError ('Bad username or password!');
                    //$u = User::find ("login = '".$form->login."' AND pass = MD5('".$form->password."');");
                    $u = User::find ("login = '".$form->login."';");
                    
                    // if can't find such user, lets register him
                    if (!isset ($u[0]))
                    {
                        $newU = new User ();
                        $newU->login = $form->login;
                        //$newU->pass = md5 ($form->password);
                        $newU->pass = 'no password is stored';
                        $newU->fullname = $user['givenname'][0].' '.$user['sn'][0];
                        $newU->email = $user['mail'][0];
                        $newU->roles = 'freelancer';
                        $newU->save ();
                        
                        if (strpos ($newU->email, 'student') === false)
                        {
                            $newE = new Employer ();
                            $newE->id = $newU->id;
                            $newU->roles = 'employer';
                        }
                        else
                        {
                            $newF = new Freelancer ();
                            $newF->id = $newU->id;
                        }
                    }
                    // otherwise proceed with standard authentification
                }
                
                //System::$user = User::authenticate ($form->login, $form->password);
                System::$user = User::authenticate ($form->login);
                header ('Location: '.Html::getUrl ('user'));
            }
            //$this->render ('user/dashboard');
        }
        
        /**
         * log out
         */
        public function logoutAction ()
        {
            session_destroy ();
            header ('Location: '.Html::getUrl ('boards'));
        }
        
        /**
         * editting tags
         */
        public function edit_tagsAction ()
        {
            // creating the form
            $form = new TextAreaForm ();
            
            // setting right label and placeholder
            $form->setLabel ('info', 'Tags: ');
            $form->setFieldParameter ('info', 'placeholder', 'Enter tags related to you, comma-sepparated. Example: C++, NLP, Usability');
            
            // default values
            $source = (System::$user->employer) ? System::$user->employer : System::$user->freelancer;
            $form->info = $source->short_descr;
            
            // retrieving
            if (!$form->retrieveData () || !$form->validate ())
                $this->render ('user/edit', array ('form' => $form));
            else 
            {
                $source->short_descr = System::mysqlRealEscapeString ($form->info);
                $this->dashboardAction ();
            }
        }
        
        /**
         * editting description
         */
        public function edit_descrAction ()
        {
            // creating the form
            $form = new TextAreaForm ();
            
            // setting right label and placeholder
            $form->setLabel ('info', 'Description: ');
            $form->setFieldParameter ('info', 'placeholder', 'Type here what describes you best.');
            
            // default values
            $source = (System::$user->employer) ? System::$user->employer : System::$user->freelancer;
            $form->info = $source->description;
            
            // retrieving
            if (!$form->retrieveData () || !$form->validate ())
                $this->render ('user/edit', array ('form' => $form));
            else 
            {
                $source->description = System::mysqlRealEscapeString ($form->info);
                $this->dashboardAction ();
            }
        }
        
        /**
         * uploading CV
         */
        public function upload_cvAction ()
        {
            // creating the form
            $form = new FileForm ();
            
            $form->setLabel ('file', 'Your CV (.pdf): ');
            
            // retrieving
            if (!$form->retrieveData () || !$form->validate ())
                $this->render ('user/edit', array ('form' => $form));
            else 
            {
                // deleting old cv, if there was such
                if (System::$user->freelancer->cv)
                    unlink (BASE_DIR.substr (System::$user->freelancer->cv, strlen (WEB_ROOT)));
                
                System::$user->freelancer->cv = $form->file;
                System::$user->freelancer->cv_uploaded = date ('Y-m-d H:i:s');
                $this->dashboardAction ();
            }
        }
    }
?>