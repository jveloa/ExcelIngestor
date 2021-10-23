<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property string $carné_estudiante
 * @property string|null $relacion_personal
 * @property string|null $telefono
 * @property string|null $correo
 *
 * @property Estudiante $carnéEstudiante
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carné_estudiante'], 'required'],
            [['carné_estudiante', 'relacion_personal', 'telefono', 'correo'], 'string'],
            [['carné_estudiante'], 'unique'],
            [['carné_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['carné_estudiante' => 'carné']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'carné_estudiante' => 'Carné Estudiante',
            'relacion_personal' => 'Relacion Personal',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }

    /**
     * Gets query for [[CarnéEstudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarnéEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['carné' => 'carné_estudiante']);
    }
}
