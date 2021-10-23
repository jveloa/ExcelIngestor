<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "participacion_concurso".
 *
 * @property string $id_estudiante
 * @property int $id_asignatura
 *
 * @property AsignaturaConcurso $asignatura
 * @property Estudiante $estudiante
 */
class ParticipacionConcurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participacion_concurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_asignatura'], 'required'],
            [['id_estudiante'], 'string'],
            [['id_asignatura'], 'default', 'value' => null],
            [['id_asignatura'], 'integer'],
            [['id_asignatura'], 'exist', 'skipOnError' => true, 'targetClass' => AsignaturaConcurso::className(), 'targetAttribute' => ['id_asignatura' => 'id']],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'id_asignatura' => 'Id Asignatura',
        ];
    }

    /**
     * Gets query for [[Asignatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignatura()
    {
        return $this->hasOne(AsignaturaConcurso::className(), ['id' => 'id_asignatura']);
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
}
