<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "estudiante_aspecto_profesion".
 *
 * @property string $id_estudiante
 * @property int $id_aspecto_profesion
 * @property int $id_respuesta
 *
 * @property AspectoProfesion $aspectoProfesion
 * @property Estudiante $estudiante
 * @property RespSobreEleccionCarrera $respuesta
 */
class EstudianteAspectoProfesion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante_aspecto_profesion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_aspecto_profesion', 'id_respuesta'], 'required'],
            [['id_estudiante'], 'string'],
            [['id_aspecto_profesion', 'id_respuesta'], 'default', 'value' => null],
            [['id_aspecto_profesion', 'id_respuesta'], 'integer'],
            [['id_estudiante'], 'unique'],
            [['id_aspecto_profesion'], 'exist', 'skipOnError' => true, 'targetClass' => AspectoProfesion::className(), 'targetAttribute' => ['id_aspecto_profesion' => 'id']],
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
            'id_aspecto_profesion' => 'Id Aspecto Profesion',
            'id_respuesta' => 'Id Respuesta',
        ];
    }

    /**
     * Gets query for [[AspectoProfesion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAspectoProfesion()
    {
        return $this->hasOne(AspectoProfesion::className(), ['id' => 'id_aspecto_profesion']);
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
