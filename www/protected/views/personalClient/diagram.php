<?php
$this->pageTitle = "Личный кабинет: Информация";
$this->breadcrumbs = array(
    'Личный кабинет',
    'Диаграммы'
);
?>
<h1>Диаграммы</h1>
<div>
    <?php $this->widget('application.extensions.Hzl.google.HzlVisualizationChart',
        array('visualization' => 'LineChart',
            'data' => $weights,
            'options' => array('title' => 'Динамика изменения веса',
                'vAxis' => array('title' => 'Вес'),
                'hAxis' => array('title' => 'Дата'),

    )));
    ?>
</div>
<?php if (count($weightsClient)>1):?>
<div>
    <?php $this->widget('application.extensions.Hzl.google.HzlVisualizationChart',
        array('visualization' => 'LineChart',
            'data' =>$weightsClient,
            'options' => array('title' => 'Клиентские замеры динамики изменения веса',
                'vAxis' => array('title' => 'Вес'),
                'hAxis' => array('title' => 'Дата'),
            )));
    ?>
</div>
<?php endif;?>
<div class="form nowrap">
    <?php
    /* @var CActiveForm $form */
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>
    <div class="row">
        <?php echo $form->labelEx($metering, 'datemetr'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'datemetr',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
            'value'=>date('d/m/Y', strtotime('now'))
        ));?>
        <?php echo $form->error($metering, 'datemetr'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($metering, 'weight'); ?>
        <?php echo $form->textField($metering, 'weight'); ?>
        <?php echo $form->error($metering, 'weight'); ?>
    </div>
    <?php echo CHtml::submitButton('Добавить'); ?>
    <?php $this->endWidget(); ?>
</div>

<div>
    <?php $this->widget('application.extensions.Hzl.google.HzlVisualizationChart',
        array('visualization' => 'LineChart',
            'data' => $volumes,

            'options' => array('title' => 'Динамика изменения объемов',
                'vAxis' => array('title' => 'См'),
                'hAxis' => array('title' => 'Дата'),
            )));
    ?>
</div>