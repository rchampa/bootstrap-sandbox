<?php

/**
 * This is the model class for table "protocolos".
 *
 * The followings are the available columns in table 'protocolos':
 * @property string $nombre_protocolo
 * @property string $email_usuario
 * @property string $protocolo
 * @property string $protocolo_creado_en
 * @property string $protocolo_modificado_en
 * @property integer $borrado
 *
 * The followings are the available model relations:
 * @property Usuarios $emailUsuario
 * @property Farmacos[] $farmacoses
 */
class Protocolos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'protocolos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_protocolo, email_usuario, protocolo', 'required'),
			array('borrado', 'numerical', 'integerOnly'=>true),
			array('nombre_protocolo', 'length', 'max'=>25),
			array('email_usuario', 'length', 'max'=>100),
			array('protocolo_creado_en, protocolo_modificado_en', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nombre_protocolo, email_usuario, protocolo, protocolo_creado_en, protocolo_modificado_en, borrado', 'safe', 'on'=>'search'),
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
			'emailUsuario' => array(self::BELONGS_TO, 'Usuarios', 'email_usuario'),
			'farmacoses' => array(self::MANY_MANY, 'Farmacos', 'relnm_protocolos_farmacos(nombre_protocolo, id_farmaco)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nombre_protocolo' => 'Nombre Protocolo',
			'email_usuario' => 'Email Usuario',
			'protocolo' => 'Protocolo',
			'protocolo_creado_en' => 'Protocolo Creado En',
			'protocolo_modificado_en' => 'Protocolo Modificado En',
			'borrado' => 'Borrado',
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

		$criteria->compare('nombre_protocolo',$this->nombre_protocolo,true);
		$criteria->compare('email_usuario',$this->email_usuario,true);
		$criteria->compare('protocolo',$this->protocolo,true);
		$criteria->compare('protocolo_creado_en',$this->protocolo_creado_en,true);
		$criteria->compare('protocolo_modificado_en',$this->protocolo_modificado_en,true);
		$criteria->compare('borrado',$this->borrado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Protocolos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
