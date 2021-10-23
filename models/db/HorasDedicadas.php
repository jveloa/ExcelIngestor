<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "horas_dedicadas".
 *
 * @property int $horas_estudio
 * @property int $horas_trabajos
 * @property int $horas_recreacion
 * @property string $id_estudiante
 *
 * @property Estudiante $estudiante
 * @property RespSobreEleccionCarrera $horasEstudio
 * @property RespSobreEleccionCarrera $horasRecreacion
 * @property RespSobreEleccionCarrera $horasTrabajos
 */
class HorasDedicadas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horas_dedicadas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horas_estudio', 'horas_trabajos', 'horas_recreacion', 'id_estudiante'], 'required'],
            [['horas_estudio', 'horas_trabajos', 'horas_recreacion'], 'default', 'value' => null],
            [['horas_estudio', 'horas_trabajos', 'horas_recreacion'], 'integer'],
            [['id_estudiante'], 'string'],
            [['id_estudiante'], 'unique'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
            [['horas_estudio'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['horas_estudio' => 'id']],
            [['horas_trabajos'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['horas_trabajos' => 'id']],
            [['horas_recreacion'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['horas_recreacion' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'horas_estudio' => 'Horas Estudio',
            'horas_trabajos' => 'Horas Trabajos',
            'horas_recreacion' => 'Horas Recreacion',
            'id_estudiante' => 'Id Estudiante',
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
     * Gets query for [[HorasEstudio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasEstudio()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'horas_estudio']);
    }

    /**
     * Gets query for [[HorasRecreacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasRecreacion()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'horas_recreacion']);
    }

    /**
     * Gets query for [[HorasTrabajos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasTrabajos()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'horas_trabajos']);
    }
}
