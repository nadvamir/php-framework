<!-- boards ------------------------------------------------------------------------------------ -->
<section id="content">
    <section id="right">
        <?php
            include getWidget ('builder_menu');
        ?>
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo T::get ('site_tree'); ?></h1></header>
    <article class="container">
        <ul class="sortable list">
            <li rel="0"><span class="handle">::</span> Item 1<span class="controls"><img onclick="$(this).parent().parent().attr('rel', parseInt($(this).parent().parent().attr('rel')) + 1);" src="<?php echo THEME_DIR; ?>img/attach.png" alt="<?php echo T::get ('attach'); ?>" title="<?php echo T::get ('attach'); ?>" /> <img onclick="$('#popup').fadeToggle(700)" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /> <img src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" /></span></li>
            <li rel="0"><span class="handle">::</span> Item 2<span class="controls"><img onclick="$(this).parent().parent().attr('rel', parseInt($(this).parent().parent().attr('rel')) + 1);" src="<?php echo THEME_DIR; ?>img/attach.png" alt="<?php echo T::get ('attach'); ?>" title="<?php echo T::get ('attach'); ?>" /> <img onclick="$('#popup').fadeToggle(700)" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /> <img src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" /></span></li>
            <li rel="1"><span class="handle">::</span> Item 3<span class="controls"><img onclick="$(this).parent().parent().attr('rel', parseInt($(this).parent().parent().attr('rel')) + 1);" src="<?php echo THEME_DIR; ?>img/attach.png" alt="<?php echo T::get ('attach'); ?>" title="<?php echo T::get ('attach'); ?>" /> <img onclick="$('#popup').fadeToggle(700)" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /> <img src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" /></span></li>
            <li rel="2"><span class="handle">::</span> Item 4<span class="controls"><img onclick="$(this).parent().parent().attr('rel', parseInt($(this).parent().parent().attr('rel')) + 1);" src="<?php echo THEME_DIR; ?>img/attach.png" alt="<?php echo T::get ('attach'); ?>" title="<?php echo T::get ('attach'); ?>" /> <img onclick="$('#popup').fadeToggle(700)" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /> <img src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" /></span></li>
            <li rel="1"><span class="handle">::</span> Item 5<span class="controls"><img onclick="$(this).parent().parent().attr('rel', parseInt($(this).parent().parent().attr('rel')) + 1);" src="<?php echo THEME_DIR; ?>img/attach.png" alt="<?php echo T::get ('attach'); ?>" title="<?php echo T::get ('attach'); ?>" /> <img onclick="$('#popup').fadeToggle(700)" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /> <img src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" /></span></li>
            <li rel="0"><span class="handle">::</span> Item 6<span class="controls"><img onclick="$(this).parent().parent().attr('rel', parseInt($(this).parent().parent().attr('rel')) + 1);" src="<?php echo THEME_DIR; ?>img/attach.png" alt="<?php echo T::get ('attach'); ?>" title="<?php echo T::get ('attach'); ?>" /> <img onclick="$('#popup').fadeToggle(700)" src="<?php echo THEME_DIR; ?>img/edit.png" alt="<?php echo T::get ('edit'); ?>" title="<?php echo T::get ('edit'); ?>" /> <img src="<?php echo THEME_DIR; ?>img/delete.png" alt="<?php echo T::get ('delete'); ?>" title="<?php echo T::get ('delete'); ?>" /></span></li>
        </ul>
        <a href="#" onclick="popup({ r: 'builder/new_item' }); ">Add child</a>
    </article>

</section>
<section id="popup">
    <article id="popup_content">
        <div></div>
        <nav><li id="popup_close_button">[<a href="#" onclick="$('#popup').fadeToggle(700)">close</a>]</li></nav>
    </article>
</section>
<!-- additional JS ----------------------------------------------------------------------------- -->
<script type="text/javascript">
    $(function() {
        $('.sortable').sortable({
            handle: '.handle'
        });
    });
</script>