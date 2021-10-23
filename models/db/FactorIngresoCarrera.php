<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "factor_ingreso_carrera".
 *
 * @property string $id_estudiante
 * @property int $id_respuesta
 *
 * @property Estudiante $estudiante
 * @property RespSobreEleccionCarrera $respuesta
 */
class FactorIngresoCarrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factor_ingreso_carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_respuesta'], 'required'],
            [['id_estudiante'], 'string'],
            [['id_respuesta'], 'default', 'value' => null],
            [['id_respuesta'], 'integer'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['id_respuesta' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'id_respuesta' => 'Id Respuesta',
        ];
    }

    /**
     * Gets query for [[Estudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['carné' => 'id_estudiante']);
    }

    /**
     * Gets query for [[Respuesta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRespuesta()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'id_respuesta']);
    }
}
