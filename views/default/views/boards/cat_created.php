<!-- boards in a category -->
<section id="content">
    <section id="right">
        <?php
            //include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo T::get ('Category was successfully created'); ?></h1></header>
    <article><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/cat/'.$category->id)), T::get ('Go to this category')).' '.T::get ('work.or').' '.Html::getLink (array ('href' => Html::getUrl ('boards')), T::get ('return to main page')); ?>.<article>
</section>