<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "forma_estudio".
 *
 * @property string $id_estudiante
 * @property int $estudio_individual
 * @property int $estudio_grupal
 * @property int $ejercicios
 * @property int $repasadores
 *
 * @property RespSobreEleccionCarrera $ejercicios0
 * @property Estudiante $estudiante
 * @property RespSobreEleccionCarrera $estudioGrupal
 * @property RespSobreEleccionCarrera $estudioIndividual
 * @property RespSobreEleccionCarrera $repasadores0
 */
class FormaEstudio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forma_estudio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'estudio_individual', 'estudio_grupal', 'ejercicios', 'repasadores'], 'required'],
            [['id_estudiante'], 'string'],
            [['estudio_individual', 'estudio_grupal', 'ejercicios', 'repasadores'], 'default', 'value' => null],
            [['estudio_individual', 'estudio_grupal', 'ejercicios', 'repasadores'], 'integer'],
            [['id_estudiante'], 'unique'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
            [['estudio_individual'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['estudio_individual' => 'id']],
            [['estudio_grupal'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['estudio_grupal' => 'id']],
            [['ejercicios'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['ejercicios' => 'id']],
            [['repasadores'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['repasadores' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'estudio_individual' => 'Estudio Individual',
            'estudio_grupal' => 'Estudio Grupal',
            'ejercicios' => 'Ejercicios',
            'repasadores' => 'Repasadores',
        ];
    }

    /**
     * Gets query for [[Ejercicios0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEjercicios0()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'ejercicios']);
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
     * Gets query for [[EstudioGrupal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioGrupal()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'estudio_grupal']);
    }

    /**
     * Gets query for [[EstudioIndividual]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioIndividual()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'estudio_individual']);
    }

    /**
     * Gets query for [[Repasadores0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepasadores0()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'repasadores']);
    }
}
