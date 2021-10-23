<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "estudiante_preg_resp".
 *
 * @property string $id_estudiante
 * @property int $id_pregunta
 * @property int $id_respuesta
 *
 * @property Estudiante $estudiante
 * @property Pregunta $pregunta
 * @property Respuesta $respuesta
 */
class EstudiantePregResp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante_preg_resp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_pregunta', 'id_respuesta'], 'required'],
            [['id_estudiante'], 'string'],
            [['id_pregunta', 'id_respuesta'], 'default', 'value' => null],
            [['id_pregunta', 'id_respuesta'], 'integer'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Respuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'id_pregunta' => 'Id Pregunta',
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
     * Gets query for [[Pregunta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPregunta()
    {
        return $this->hasOne(Pregunta::className(), ['id' => 'id_pregunta']);
    }

    /**
     * Gets query for [[Respuesta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRespuesta()
    {
        return $this->hasOne(Respuesta::className(), ['id' => 'id_respuesta']);
    }
}
