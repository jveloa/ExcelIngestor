<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property string $nombre
 * @property int $id
 * @property int $id_provincia
 *
 * @property Estudiante[] $estudiantes
 * @property Provincia $provincia
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_provincia'], 'required'],
            [['nombre'], 'string'],
            [['id_provincia'], 'default', 'value' => null],
            [['id_provincia'], 'integer'],
            [['id_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['id_provincia' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nombre' => 'Nombre',
            'id' => 'ID',
            'id_provincia' => 'Id Provincia',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_municipio' => 'id']);
    }

    /**
     * Gets query for [[Provincia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'id_provincia']);
    }
}
