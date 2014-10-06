<?php

/**
 * This is the model class for table "tbl_metering".
 *
 * The followings are the available columns in table 'tbl_metering':
 * @property integer $id
 * @property integer $client
 * @property integer $coach
 * @property string $datemetr
 * @property double $weight
 * @property double $chest
 * @property double $waistline
 * @property double $abdominalgirth
 * @property double $hips
 * @property double $rhip
 * @property double $rknee
 * @property double $rtibia
 * @property double $rforearm
 *
 * The followings are the available model relations:
 * @property Client $client0
 * @property Coach $coach0
 */
class Metering extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_metering';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('client, coach', 'numerical', 'integerOnly'=>true),
            array('weight, chest, waistline, abdominalgirth, hips, rhip, rknee, rtibia, rforearm', 'numerical'),
            array('datemetr', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, client, coach, datemetr, weight, chest, waistline, abdominalgirth, hips, rhip, rknee, rtibia, rforearm', 'safe', 'on'=>'search'),
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
            'client0' => array(self::BELONGS_TO, 'Client', 'client'),
            'coach0' => array(self::BELONGS_TO, 'Coach', 'coach'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'client' => 'Client',
            'coach' => 'Coach',
            'datemetr' => 'Datemetr',
            'weight' => 'Weight',
            'chest' => 'Chest',
            'waistline' => 'Waistline',
            'abdominalgirth' => 'Abdominalgirth',
            'hips' => 'Hips',
            'rhip' => 'Rhip',
            'rknee' => 'Rknee',
            'rtibia' => 'Rtibia',
            'rforearm' => 'Rforearm',
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
        $criteria->compare('client',$this->client);
        $criteria->compare('coach',$this->coach);
        $criteria->compare('datemetr',$this->datemetr,true);
        $criteria->compare('weight',$this->weight);
        $criteria->compare('chest',$this->chest);
        $criteria->compare('waistline',$this->waistline);
        $criteria->compare('abdominalgirth',$this->abdominalgirth);
        $criteria->compare('hips',$this->hips);
        $criteria->compare('rhip',$this->rhip);
        $criteria->compare('rknee',$this->rknee);
        $criteria->compare('rtibia',$this->rtibia);
        $criteria->compare('rforearm',$this->rforearm);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Metering the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}