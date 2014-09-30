<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Admin
 * Date: 30.09.14
 * Time: 22:30
 * To change this template use File | Settings | File Templates.
 */
?>
<table>
    <tr><td><?php echo CHtml::link('Информация',array('personalClient/info')); ?></td></tr>
    <tr><td><?php echo CHtml::link('Диаграммы',array('personalClient/diagram')); ?></td></tr>
    <tr><td><?php echo CHtml::link('Занятия',array('personalClient/lessons')) ?></td></tr>
    <tr><td><?php echo CHtml::link('Выход',array('site/logout')); ?></td></tr>
</table>