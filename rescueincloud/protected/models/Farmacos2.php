<?php

/**
 * This is the model class for table "farmacos".
 *
 * The followings are the available columns in table 'farmacos':
 * @property integer $id_farmaco
 * @property string $nombre_farmaco
 * @property string $nombre_fabricante
 * @property string $presentacion_farmaco
 * @property string $tipo_administracion
 * @property string $creado_en
 * @property string $modificado_en
 * @property string $descripcion_farmaco
 * @property integer $borrado
 *
 * The followings are the available model relations:
 * @property Notas[] $notases
 * @property Usuarios[] $usuarioses
 * @property Protocolos[] $protocoloses
 */
class Farmacos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'farmacos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_farmaco, nombre_fabricante, presentacion_farmaco, tipo_administracion, creado_en, descripcion_farmaco, borrado', 'required'),
			array('borrado', 'numerical', 'integerOnly'=>true),
			array('nombre_farmaco, nombre_fabricante, presentacion_farmaco, tipo_administracion', 'length', 'max'=>100),
			array('descripcion_farmaco', 'length', 'max'=>500),
			array('modificado_en', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_farmaco, nombre_farmaco, nombre_fabricante, presentacion_farmaco, tipo_administracion, creado_en, modificado_en, descripcion_farmaco, borrado', 'safe', 'on'=>'search'),
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
			'notases' => array(self::HAS_MANY, 'Notas', 'id_farmaco'),
			'usuarioses' => array(self::MANY_MANY, 'Usuarios', 'relnm_farmacos_usuarios(id_farmaco, email_usuario)'),
			'protocoloses' => array(self::MANY_MANY, 'Protocolos', 'relnm_protocolos_farmacos(id_farmaco, nombre_protocolo)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_farmaco' => 'Id Farmaco',
			'nombre_farmaco' => 'Nombre Farmaco',
			'nombre_fabricante' => 'Nombre Fabricante',
			'presentacion_farmaco' => 'Presentacion Farmaco',
			'tipo_administracion' => 'Tipo Administracion',
			'creado_en' => 'Creado En',
			'modificado_en' => 'Modificado En',
			'descripcion_farmaco' => 'Descripcion Farmaco',
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

		$criteria->compare('id_farmaco',$this->id_farmaco);
		$criteria->compare('nombre_farmaco',$this->nombre_farmaco,true);
		$criteria->compare('nombre_fabricante',$this->nombre_fabricante,true);
		$criteria->compare('presentacion_farmaco',$this->presentacion_farmaco,true);
		$criteria->compare('tipo_administracion',$this->tipo_administracion,true);
		$criteria->compare('creado_en',$this->creado_en,true);
		$criteria->compare('modificado_en',$this->modificado_en,true);
		$criteria->compare('descripcion_farmaco',$this->descripcion_farmaco,true);
		$criteria->compare('borrado',$this->borrado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Farmacos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
