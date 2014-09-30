<?php
/* @var $this PersonalClientController */

$this->pageTitle = "Личный кабинет: Информация";
$this->breadcrumbs = array(
    'Личный кабинет',
    'Информация'
);
//$dataProvider=new CActiveDataProvider('Schedule');
?>

<div class="row buttons">
    <?php echo CHtml::submitButton('Редактировать'); ?>
</div>
<table>
    <tr>
        <td rowspan="3"><img src=""></td>
        <td><b>ФИО:</b></td>
        <td colspan="3"><?php echo Yii::app()->user->name ?></td>
    </tr>
    <tr>
        <td><b>Дата рождения:</b></td>
        <td><?php echo Yii::app()->user->name ?> дата</td>
        <td><b>Возраст:</b></td>
        <td><?php echo Yii::app()->user->name ?> возраст</td>
    </tr>
    <tr>
        <td><b>Контактный телефон:</b></td>
        <td><?php echo Yii::app()->user->name ?> телефон</td>
    </tr>
    <tr>
        <td colspan="4"><b>Ограничения:</b></td>
    </tr>
    <tr>
        <td colspan="4"><?php echo Yii::app()->user->name ?> описание заболеваний,
            травм и ограничений по занятию спортом
        </td>
    </tr>
</table>
<h4><b>Абонемент:</b> <?php echo '№абонемента' ?></h4>
<table>
    <th>Рекомендованная программа:</th>
    <tr>
        <td style="text-wrap: avoid"><?php echo 'описание процедур' ?></td>
    </tr>
</table>
<table>
    <th>Рекомендованная диета:</th>
    <tr>
        <td style="text-wrap: avoid"><?php echo 'описание рациона' ?></td>
    </tr>
</table>
<table>
    <th>Расписание:</th>
    <tr>
        <td>
          <!--  <?php /*$this->beginWidget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$dataProvider)); */?>

            <?php /*$this->endWidget(); */?></td>-->
    </tr>
</table>