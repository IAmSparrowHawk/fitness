<?php

/**
 * This is the model class for table "tbl_client".
 *
 * The followings are the available columns in table 'tbl_client':
 * @property integer $id
 * @property integer $userid
 * @property string $familyname
 * @property string $personname
 * @property string $farthername
 * @property string $birthdate
 * @property string $adres
 * @property string $phone
 * @property string $limits
 * @property string $program
 * @property string $diet
 * @property string $begindate
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Abonement[] $abonements
 * @property User $user
 * @property Metering[] $meterings
 * @property Schedule[] $schedules
 */
class Client extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_client';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userid, familyname, personname, birthdate, begindate', 'required'),
            array('userid', 'numerical', 'integerOnly'=>true),
            array('familyname, personname, farthername', 'length', 'max'=>50),
            array('adres, limits', 'length', 'max'=>255),
            array('phone', 'length', 'max'=>20),
            array('program, diet', 'length', 'max'=>1024),
            array('email', 'length', 'max'=>128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, userid, familyname, personname, farthername, birthdate, adres, phone, limits, program, diet, begindate, email', 'safe', 'on'=>'search'),
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
            'abonements' => array(self::HAS_MANY, 'Abonement', 'client'),
            'user' => array(self::HAS_ONE, 'User', 'userid'),
            'meterings' => array(self::HAS_MANY, 'Metering', 'client'),
            'schedules' => array(self::HAS_MANY, 'Schedule', 'client'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'userid' => 'Userid',
            'familyname' => 'Familyname',
            'personname' => 'Personname',
            'farthername' => 'Farthername',
            'birthdate' => 'Birthdate',
            'adres' => 'Adres',
            'phone' => 'Phone',
            'limits' => 'Limits',
            'program' => 'Program',
            'diet' => 'Diet',
            'begindate' => 'Begindate',
            'email' => 'Email',
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
        $criteria->compare('userid',$this->userid);
        $criteria->compare('familyname',$this->familyname,true);
        $criteria->compare('personname',$this->personname,true);
        $criteria->compare('farthername',$this->farthername,true);
        $criteria->compare('birthdate',$this->birthdate,true);
        $criteria->compare('adres',$this->adres,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('limits',$this->limits,true);
        $criteria->compare('program',$this->program,true);
        $criteria->compare('diet',$this->diet,true);
        $criteria->compare('begindate',$this->begindate,true);
        $criteria->compare('email',$this->email,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Client the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
