<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "resp_sobre_eleccion_carrera".
 *
 * @property int $id
 * @property string|null $respuesta
 * @property string|null $pregunta a que pregunta corresponde dicha respuesta
 *
 * @property EstudianteAspectoProfesion[] $estudianteAspectoProfesions
 * @property ExperienciaCarrera[] $experienciaCarreras
 * @property FactorIngresoCarrera[] $factorIngresoCarreras
 * @property FormaEstudio[] $formaEstudios
 * @property FormaEstudio[] $formaEstudios0
 * @property FormaEstudio[] $formaEstudios1
 * @property FormaEstudio[] $formaEstudios2
 * @property HorasDedicadas[] $horasDedicadas
 * @property HorasDedicadas[] $horasDedicadas0
 * @property HorasDedicadas[] $horasDedicadas1
 * @property RazonIngresoCarrera[] $razonIngresoCarreras
 * @property Rol[] $rols
 * @property Rol[] $rols0
 * @property Rol[] $rols1
 * @property Rol[] $rols2
 * @property Rol[] $rols3
 * @property Rol[] $rols4
 * @property Rol[] $rols5
 * @property Rol[] $rols6
 */
class RespSobreEleccionCarrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resp_sobre_eleccion_carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['respuesta', 'pregunta'], 'string'],
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
            'pregunta' => 'Pregunta',
        ];
    }

    /**
     * Gets query for [[EstudianteAspectoProfesions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteAspectoProfesions()
    {
        return $this->hasMany(EstudianteAspectoProfesion::className(), ['id_respuesta' => 'id']);
    }

    /**
     * Gets query for [[ExperienciaCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExperienciaCarreras()
    {
        return $this->hasMany(ExperienciaCarrera::className(), ['id_respuesta' => 'id']);
    }

    /**
     * Gets query for [[FactorIngresoCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactorIngresoCarreras()
    {
        return $this->hasMany(FactorIngresoCarrera::className(), ['id_respuesta' => 'id']);
    }

    /**
     * Gets query for [[FormaEstudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFormaEstudios()
    {
        return $this->hasMany(FormaEstudio::className(), ['estudio_individual' => 'id']);
    }

    /**
     * Gets query for [[FormaEstudios0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFormaEstudios0()
    {
        return $this->hasMany(FormaEstudio::className(), ['estudio_grupal' => 'id']);
    }

    /**
     * Gets query for [[FormaEstudios1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFormaEstudios1()
    {
        return $this->hasMany(FormaEstudio::className(), ['ejercicios' => 'id']);
    }

    /**
     * Gets query for [[FormaEstudios2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFormaEstudios2()
    {
        return $this->hasMany(FormaEstudio::className(), ['repasadores' => 'id']);
    }

    /**
     * Gets query for [[HorasDedicadas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasDedicadas()
    {
        return $this->hasMany(HorasDedicadas::className(), ['horas_estudio' => 'id']);
    }

    /**
     * Gets query for [[HorasDedicadas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasDedicadas0()
    {
        return $this->hasMany(HorasDedicadas::className(), ['horas_trabajos' => 'id']);
    }

    /**
     * Gets query for [[HorasDedicadas1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasDedicadas1()
    {
        return $this->hasMany(HorasDedicadas::className(), ['horas_recreacion' => 'id']);
    }

    /**
     * Gets query for [[RazonIngresoCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRazonIngresoCarreras()
    {
        return $this->hasMany(RazonIngresoCarrera::className(), ['id_respuesta' => 'id']);
    }

    /**
     * Gets query for [[Rols]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols()
    {
        return $this->hasMany(Rol::className(), ['programador' => 'id']);
    }

    /**
     * Gets query for [[Rols0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols0()
    {
        return $this->hasMany(Rol::className(), ['probador' => 'id']);
    }

    /**
     * Gets query for [[Rols1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols1()
    {
        return $this->hasMany(Rol::className(), ['diseñador_software' => 'id']);
    }

    /**
     * Gets query for [[Rols2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols2()
    {
        return $this->hasMany(Rol::className(), ['diseñador_interfaz' => 'id']);
    }

    /**
     * Gets query for [[Rols3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols3()
    {
        return $this->hasMany(Rol::className(), ['especialista_seguridad' => 'id']);
    }

    /**
     * Gets query for [[Rols4]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols4()
    {
        return $this->hasMany(Rol::className(), ['escritor_expositor' => 'id']);
    }

    /**
     * Gets query for [[Rols5]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols5()
    {
        return $this->hasMany(Rol::className(), ['gestor_proyecto' => 'id']);
    }

    /**
     * Gets query for [[Rols6]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRols6()
    {
        return $this->hasMany(Rol::className(), ['facilitador_desiciones' => 'id']);
    }
}
