<?php
/* @var $this PersonalClientController */
$this->pageTitle = "Личный кабинет: Редактирование";
$this->breadcrumbs = array(
    'Личный кабинет',
    'Редактирование информации'
);
?>
<div class="form nowrap">
    <?php
    /* @var CActiveForm $form */
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>
    <p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'familyname'); ?>
        <?php echo $form->textField($clientRecord, 'familyname'); ?>
        <?php echo $form->error($clientRecord, 'familyname'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'personname'); ?>
        <?php echo $form->textField($clientRecord, 'personname'); ?>
        <?php echo $form->error($clientRecord, 'personname'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'farthername'); ?>
        <?php echo $form->textField($clientRecord, 'farthername'); ?>
        <?php echo $form->error($clientRecord, 'farthername'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'birthdate'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'birthdate',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
            'value'=>date('d/m/Y', strtotime($clientRecord->birthdate))
        ));?>
        <?php echo $form->error($clientRecord, 'birthdate'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'adres'); ?>
        <?php echo $form->textField($clientRecord, 'adres'); ?>
        <?php echo $form->error($clientRecord, 'adres'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'phone'); ?>
        <?php echo $form->textField($clientRecord, 'phone'); ?>
        <?php echo $form->error($clientRecord, 'phone'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'email'); ?>
        <?php echo $form->textField($clientRecord, 'email'); ?>
        <?php echo $form->error($clientRecord, 'email'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($clientRecord, 'limits'); ?>
        <?php echo $form->textArea($clientRecord, 'limits'); ?>
        <?php echo $form->error($clientRecord, 'limits'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::link('Отмена', '?r=personalClient/info'); ?>
        <?php echo CHtml::resetButton('Сброс'); ?>
        <?php echo CHtml::submitButton('Сохранить'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>