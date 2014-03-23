<?php

/**
 * This is the model class for table "notas".
 *
 * The followings are the available columns in table 'notas':
 * @property string $nombre_nota
 * @property string $email_usuario
 * @property integer $id_farmaco
 * @property string $descripcion
 * @property string $nota_creada_en
 * @property string $nota_modificada_en
 * @property integer $borrado
 *
 * The followings are the available model relations:
 * @property Usuarios $emailUsuario
 * @property Farmacos $idFarmaco
 */
class Notas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_nota, email_usuario, id_farmaco, descripcion', 'required'),
			array('id_farmaco, borrado', 'numerical', 'integerOnly'=>true),
			array('nombre_nota', 'length', 'max'=>25),
			array('email_usuario', 'length', 'max'=>100),
			array('nota_creada_en, nota_modificada_en', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nombre_nota, email_usuario, id_farmaco, descripcion, nota_creada_en, nota_modificada_en, borrado', 'safe', 'on'=>'search'),
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
			'idFarmaco' => array(self::BELONGS_TO, 'Farmacos', 'id_farmaco'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nombre_nota' => 'Nombre Nota',
			'email_usuario' => 'Email Usuario',
			'id_farmaco' => 'Id Farmaco',
			'descripcion' => 'Descripcion',
			'nota_creada_en' => 'Nota Creada En',
			'nota_modificada_en' => 'Nota Modificada En',
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

		$criteria->compare('nombre_nota',$this->nombre_nota,true);
		$criteria->compare('email_usuario',$this->email_usuario,true);
		$criteria->compare('id_farmaco',$this->id_farmaco);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('nota_creada_en',$this->nota_creada_en,true);
		$criteria->compare('nota_modificada_en',$this->nota_modificada_en,true);
		$criteria->compare('borrado',$this->borrado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
