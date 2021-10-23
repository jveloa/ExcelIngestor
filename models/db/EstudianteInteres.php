<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "estudiante_interes".
 *
 * @property string $id_estudiante
 * @property int $organizaciones_estudiantiles
 * @property int $problemas_soci_ambien
 * @property int $practicas_laborales
 *
 * @property Estudiante $estudiante
 * @property NivelInteres $organizacionesEstudiantiles
 * @property NivelInteres $practicasLaborales
 * @property NivelInteres $problemasSociAmbien
 */
class EstudianteInteres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante_interes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'organizaciones_estudiantiles', 'problemas_soci_ambien', 'practicas_laborales'], 'required'],
            [['id_estudiante'], 'string'],
            [['organizaciones_estudiantiles', 'problemas_soci_ambien', 'practicas_laborales'], 'default', 'value' => null],
            [['organizaciones_estudiantiles', 'problemas_soci_ambien', 'practicas_laborales'], 'integer'],
            [['id_estudiante'], 'unique'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
            [['organizaciones_estudiantiles'], 'exist', 'skipOnError' => true, 'targetClass' => NivelInteres::className(), 'targetAttribute' => ['organizaciones_estudiantiles' => 'id']],
            [['problemas_soci_ambien'], 'exist', 'skipOnError' => true, 'targetClass' => NivelInteres::className(), 'targetAttribute' => ['problemas_soci_ambien' => 'id']],
            [['practicas_laborales'], 'exist', 'skipOnError' => true, 'targetClass' => NivelInteres::className(), 'targetAttribute' => ['practicas_laborales' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'organizaciones_estudiantiles' => 'Organizaciones Estudiantiles',
            'problemas_soci_ambien' => 'Problemas Soci Ambien',
            'practicas_laborales' => 'Practicas Laborales',
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
     * Gets query for [[OrganizacionesEstudiantiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizacionesEstudiantiles()
    {
        return $this->hasOne(NivelInteres::className(), ['id' => 'organizaciones_estudiantiles']);
    }

    /**
     * Gets query for [[PracticasLaborales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPracticasLaborales()
    {
        return $this->hasOne(NivelInteres::className(), ['id' => 'practicas_laborales']);
    }

    /**
     * Gets query for [[ProblemasSociAmbien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProblemasSociAmbien()
    {
        return $this->hasOne(NivelInteres::className(), ['id' => 'problemas_soci_ambien']);
    }
}
