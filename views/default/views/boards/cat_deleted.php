<!-- boards in a category -->
<section id="content">
    <section id="right">
        <?php
            //include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1>“<?php echo $category->label.'” '.T::get ('work_deleted'); ?></h1></header>
    <article><?php echo Html::getLink (array ('href' => Html::getUrl ('boards')), ucfirst (T::get ('return to main page'))); ?>.</article>
</section>