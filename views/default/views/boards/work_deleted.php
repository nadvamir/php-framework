<!-- boards in a category -->
<section id="content">
    <section id="right">
        <?php
            include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1>“<?php echo $work->label.'” '.T::get ('work_deleted'); ?></h1></header>
    <article><?php echo Html::getLink (array ('href' => Html::getUrl ('boards/cat/'.$category->id)), ucfirst (T::get ('see_category'))); ?>.</article>
</section>