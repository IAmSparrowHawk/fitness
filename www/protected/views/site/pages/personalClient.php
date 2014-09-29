<?php
/* @var $this SiteController */

$this->pageTitle= "Личный кабинет";
$this->breadcrumbs=array(
    'Личный кабинет',
);
?>

<h1><?php echo CHtml::encode(Yii::app()->user->name.',')?> добро пожаловать в ваш личный кабинет</h1>
