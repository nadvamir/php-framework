<!-- boards in a category -->
<section id="content" class="boards">
    <section id="right">
        <?php
            //include getWidget ('category_right');
            //include getWidget ('available_people');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo $work->label; ?></h1></header>
    <?php echo $form->getFormHtml (); ?>
</section>