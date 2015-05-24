<!-- header of the site -->
<section id="content">
    <section id="right">
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo T::get ('students'); ?></h1></header>
    <table class="fullwidth name_list">
    <tr><th class="name_cell"><?php echo T::get ('student'); ?></th><th class="descr_cell"><?php echo T::get ('short_description'); ?></th><th><?php echo T::get ('assignments_done'); ?></th><th><?php echo T::get ('assignments_in_progress'); ?></th><th><?php echo T::get ('assignments_pending'); ?></th><th><?php echo T::get ('avg_mark'); ?></th></tr>
    <?php foreach (Freelancer::find () as $student): ?>
        <tr>
            <td class="name_cell"><?php echo Html::getLink (array ('href' => Html::getUrl ('students/person/'.$student->id)), $student->user->fullname); ?></td>
            <td class="descr_cell"><?php echo $student->short_descr; ?></td>
            <td><?php echo ($student->worksDone) ? count ($student->worksDone) : 0; ?></td>
            <td><?php echo ($student->worksInProgress) ? count ($student->worksInProgress) : 0; ?></td>
            <td><?php echo ($student->worksPending) ? count ($student->worksPending) : 0; ?></td>
            <td>
                <?php
                    $q = "SELECT AVG(mark) AS averageMark FROM ".Application::getTableName ()." WHERE frlnc_id = ".$student->id." AND status = 3;";
                    $q = System::doMysql ($q);
                    $res = System::mysqlResultAssoc ($q);
                    echo ($res['averageMark']) ? round ($res['averageMark'], 2) : '–';
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    
</section>