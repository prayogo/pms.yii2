<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ps_customer".
 *
 * @property integer $customerid
 * @property string $company
 * @property string $dayofjoin
 * @property string $npwp
 * @property string $phone
 * @property string $fax
 * @property string $address
 * @property string $city
 * @property string $state
 * @property integer $countryid
 * @property integer $partnertypeid
 * @property string $webpage
 * @property string $datein
 * @property string $userin
 * @property string $dateup
 * @property string $userup
 *
 * @property PsContactperson[] $psContactpeople
 * @property PsCountry $country
 * @property PsPartnertype $partnertype
 * @property PsProject[] $psProjects
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_customer';
    }

    public $varPartnertype;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company', 'dayofjoin', 'phone', 'address', 'city', 'state', 'countryid', 'partnertypeid'], 'required'],
            [['dayofjoin', 'datein', 'dateup'], 'safe'],
            [['countryid', 'partnertypeid'], 'integer'],
            [['company', 'city', 'state', 'userin', 'userup'], 'string', 'max' => 50],
            [['npwp'], 'string', 'max' => 20],
            [['phone', 'fax'], 'string', 'max' => 15],
            [['address', 'webpage'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerid' => 'ID',
            'company' => 'Name',
            'dayofjoin' => 'Day Of Join',
            'npwp' => 'NPWP',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'countryid' => 'Country',
            'partnertypeid' => 'Partner Type',
            'webpage' => 'Webpage',
            'datein' => 'Datein',
            'userin' => 'Userin',
            'dateup' => 'Dateup',
            'userup' => 'Userup',
            'dateText' => 'Day Of Join',
            'varPartnertype' => 'Partner Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPsContactpeople()
    {
        return $this->hasMany(ContactPerson::className(), ['customerid' => 'customerid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['countryid' => 'countryid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnertype()
    {
        return $this->hasOne(PartnerType::className(), ['partnertypeid' => 'partnertypeid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPsProjects()
    {
        return $this->hasMany(Project::className(), ['customerid' => 'customerid']);
    }

    public function getDateText(){
        return date("d-M-Y", strtotime($this->dayofjoin));
    }
}
