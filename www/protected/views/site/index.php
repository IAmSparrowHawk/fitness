<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Здравствуйте,<?php echo !Yii::app()->user->isGuest?' <b>'. CHtml::encode(Yii::app()->user->name).'</b>,':''?>
    добро пожаловать в <i>
        <?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
