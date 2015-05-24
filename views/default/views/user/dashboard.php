<!-- dashboard -->
<section id="content">
    <section id="right">
        <?php
            //include getWidget ('hot_jobs');
            //include getWidget ('available_people');
        ?>
    </section>
    <header><h1><?php echo System::$user->fullname; ?> (<?php echo Html::getEmail (System::$user->email); ?>)</h1></header>
    
    <!-- different dashboards for freelancers and employers -->
    <?php if (System::$user->employer) { ?>
        <article>
            <span class="controls"><img onclick="popup({r: 'user/edit_tags'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /></span>
            <?php echo '<strong>'.T::get ('Tags').':</strong> '.System::$user->employer->short_descr; ?>
        </article>
        <article>
            <span class="controls"><img onclick="popup({r: 'user/edit_descr'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /></span>
            <header><h2><?php echo T::get ('person.long_descr'); ?></h2></header>
            <?php echo System::$user->employer->description; ?>
        </article>
        <header><h1><?php echo T::get ('active_assignments'); ?></h1></header>
        <section class="work_list boards">
        <?php if (System::$user->employer->activeWorks) foreach (System::$user->employer->activeWorks as $work): ?>
            <article <?php if ($work->last_reply > $work->last_seen) echo 'class="updated"'; ?>>
            <h2>
                <span class="controls">
                    <img onclick="popup({r: 'boards/edit/<?php echo $work->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                    <?php if ($work->status == 0 && !$work->givenApplications && !$work->completedApplications) { ?>
                        <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delete/'.$work->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                    <?php } ?>
                </span>
                <?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->id)), $work->label); ?>
                <span><?php echo T::get ('work.on'); ?></span>
                <?php echo Html::getDate ($work->created); ?>.
                <span><?php $sv = System::getConfig ('statusVals'); echo $sv[$work->status]; ?></span>
            </h2>
            <p><?php echo $work->excerpt; ?></p>
            </article>
        <?php endforeach; else { ?>
            <article class="inactive"><?php echo T::get ('no_works'); ?></article>
        <?php } ?>
            <div style="clear: both" ></div>
        </section>
        
        <header><h1><?php echo T::get ('past_assignments'); ?></h1></header>
        <section class="work_list boards">
        <?php if (System::$user->employer->doneWorks) foreach (System::$user->employer->doneWorks as $work): ?>
            <article>
            <h2><?php if ($work->last_reply > $work->last_seen) echo '!'; ?>
                <?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->id)), $work->label); ?>
                <span><?php echo T::get ('work.on'); ?></span>
                <?php echo Html::getDate ($work->created); ?>.
                <span><?php $sv = System::getConfig ('statusVals'); echo $sv[$work->status]; ?></span>
            </h2>
            <p><?php echo $work->excerpt; ?></p>
            </article>
        <?php endforeach; else { ?>
            <article class="inactive"><?php echo T::get ('no_works'); ?></article>
        <?php } ?>
            <div style="clear: both" ></div>
        </section>
    <?php } else { ?>
        <!-- freelancer part ******************************************************************* -->
        <article>
            <span class="controls"><img onclick="popup({r: 'user/edit_tags'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /></span>
            <?php echo '<strong>'.T::get ('Tags').':</strong> '.System::$user->freelancer->short_descr; ?>
        </article>
        <article>
            <span class="controls"><img onclick="popup({r: 'user/edit_descr'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /></span>
            <header><h2><?php echo T::get ('person.long_descr'); ?></h2></header>
            <?php echo System::$user->freelancer->description; ?>
        </article>
        <article>
        <header><h2><?php echo T::get ('CV'); ?></h2></header>
            <?php if (System::$user->freelancer->cv) { 
                echo T::get ('Last uploaded CV: ').Html::getLink (array ('href' => System::$user->freelancer->cv, 'target' => '_blank'), System::$user->freelancer->cv_uploaded);
            } ?>
            <aside><?php echo Html::getLink (array ('href' => '#', 'onclick' => "popup({r: 'user/upload_cv'})"), T::get ('Upload new CV')); ?></aside>
        </article>
        
        <!-- in progress -->
        <header><h1><?php echo T::get ('assignments_in_progress'); ?></h1></header>
        <section class="work_list boards">
        <?php if (System::$user->freelancer->worksInProgress) foreach (System::$user->freelancer->worksInProgress as $work): ?>
            <article>
            <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->work->id)), $work->work->label); ?> 
                <span><?php echo T::get ('work.by'); ?></span> 
                <?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$work->work->empl_id)), $work->work->employer->user->fullname); ?>
                <span><?php echo T::get ('working_from'); ?></span>
                <?php echo Html::getDate ($work->worked_from); ?>
            </h2>
            <p><?php echo $work->work->excerpt; ?></p>
            </article>
        <?php endforeach; else { ?>
            <article class="inactive"><?php echo T::get ('no_works'); ?></article>
        <?php } ?>
            <div style="clear: both" ></div>
        </section>
        
        <!-- pending -->
        <header><h1><?php echo T::get ('assignments_pending'); ?></h1></header>
        <section class="work_list boards">
        <?php if (System::$user->freelancer->worksPending) foreach (System::$user->freelancer->worksPending as $work): ?>
            <article>
            <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->work->id)), $work->work->label); ?> 
                <span><?php echo T::get ('work.by'); ?></span> 
                <?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$work->work->empl_id)), $work->work->employer->user->fullname); ?>;
                <span><?php echo T::get ('work.applied_on'); ?></span>
                <?php echo Html::getDate ($work->created); ?>
            </h2>
            <p><?php echo $work->work->excerpt; ?></p>
            </article>
        <?php endforeach; else { ?>
            <article class="inactive"><?php echo T::get ('no_works'); ?></article>
        <?php } ?>
            <div style="clear: both" ></div>
        </section>
        
        <!-- done -->
        <header><h1><?php echo T::get ('assignments_done'); ?></h1></header>
        <section class="work_list boards">
        <?php if (System::$user->freelancer->worksDone) foreach (System::$user->freelancer->worksDone as $work): ?>
            <article>
            <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->work->id)), $work->work->label); ?> 
                <span><?php echo T::get ('work.by'); ?></span> 
                <?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$work->work->empl_id)), $work->work->employer->user->fullname); ?>;
                <span><?php echo T::get ('work.from'); ?></span>
                <?php echo Html::getDate ($work->worked_from); ?>
                <span><?php echo T::get ('work.untill'); ?></span>
                <?php echo Html::getDate ($work->worked_untill); ?>,
                <span><?php echo T::get ('work.mark'); ?></span>
                <?php echo $work->mark; ?>
            </h2>
            <p><?php echo $work->work->excerpt; ?></p>
            </article>
        <?php endforeach; else { ?>
            <article class="inactive"><?php echo T::get ('no_works'); ?></article>
        <?php } ?>
            <div style="clear: both" ></div>
        </section>
        
        <!-- cancelled -->
        <header><h1><?php echo T::get ('assignments_cancelled'); ?></h1></header>
        <section class="work_list boards">
        <?php if (System::$user->freelancer->worksCancelled) foreach (System::$user->freelancer->worksCancelled as $work): ?>
            <article>
            <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->work->id)), $work->work->label); ?> 
                <span><?php echo T::get ('work.by'); ?></span> 
                <?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$work->work->empl_id)), $work->work->employer->user->fullname); ?>;
                <span><?php echo T::get ('work.applied_on'); ?></span>
                <?php echo Html::getDate ($work->created); ?>
            </h2>
            <p><?php echo $work->work->excerpt; ?></p>
            </article>
        <?php endforeach; else { ?>
            <article class="inactive"><?php echo T::get ('no_works'); ?></article>
        <?php } ?>
            <div style="clear: both" ></div>
        </section>
    <?php } ?>
</section>
