<h1>Произошла ошибка!</h1>
<p><?php echo $e->getMessage (); ?></p>
<div class="navigation">
[<a href="<?php $route = System::getConfig ('route'); echo Html::getUrl ($route['default']); ?>">на главную</a>]
</div>