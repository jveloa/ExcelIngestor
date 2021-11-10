<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "estudiante_deporte".
 *
 * @property string $id_estudiante
 * @property int $id_deporte
 *
 * @property Deporte $deporte
 * @property Estudiante $estudiante
 */
class EstudianteDeporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante_deporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_deporte'], 'required'],
            [['id_estudiante'], 'string'],
            [['id_deporte'], 'default', 'value' => null],
            [['id_deporte'], 'integer'],
            [['id_deporte'], 'exist', 'skipOnError' => true, 'targetClass' => Deporte::className(), 'targetAttribute' => ['id_deporte' => 'id']],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carne']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'id_deporte' => 'Id Deporte',
        ];
    }

    /**
     * Gets query for [[Deporte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeporte()
    {
        return $this->hasOne(Deporte::className(), ['id' => 'id_deporte'])->inverseOf('estudianteDeportes');
    }

    /**
     * Gets query for [[Estudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['carne' => 'id_estudiante'])->inverseOf('estudianteDeportes');
    }
}
