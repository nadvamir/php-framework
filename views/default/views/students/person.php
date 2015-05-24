<!-- header of the site -->
<section id="content">
    <section id="right">
    </section>
    <!-- NB: breadcrumbs -->
    <?php
        $q = "SELECT AVG(mark) AS averageMark FROM ".Application::getTableName ()." WHERE frlnc_id = ".$student->id." AND status = 3;";
        $q = System::doMysql ($q);
        $res = System::mysqlResultAssoc ($q);
    ?>
    <header><h1><?php echo $student->user->fullname; ?> (<?php echo Html::getEmail ($student->user->email); ?>). <span><?php echo T::get ('rating').':</span> '.(($res['averageMark']) ? round ($res['averageMark'], 2) : '–'); ?></h1></header>
    <article class="short_descr"><?php echo '<strong>'.T::get ('Tags').':</strong> '.$student->short_descr; ?></article>
    <article class="long_descr">
        <header><h2><?php echo T::get ('person.long_descr'); ?></h2></header>
        <?php echo $student->description; ?>
    </article>
    <article>
        <header><h2><?php echo T::get ('cv'); ?></h2></header>
        <?php 
        if ($student->cv) 
            echo T::get ('Last uploaded CV: ').Html::getLink (array ('href' => $student->cv, 'target' => '_blank'), $student->cv_uploaded);
        else
            echo T::get ('No CV uploaded.');
        ?>
    </article>
    
    <header><h1><?php echo T::get ('assignments_in_progress'); ?></h1></header>
    <section class="work_list boards">
    <?php if ($student->worksInProgress) foreach ($student->worksInProgress as $work): ?>
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
    
    <header><h1><?php echo T::get ('assignments_done'); ?></h1></header>
    <section class="work_list boards">
    <?php if ($student->worksDone) foreach ($student->worksDone as $work): ?>
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
    
    
</section>