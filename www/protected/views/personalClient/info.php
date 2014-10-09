<?php
/* @var $this PersonalClientController */
$this->pageTitle = "Личный кабинет: Информация";
$this->breadcrumbs = array(
    'Личный кабинет',
    'Информация'
);
?>

<div>
    <?php echo CHtml::link('Редактировать','?r=personalClient/editInfo'); ?>
</div>
<table>
    <tr>
        <td rowspan="4"><img src=""></td>
        <td><b>ФИО:</b></td>
        <td colspan="3"><?php echo $client->familyname ?> <?php echo $client->personname ?> <?php echo $client->farthername ?></td>
    </tr>
    <tr>
        <td><b>Дата рождения:</b></td>
        <td><?php echo date('d.m.Y', strtotime($client->birthdate)) ?></td>
        <td><b>Возраст:</b></td>
        <td><?php echo (new DateTime())->diff(new DateTime($client->birthdate))->format('%y') ?></td>
    </tr>
    <tr>
        <td><b>Контактный телефон:</b></td>
        <td><?php echo $client->phone ?></td>
    </tr>
    <tr>
        <td><b><?php echo Client::model()->getAttributeLabel('email') ?>:</b></td>
        <td><?php echo $client->email ?></td>
    </tr>
    <tr>
        <td colspan="4"><b>Ограничения:</b></td>
    </tr>
    <tr>
        <td colspan="4"><?php echo $client->limits ?>
            <!-- описание заболеваний,
            травм и ограничений по занятию спортом-->
        </td>
    </tr>
</table>
<table>
    <th>Рекомендованная программа:</th>
    <tr>
        <td style="text-wrap: avoid"><?php echo  $client->program ?></td>
    </tr>
</table>
<table>
    <th>Рекомендованная диета:</th>
    <tr>
        <td style="text-wrap: avoid"><?php echo  $client->diet ?></td>
    </tr>
</table>
<?php $nabon = $abon[0]->num;
$numout = true;
foreach($abon as $value)
{  if ($nabon <> $value->num)
        $numout = false;}
unset($value);
?>
<h4><b>Абонемент:</b> <?php if ($numout): echo '№'.$nabon; endif;?></h4>
<table border="True">
    <tr>
        <td>№</td><td>Тип</td><td>Время действия</td><td>Количество единиц</td><td>Дата оплаты</td>
        <td>Начало действия</td><td>Конец действия</td><td>Остаток</td>
    </tr>
    <?php foreach($abon as $value){?>
    <tr>
        <td><?php echo $value->num ?></td>
        <td><?php $tabon = Typeabon::model()->findByPk($value->typeabon);
            echo $tabon->descript;?></td>
        <td><?php $tdur = Typeduration::model()->findByPk($value->typeduration);
            echo $tdur->descript;?></td>
        <td><?php if ($value->countunit == -1):
                echo 'безлимитный';
                 else: echo $value->countunit; endif; ?></td>
        <td><?php echo date('d.m.Y', strtotime($value->paydate)); ?></td>
        <td><?php echo date('d.m.Y', strtotime($value->datebegin));?></td>
        <td><?php echo date('d.m.Y', strtotime($value->dateend));?></td>
        <td><?php echo $value->balance;?></td>
    </tr>
    <?php }?>
</table>
