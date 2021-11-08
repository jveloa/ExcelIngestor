<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "resp_sobre_eleccion".
 *
 * @property string $respuesta
 * @property int $id
 *
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes0
 * @property Estudiante[] $estudiantes1
 */
class RespSobreEleccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resp_sobre_eleccion';
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
            'respuesta' => 'Respuesta',
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['carerra_opcion' => 'id'])->inverseOf('carerraOpcion');
    }

    /**
     * Gets query for [[Estudiantes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes0()
    {
        return $this->hasMany(Estudiante::className(), ['id_tiempo_transcurrido' => 'id'])->inverseOf('tiempoTranscurrido');
    }

    /**
     * Gets query for [[Estudiantes1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes1()
    {
        return $this->hasMany(Estudiante::className(), ['id_desicion_estudiar' => 'id'])->inverseOf('desicionEstudiar');
    }
}
