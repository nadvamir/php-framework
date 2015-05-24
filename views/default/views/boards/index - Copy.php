<!-- boards -->
<section id="content" class="boards">
    <section id="right">
        <?php
            include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <?php foreach (System::getConfig ('categories') as $key => $val): ?>
        <header>
            <h1><?php echo $val->label; ?>
            <?php if (System::$user->checkAccess ('moderator')) { ?>
                <span class="controls">
                    <img onclick="popup({r: 'boards/editcat/<?php echo $val->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                    <?php if (!$val->works) { ?>
                        <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delcat/'.$val->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                    <?php } ?>
                </span>
            <?php } ?>
            </h1>
        </header>
        <aside>
            <?php echo Html::getLink (array ('href' => Html::getUrl ('boards/cat/'.$val->id)), T::get ('more_from_tc')); ?>
            <?php if ($canPost) {?>
                <?php echo Html::getLink (array ('href' => '#', 'onclick' => "popup({r: 'boards/create/".$val->id."'});"), T::get ('create_in_tc')); ?>
            <?php } ?>
        </aside>
        <?php if ($val->firstWorks) { foreach ($val->firstWorks as $work): ?>
            <article>
            <h2 class="title_link"><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->id)), $work->label); ?> 
                <span><?php echo T::get ('work.by'); ?></span> 
                <?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$work->empl_id)), $work->employer->user->fullname); ?>
                <span><?php echo T::get ('work.on'); ?></span>
                <?php echo Html::getDate ($work->created); ?>.
                <span><?php $sv = System::getConfig ('statusVals'); echo $sv[$work->status]; ?></span>
                <?php if (System::$user->checkAccess ('moderator') || System::$user->id == $work->empl_id) { ?>
                <span class="controls">
                    <img onclick="popup({r: 'boards/edit/<?php echo $work->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                    <?php if ($work->status == 0 && !$work->givenApplications && !$work->completedApplications) { ?>
                        <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delete/'.$work->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                    <?php } ?>
                </span>
                <?php } ?>
            </h2>
            <p><?php echo $work->excerpt; ?></p>
            </article>
        <?php endforeach; } else { ?>
            <article><p><?php echo T::get ('empty_cat'); ?></p></article>
    <?php } ?>
        <!--aside>
            <?php if ($canPost) {?>
                <?php echo Html::getLink (array ('href' => '#', 'onclick' => "popup({r: 'boards/create/".$val->id."'});"), T::get ('create_in_tc')); ?>
            <?php } ?>
        </aside-->
    <?php endforeach; ?>
</section>