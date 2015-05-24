<!-- boards -->
<section id="content" class="">
    <section id="right">
        <?php
            include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo $adv->label; ?> 
        <span><?php echo T::get ('work.by'); ?></span> 
        <?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$adv->empl_id)), $adv->employer->user->fullname); ?>
        <span><?php echo T::get ('work.on'); ?></span>
        <?php echo Html::getDate ($adv->created); ?>.
        <span><?php $sv = System::getConfig ('statusVals'); echo $sv[$adv->status]; ?></span>
    </h1></header>
    <article><p><?php echo $adv->description; ?></p></article>
    
    <!-- assigned applications -->
    <?php if ($adv->givenApplications) { ?>
        <header><h1><?php echo T::get ('Assigned'); ?></h1></header>
        <?php foreach ($adv->givenApplications as $appl): ?>
            <article>
                <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('students/person/'.$appl->from->id)), $appl->from->fullname); ?>
                    <span><?php echo T::get ('work.on'); ?></span>
                    <?php echo Html::getDate ($appl->created); ?>.
                    <?php echo '<span>'.T::get ('working_from').'</span> '.Html::getDate ($appl->worked_from); ?>
                    <?php if (System::$user->checkAccess ('moderator') || System::$user->id == $appl->frlnc_id) { ?>
                    <span class="controls">
                        <img onclick="popup({r: 'boards/edit_post/<?php echo $appl->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                        <?php if (System::$user->checkAccess ('moderator')) { ?>
                            <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delete_post/'.$appl->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                        <?php } ?>
                    </span>
                    <?php } ?>
                </h2>
                <aside><?php echo $appl->from->freelancer->short_descr; ?></aside>
                <p><?php echo $appl->description; ?></p>
                <?php if ($adv->empl_id == System::$user->id) { ?>
                    <aside>
                    <?php 
                        echo Html::getLink (array ('href' => '#', 'onclick' => "popup({r: 'boards/finish/".$appl->id."'})"), T::get ('Mark as completed')); 
                        echo Html::getLink (array ('href' => Html::getUrl ('boards/decline/'.$appl->id)), T::get ('Decline')); 
                    ?>
                    </aside>
                <?php } ?>
            </article>
        <?php endforeach; ?>
    <?php } ?>
    
    <!-- aplications -->
    <header><h1><?php echo T::get ('Applications'); ?></h1></header>
    <?php if ($adv->openApplications) foreach ($adv->openApplications as $appl): ?>
        <article>
            <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('students/person/'.$appl->from->id)), $appl->from->fullname); ?>
                <span><?php echo T::get ('work.on'); ?></span>
                <?php echo Html::getDate ($appl->created); ?>.
                <?php if (System::$user->checkAccess ('moderator') || System::$user->id == $appl->frlnc_id) { ?>
                <span class="controls">
                    <img onclick="popup({r: 'boards/edit_post/<?php echo $appl->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                    <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delete_post/'.$appl->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                </span>
                <?php } ?>
            </h2>
            <aside><?php echo $appl->from->freelancer->short_descr; ?></aside>
            <p><?php echo $appl->description; ?></p>
            <?php if ($adv->empl_id == System::$user->id) { ?>
                <aside>
                <?php 
                    echo Html::getLink (array ('href' => Html::getUrl ('boards/accept/'.$appl->id)), T::get ('Accept')); 
                    echo Html::getLink (array ('href' => Html::getUrl ('boards/accept_one/'.$appl->id)), T::get ('Accept and Close hiring')); 
                    echo Html::getLink (array ('href' => Html::getUrl ('boards/decline/'.$appl->id)), T::get ('Decline')); 
                ?>
                </aside>
            <?php } ?>
        </article>
    <?php endforeach; else { ?>
        <article><?php echo T::get ('no_applications'); ?></article>
    <?php } ?>
    
    <!-- complete applications -->
    <?php if ($adv->completedApplications) { ?>
        <header><h1><?php echo T::get ('Completed'); ?></h1></header>
        <?php foreach ($adv->completedApplications as $appl): ?>
            <article>
                <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('students/person/'.$appl->from->id)), $appl->from->fullname); ?>
                    <span><?php echo T::get ('work.on'); ?></span>
                    <?php echo Html::getDate ($appl->created); ?>.
                    <?php echo '<span>'.T::get ('declined').'</span>'; ?>
                    <?php if (System::$user->checkAccess ('moderator') || System::$user->id == $appl->frlnc_id) { ?>
                    <span class="controls">
                        <img onclick="popup({r: 'boards/edit_post/<?php echo $appl->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                        <?php if (System::$user->checkAccess ('moderator')) { ?>
                            <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delete_post/'.$appl->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                        <?php } ?>
                    </span>
                    <?php } ?>
                </h2>
                <aside><?php echo $appl->from->freelancer->short_descr; ?></aside>
                <p><?php echo $appl->description; ?></p>
            </article>
        <?php endforeach; ?>
    <?php } ?>
    
    <!-- cancelled applications -->
    <?php if ($adv->rejectedApplications) { ?>
        <header><h1><?php echo T::get ('Declined'); ?></h1></header>
        <?php foreach ($adv->rejectedApplications as $appl): ?>
            <article>
                <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('students/person/'.$appl->from->id)), $appl->from->fullname); ?>
                    <span><?php echo T::get ('work.on'); ?></span>
                    <?php echo Html::getDate ($appl->created); ?>.
                    <?php echo '<span>'.T::get ('working_from').'</span> '.Html::getDate ($appl->worked_from); ?>
                    <?php if (System::$user->checkAccess ('moderator') || System::$user->id == $appl->frlnc_id) { ?>
                    <span class="controls">
                        <img onclick="popup({r: 'boards/edit_post/<?php echo $appl->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                        <?php if (System::$user->checkAccess ('moderator')) { ?>
                            <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delete_post/'.$appl->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                        <?php } ?>
                    </span>
                    <?php } ?>
                </h2>
                <aside><?php echo $appl->from->freelancer->short_descr; ?></aside>
                <p><?php echo $appl->description; ?></p>
                <?php if ($adv->empl_id == System::$user->id) { ?>
                    <aside>
                    <?php 
                        echo Html::getLink (array ('href' => Html::getUrl ('boards/undo/'.$appl->id)), T::get ('Undo decline')); 
                    ?>
                    </aside>
                <?php } ?>
            </article>
        <?php endforeach; ?>
    <?php } ?>
    
    <?php if ($canPost) { ?>
        <article class="clickable" onclick="popup({r: 'boards/create_post/<?php echo $adv->id; ?>'});"><?php echo T::get ('create_appl'); ?></article>
    <?php } ?>
</section>