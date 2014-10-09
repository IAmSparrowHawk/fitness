<?php

/**
 * This is the model class for table "tbl_abonement".
 *
 * The followings are the available columns in table 'tbl_abonement':
 * @property integer $id
 * @property integer $num
 * @property integer $countunit
 * @property string $paydate
 * @property string $datebegin
 * @property string $dateend
 * @property integer $typeduration
 * @property integer $balance
 * @property integer $typeabon
 * @property integer $client
 * @property integer $coach
 *
 * The followings are the available model relations:
 * @property Typeduration $typeduration0
 * @property Typeabon $typeabon0
 * @property Client $client0
 * @property Coach $coach0
 */
class Abonement extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_abonement';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('num, paydate, datebegin, dateend, typeduration, typeabon', 'required'),
            array('num, countunit, typeduration, balance, typeabon, client, coach', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, num, countunit, paydate, datebegin, dateend, typeduration, balance, typeabon, client, coach', 'safe', 'on'=>'search'),
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
            'rel_typeduration' => array(self::BELONGS_TO, 'Typeduration', 'typeduration'),
            'rel_typeabon' => array(self::BELONGS_TO, 'Typeabon', 'typeabon'),
            'rel_client' => array(self::BELONGS_TO, 'Client', 'client'),
            'rel_coach' => array(self::BELONGS_TO, 'Coach', 'coach'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'num' => '№абон.',
            'countunit' => 'Количество единиц',
            'paydate' => 'Дата оплаты',
            'datebegin' => 'Начало действия',
            'dateend' => 'Конец действия',
            'typeduration' => 'Время действия',
            'balance' => 'Остаток',
            'typeabon' => 'Тип',
            'client' => 'Клиент',
            'coach' => 'Тренер',
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
        $criteria->compare('num',$this->num);
        $criteria->compare('countunit',$this->countunit);
        $criteria->compare('paydate',$this->paydate,true);
        $criteria->compare('datebegin',$this->datebegin,true);
        $criteria->compare('dateend',$this->dateend,true);
        $criteria->compare('typeduration',$this->typeduration);
        $criteria->compare('balance',$this->balance);
        $criteria->compare('typeabon',$this->typeabon);
        $criteria->compare('client',$this->client);
        $criteria->compare('coach',$this->coach);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Abonement the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
