<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property string $id_estudiante
 * @property int $programador
 * @property int $probador
 * @property int $diseñador_software
 * @property int $diseñador_interfaz
 * @property int $especialista_seguridad
 * @property int $escritor_expositor
 * @property int $gestor_proyecto
 * @property int $facilitador_desiciones
 *
 * @property RespSobreEleccionCarrera $diseñadorInterfaz
 * @property RespSobreEleccionCarrera $diseñadorSoftware
 * @property RespSobreEleccionCarrera $escritorExpositor
 * @property RespSobreEleccionCarrera $especialistaSeguridad
 * @property Estudiante $estudiante
 * @property RespSobreEleccionCarrera $facilitadorDesiciones
 * @property RespSobreEleccionCarrera $gestorProyecto
 * @property RespSobreEleccionCarrera $probador0
 * @property RespSobreEleccionCarrera $programador0
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'programador', 'probador', 'diseñador_software', 'diseñador_interfaz', 'especialista_seguridad', 'escritor_expositor', 'gestor_proyecto', 'facilitador_desiciones'], 'required'],
            [['id_estudiante'], 'string'],
            [['programador', 'probador', 'diseñador_software', 'diseñador_interfaz', 'especialista_seguridad', 'escritor_expositor', 'gestor_proyecto', 'facilitador_desiciones'], 'default', 'value' => null],
            [['programador', 'probador', 'diseñador_software', 'diseñador_interfaz', 'especialista_seguridad', 'escritor_expositor', 'gestor_proyecto', 'facilitador_desiciones'], 'integer'],
            [['id_estudiante'], 'unique'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
            [['programador'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['programador' => 'id']],
            [['probador'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['probador' => 'id']],
            [['diseñador_software'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['diseñador_software' => 'id']],
            [['diseñador_interfaz'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['diseñador_interfaz' => 'id']],
            [['especialista_seguridad'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['especialista_seguridad' => 'id']],
            [['escritor_expositor'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['escritor_expositor' => 'id']],
            [['gestor_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['gestor_proyecto' => 'id']],
            [['facilitador_desiciones'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccionCarrera::className(), 'targetAttribute' => ['facilitador_desiciones' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'programador' => 'Programador',
            'probador' => 'Probador',
            'diseñador_software' => 'Diseñador Software',
            'diseñador_interfaz' => 'Diseñador Interfaz',
            'especialista_seguridad' => 'Especialista Seguridad',
            'escritor_expositor' => 'Escritor Expositor',
            'gestor_proyecto' => 'Gestor Proyecto',
            'facilitador_desiciones' => 'Facilitador Desiciones',
        ];
    }

    /**
     * Gets query for [[DiseñadorInterfaz]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiseñadorInterfaz()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'diseñador_interfaz']);
    }

    /**
     * Gets query for [[DiseñadorSoftware]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiseñadorSoftware()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'diseñador_software']);
    }

    /**
     * Gets query for [[EscritorExpositor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscritorExpositor()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'escritor_expositor']);
    }

    /**
     * Gets query for [[EspecialistaSeguridad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialistaSeguridad()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'especialista_seguridad']);
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
     * Gets query for [[FacilitadorDesiciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacilitadorDesiciones()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'facilitador_desiciones']);
    }

    /**
     * Gets query for [[GestorProyecto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGestorProyecto()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'gestor_proyecto']);
    }

    /**
     * Gets query for [[Probador0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProbador0()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'probador']);
    }

    /**
     * Gets query for [[Programador0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramador0()
    {
        return $this->hasOne(RespSobreEleccionCarrera::className(), ['id' => 'programador']);
    }
}
