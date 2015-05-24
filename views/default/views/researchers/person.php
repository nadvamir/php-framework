<!-- header of the site -->
<section id="content">
    <section id="right">
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo $person->user->fullname; ?> (<?php echo Html::getEmail ($person->user->email); ?>)</h1></header>
    <article class="short_descr"><?php echo '<strong>'.T::get ('Tags').':</strong> '.$person->short_descr; ?></article>
    <article class="long_descr">
        <header><h2><?php echo T::get ('person.long_descr'); ?></h2></header>
        <?php echo $person->description; ?>
    </article>
    
    <header><h1><?php echo T::get ('active_assignments'); ?></h1></header>
    <section class="work_list boards">
    <?php if ($person->activeWorks) foreach ($person->activeWorks as $work): ?>
        <article>
        <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->id)), $work->label); ?>
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
    <?php if ($person->doneWorks) foreach ($person->doneWorks as $work): ?>
        <article>
        <h2><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->id)), $work->label); ?></h2>
        <p><?php echo $work->excerpt; ?></p>
        </article>
    <?php endforeach; else { ?>
    <?php } ?>
        <article class="inactive"><?php echo T::get ('no_works'); ?></article>
        <div style="clear: both" ></div>
    </section>
    
    
</section>