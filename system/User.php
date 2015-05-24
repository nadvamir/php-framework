<?php
    class User extends ActiveRecord
    {
        // table for this class
        protected static $_table = 'users';
        // relations with other tables
        protected static $_relations = array (
            'freelancer' => array (HAS_ONE, 'Freelancer', 'id'),
            'employer' => array (HAS_ONE, 'Employer', 'id'),
            'replies' => array (HAS_MANY, 'Reply', 'uid'),
            'createdWorks' => array (HAS_MANY, 'Work', 'empl_id'),
            'takenWorks' => array (HAS_MANY, 'Application', 'frlnc_id', ' AND status=1'),
            'eTags' => array (MANY_MANY, 'Tag', 'e2tag_rel', 'from_id', 'to_id'),
            'fTags' => array (MANY_MANY, 'Tag', 'f2tag_rel', 'from_id', 'to_id'),
            'eCats' => array (MANY_MANY, 'Category', 'e2cat_rel', 'from_id', 'to_id'),
            'fCats' => array (MANY_MANY, 'Category', 'f2cat_rel', 'from_id', 'to_id'),
        );
        
        /**
         * function, which performs authentication for all cases (guest, login, restore)
         */
        public static function authenticate ($login = null, $pass = null)
        {
            // standard authentification
            if ($login !== null && $pass !== null)
            {
                // login
                $login = Validators::getLoginFormat ($login);
                $pass = Validators::getPasswordFormat ($pass);
                $u = User::find ("login = '".$login."' AND pass = MD5('".$pass."');");
                // we have maximum one match, or no at all, so if we have one, we return it
                // otherwise we will have guest
                if (isset ($u[0]))
                {
                    session_regenerate_id ();
                    $_SESSION['id'] = $u[0]->getPk ();
                    //$u[0]->player->online = 1;
                    return $u[0];
                }
                else
                    throw new GameError ('Bad username or password');
            }
            // when doing ldap authentification
            else if ($login !== null)
            {
                // login
                $login = Validators::getLoginFormat ($login);
                $u = User::find ("login = '".$login."'");
                // we have maximum one match, or no at all, so if we have one, we return it
                // otherwise we will have guest
                if (isset ($u[0]))
                {
                    session_regenerate_id ();
                    $_SESSION['id'] = $u[0]->getPk ();
                    //$u[0]->player->online = 1;
                    return $u[0];
                }
                else
                    throw new GameError ('Bad username or password');
            }
            // authorising from session
            else if (isset ($_SESSION['id']))
            {
                // restore
                $_SESSION['id'] = Validators::getAlfaNum ($_SESSION['id']);
                return User::findByPk ($_SESSION['id']);
            }
            
            // else guest
            return User::getGuestUser ();
        }
        
        /**
         * gets user theme
         */
        /*public function getTheme ()
        {
            return 'default';
        }*/
        
        /**
         * returns default guest user
         */
        public static function getGuestUser ()
        {
            $guest = new User (array ('id' => 0, 'login' => 'guest', 'online' => 1, 'roles' => 'guest'));
            $guest->makeTemporary ();
            return $guest;
        }
        
        /**
         * cheks access to a specified role
         */
        public function checkAccess ($role)
        {
            $rbac = System::getConfig ('RBAC');
            $roles = explode ('|', $this->roles);
            $c = count ($roles);
            for ($i = 0; $i < $c; $i++)
            {
                if ($roles[$i] == $role)
                    return true;
                if (User::searchRBACTree ($rbac, $roles[$i], $role))
                    return true;
            }
            
            // if nothing is found
            return false;
        }
        
        /**
         * depth first search on a rbac tree for a given role
         */
        public static function searchRBACTree ($rbac, $parent, $role)
        {
            $c = count ($rbac[$parent]['children']);
            for ($i = 0; $i < $c; $i++)
            {
                if ($rbac[$parent]['children'][$i] == $role)
                    return true;
                if (User::searchRBACTree ($rbac, $rbac[$parent]['children'][$i], $role))
                    return true;
            }
            
            // if nothing is found
            return false;
        }
    }
?>