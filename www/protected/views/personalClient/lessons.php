<?php
$this->pageTitle = "Личный кабинет: Информация";
$this->breadcrumbs = array(
    'Личный кабинет',
    'Занятия'
);
?>
    <h1>Расписание посещений</h1>
    <div><?php
        /* @var CActiveForm $form */
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'add-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); ?>
        <div class="row">
            <?php echo $form->labelEx($schedule, 'datevisit'); ?>
            <?php $this->widget('application.extensions.timepicker.timepicker', array(
                'model'=>$schedule,
                'name'=>'datevisit',
                /*$default = array(
'dateFormat'=>'yy-mm-dd',
'timeFormat'=>'hh:mm:ss',
'showOn'=>'button',
'showSecond'=>false,
'changeMonth'=>false,
'changeYear'=>false,
'tabularLevel'=>null,
);*/
            ));?>
            <?php echo $form->error($schedule, 'datevisit'); ?>
        </div>
    <div class="row">
        <?php echo $form->labelEx($schedule, 'serv'); ?>
        <?php echo $form->dropDownList($schedule, 'serv', $servlist)?>
        <?php echo $form->error($schedule, 'serv'); ?>
    </div>
        <?php echo CHtml::submitButton('Добавить');?>
        <?php $this->endWidget(); ?>
    </div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
'dataProvider' => $scheduleDataProvider,
'columns' => array(
// display the 'title' attribute
'datevisit',
'timevisit',
'rel_serv.servname', // display the 'name' attribute of the 'category' relation
'rel_status.descript',
/*array( // display a column with "view", "update" and "delete" buttons
'class' => 'CButtonColumn',
),*/
),
));
?>