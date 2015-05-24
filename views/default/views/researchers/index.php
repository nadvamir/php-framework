<!-- header of the site -->
<section id="content">
    <section id="right">
    </section>
    <!-- NB: breadcrumbs -->
    <header><h1><?php echo T::get ('researchers'); ?></h1></header>
    <table class="fullwidth name_list">
    <tr><th class="name_cell"><?php echo T::get ('researcher'); ?></th><th class="descr_cell"><?php echo T::get ('short_description'); ?></th><th><?php echo T::get ('active_assignments'); ?></th><th><?php echo T::get ('assignments_created'); ?></th><th><?php echo T::get ('individual_vacancies'); ?></th></tr>
    <?php foreach (Employer::find () as $employer): ?>
        <tr>
            <td class="name_cell"><?php echo Html::getLink (array ('href' => Html::getUrl ('researchers/person/'.$employer->id)), $employer->user->fullname); ?></td>
            <td class="descr_cell"><?php echo $employer->short_descr; ?></td>
            <td><?php echo ($employer->activeWorks) ? count ($employer->activeWorks) : 0; ?></td>
            <td><?php echo ($employer->createdWorks) ? count ($employer->createdWorks) : 0; ?></td>
            <td>
                <?php
                    $q = "SELECT COUNT(*) AS totalDone FROM ".Application::getTableName ()." WHERE work_id IN (SELECT id FROM ".Work::getTableName ()." WHERE empl_id = ".$employer->id.") AND status = 3;";
                    $q = System::doMysql ($q);
                    $res = System::mysqlResultAssoc ($q);
                    echo ($res['totalDone']) ? $res['totalDone'] : '0';
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    
</section>