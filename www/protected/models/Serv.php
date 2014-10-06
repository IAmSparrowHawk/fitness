<?php

/**
 * This is the model class for table "tbl_serv".
 *
 * The followings are the available columns in table 'tbl_serv':
 * @property integer $id
 * @property integer $typeserv
 * @property string $servname
 * @property double $pricemoney
 * @property integer $priceunit
 * @property integer $timeserv
 *
 * The followings are the available model relations:
 * @property Schedule[] $schedules
 * @property Typeserv $typeserv0
 */
class Serv extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_serv';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('typeserv, servname, pricemoney, priceunit', 'required'),
            array('typeserv, priceunit, timeserv', 'numerical', 'integerOnly'=>true),
            array('pricemoney', 'numerical'),
            array('servname', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, typeserv, servname, pricemoney, priceunit, timeserv', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'schedules' => array(self::HAS_MANY, 'Schedule', 'serv'),
            'typeserv0' => array(self::BELONGS_TO, 'Typeserv', 'typeserv'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'typeserv' => 'Typeserv',
            'servname' => 'Servname',
            'pricemoney' => 'Pricemoney',
            'priceunit' => 'Priceunit',
            'timeserv' => 'Timeserv',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('typeserv',$this->typeserv);
        $criteria->compare('servname',$this->servname,true);
        $criteria->compare('pricemoney',$this->pricemoney);
        $criteria->compare('priceunit',$this->priceunit);
        $criteria->compare('timeserv',$this->timeserv);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Serv the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}