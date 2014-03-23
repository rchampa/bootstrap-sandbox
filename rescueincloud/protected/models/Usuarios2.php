<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property string $email_usuario
 * @property string $dni
 * @property string $nombre
 * @property string $apellidos
 * @property integer $genero
 * @property string $fecha_nacimiento
 * @property string $centro_trabajo
 * @property string $usuario_creado_en
 * @property string $usuario_actualizado_en
 * @property integer $borrado
 *
 * The followings are the available model relations:
 * @property Notas[] $notases
 * @property Protocolos[] $protocoloses
 * @property Farmacos[] $farmacoses
 */
class Usuarios2 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_usuario, dni, nombre, apellidos, genero, fecha_nacimiento, centro_trabajo', 'required'),
			array('genero, borrado', 'numerical', 'integerOnly'=>true),
			array('email_usuario, centro_trabajo', 'length', 'max'=>100),
			array('dni', 'length', 'max'=>9),
			array('nombre, apellidos', 'length', 'max'=>30),
			array('usuario_creado_en, usuario_actualizado_en', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('email_usuario, dni, nombre, apellidos, genero, fecha_nacimiento, centro_trabajo, usuario_creado_en, usuario_actualizado_en, borrado', 'safe', 'on'=>'search'),
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
			'notases' => array(self::HAS_MANY, 'Notas', 'email_usuario'),
			'protocoloses' => array(self::HAS_MANY, 'Protocolos', 'email_usuario'),
			'farmacoses' => array(self::MANY_MANY, 'Farmacos', 'relnm_farmacos_usuarios(email_usuario, id_farmaco)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email_usuario' => 'Email Usuario',
			'dni' => 'Dni',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'genero' => 'Genero',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'centro_trabajo' => 'Centro Trabajo',
			'usuario_creado_en' => 'Usuario Creado En',
			'usuario_actualizado_en' => 'Usuario Actualizado En',
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

		$criteria->compare('email_usuario',$this->email_usuario,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('genero',$this->genero);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('centro_trabajo',$this->centro_trabajo,true);
		$criteria->compare('usuario_creado_en',$this->usuario_creado_en,true);
		$criteria->compare('usuario_actualizado_en',$this->usuario_actualizado_en,true);
		$criteria->compare('borrado',$this->borrado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
