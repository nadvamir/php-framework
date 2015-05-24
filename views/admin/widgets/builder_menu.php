<!-- 
-- builder menu
-->
<?php
    $w_langs = System::getConfig ('langs');
    $w_links = array();
    foreach (System::getConfig ('langs') as $lang)
    {
        $w_links[] = array (
            'href' => WEB_ROOT.'builder/index/?lang='.$lang,
            'title' => $lang,
        );
    }
?>
<section id="lang_submenu">
    <div><header><h1><?php echo T::get ('site_v_language'); ?></h1></header></div>
    <nav>
        <ul style="display: block">
        <?php 
            foreach ($w_links as $item): 
                ?><li <?php 
                if (isset ($_GET['lang']) && $item['title'] == $_GET['lang'])
                    echo 'class="active"'; 
                ?> > <?php echo Html::getLink ($item, $item['title']); ?></li><?php 
            endforeach; 
        ?>
        </ul>
    </nav>
</section>
<section id="submenu">
    <div><header><h1><?php echo T::get ('additional_features'); ?></h1></header></div>
    <nav>
        <ul>
        <?php 
            foreach (System::getConfig ('builder_side_menu') as $item): 
                ?><li <?php 
                if ($item['href'][0] == System::$url[0]  
                    && (isset (System::$url[1]) && $item['href'][1] == System::$url[1]
                    || (!isset (System::$url[1]) || !System::$url[1]) && $this->defaultAction == $item['href'][1])
                    ) {
                    echo 'class="active"'; 
                }
                ?> > <?php echo Html::getParsedLink ($item); ?></li><?php 
            endforeach; 
        ?>
        </ul>
    </nav>
</section>