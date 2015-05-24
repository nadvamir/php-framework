<!-- boards in a category -->
<section id="content">
    <section id="right">
        <?php
            include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo T::get ('work_created'); ?></h1></header>
    <article><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/adv/'.$work->id)), T::get ('see_created')).' '.T::get ('work.or').' '.Html::getLink (array ('href' => Html::getUrl ('boards/cat/'.$category->id)), T::get ('see_category')); ?>.</article>
</section>