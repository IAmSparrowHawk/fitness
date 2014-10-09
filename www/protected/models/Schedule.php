<?php

/**
 * This is the model class for table "tbl_schedule".
 *
 * The followings are the available columns in table 'tbl_schedule':
 * @property integer $id
 * @property integer $client
 * @property integer $coach
 * @property string $datevisit
 * @property string $timevisit
 * @property integer $serv
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Client $client0
 * @property Coach $coach0
 * @property Serv $serv0
 * @property Typestatus $status0
 */
class Schedule extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_schedule';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('client, coach, serv, status', 'numerical', 'integerOnly'=>true),
            array('datevisit, timevisit', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, client, coach, datevisit, timevisit, serv, status', 'safe', 'on'=>'search'),
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
            'rel_client' => array(self::BELONGS_TO, 'Client', 'client'),
            'rel_coach' => array(self::BELONGS_TO, 'Coach', 'coach'),
            'rel_serv' => array(self::BELONGS_TO, 'Serv', 'serv'),
            'rel_status' => array(self::BELONGS_TO, 'Typestatus', 'status'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'client' => 'Клиент',
            'coach' => 'Тренер',
            'datevisit' => 'Дата',
            'timevisit' => 'Время',
            'serv' => 'Услуга',
            'status' => 'Статус',
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
        $criteria->compare('datevisit',$this->datevisit,true);
        $criteria->compare('timevisit',$this->timevisit,true);
        $criteria->compare('serv',$this->serv);
        $criteria->compare('status',$this->status);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Schedule the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}