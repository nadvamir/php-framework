<!-- boards in a category -->
<section id="content" class="boards">
    <section id="right">
        <?php
            include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1>
        <?php echo $category->label; ?>
        <?php if ($canPost) { ?>
        <aside><?php echo Html::getLink (array ('href' => '#', 'onclick' => "popup({r: 'boards/create/".$category->id."'});"), T::get ('create_in_tc')); ?></aside>
        <?php } ?>
    </h1></header>
    <?php if ($category->works) { foreach ($category->works as $work): ?>
        <article>
        <h2 class="title_link">
            <?php if (System::$user->checkAccess ('moderator') || System::$user->id == $work->empl_id) { ?>
            <span class="controls">
                <img onclick="popup({r: 'boards/edit/<?php echo $work->id; ?>'});" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" />
                <?php if ($work->status == 0 && !$work->givenApplications && !$work->completedApplications) { ?>
                    <img onclick="confirmLink ('<?php echo T::get ('confirm_delete'); ?>', '<?php echo Html::getUrl ('boards/delete/'.$work->id); ?>');" src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" />
                <?php } ?>
            </span>
            <?php } ?>
            <?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->id)), $work->label); ?> 
            <span><?php echo T::get ('work.by'); ?></span> 
            <?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$work->empl_id)), $work->employer->user->fullname); ?>
            <span><?php echo T::get ('work.on'); ?></span>
            <?php echo Html::getDate ($work->created); ?>.
            <span><?php $sv = System::getConfig ('statusVals'); echo $sv[$work->status]; ?></span>
        </h2>
        <p><?php echo $work->excerpt; ?></p>
        </article>
        <?php endforeach;  ?>
        <?php } else { ?>
            <article class="inactive"><p><?php echo T::get ('empty_cat'); ?></p></article>
    <?php }; ?>
    <div style="clear: both" ></div>
</section>