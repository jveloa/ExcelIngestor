<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "resp_deporte_arte".
 *
 * @property int $id
 * @property string $respuesta
 *
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes0
 */
class RespDeporteArte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resp_deporte_arte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['respuesta'], 'required'],
            [['respuesta'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'respuesta' => 'Respuesta',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_practicas_artes' => 'id'])->inverseOf('practicasArtes');
    }

    /**
     * Gets query for [[Estudiantes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes0()
    {
        return $this->hasMany(Estudiante::className(), ['id_practicas_deportes' => 'id'])->inverseOf('practicasDeportes');
    }
}
