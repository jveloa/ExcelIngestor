<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "resp_sobre_futuro".
 *
 * @property int $id
 * @property string $respuesta
 *
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes0
 * @property Estudiante[] $estudiantes1
 * @property Estudiante[] $estudiantes10
 * @property Estudiante[] $estudiantes11
 * @property Estudiante[] $estudiantes12
 * @property Estudiante[] $estudiantes13
 * @property Estudiante[] $estudiantes14
 * @property Estudiante[] $estudiantes15
 * @property Estudiante[] $estudiantes16
 * @property Estudiante[] $estudiantes17
 * @property Estudiante[] $estudiantes18
 * @property Estudiante[] $estudiantes19
 * @property Estudiante[] $estudiantes2
 * @property Estudiante[] $estudiantes20
 * @property Estudiante[] $estudiantes21
 * @property Estudiante[] $estudiantes22
 * @property Estudiante[] $estudiantes23
 * @property Estudiante[] $estudiantes3
 * @property Estudiante[] $estudiantes4
 * @property Estudiante[] $estudiantes5
 * @property Estudiante[] $estudiantes6
 * @property Estudiante[] $estudiantes7
 * @property Estudiante[] $estudiantes8
 * @property Estudiante[] $estudiantes9
 */
class RespSobreFuturo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resp_sobre_futuro';
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
        return $this->hasMany(Estudiante::className(), ['id_mantener_est_carrera' => 'id'])->inverseOf('mantenerEstCarrera');
    }

    /**
     * Gets query for [[Estudiantes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes0()
    {
        return $this->hasMany(Estudiante::className(), ['id_trabajo_graduado' => 'id'])->inverseOf('trabajoGraduado');
    }

    /**
     * Gets query for [[Estudiantes1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes1()
    {
        return $this->hasMany(Estudiante::className(), ['id_programador' => 'id'])->inverseOf('programador');
    }

    /**
     * Gets query for [[Estudiantes10]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes10()
    {
        return $this->hasMany(Estudiante::className(), ['id_relacion_carreras' => 'id'])->inverseOf('relacionCarreras');
    }

    /**
     * Gets query for [[Estudiantes11]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes11()
    {
        return $this->hasMany(Estudiante::className(), ['id_importancia_socie' => 'id'])->inverseOf('importanciaSocie');
    }

    /**
     * Gets query for [[Estudiantes12]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes12()
    {
        return $this->hasMany(Estudiante::className(), ['id_influencia_cien_tec' => 'id'])->inverseOf('influenciaCienTec');
    }

    /**
     * Gets query for [[Estudiantes13]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes13()
    {
        return $this->hasMany(Estudiante::className(), ['id_superacion_constante' => 'id'])->inverseOf('superacionConstante');
    }

    /**
     * Gets query for [[Estudiantes14]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes14()
    {
        return $this->hasMany(Estudiante::className(), ['id_horas_estudio' => 'id'])->inverseOf('horasEstudio');
    }

    /**
     * Gets query for [[Estudiantes15]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes15()
    {
        return $this->hasMany(Estudiante::className(), ['id_horas_otros_trabajos' => 'id'])->inverseOf('horasOtrosTrabajos');
    }

    /**
     * Gets query for [[Estudiantes16]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes16()
    {
        return $this->hasMany(Estudiante::className(), ['id_horas_recreacion' => 'id'])->inverseOf('horasRecreacion');
    }

    /**
     * Gets query for [[Estudiantes17]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes17()
    {
        return $this->hasMany(Estudiante::className(), ['id_estudio_libro' => 'id'])->inverseOf('estudioLibro');
    }

    /**
     * Gets query for [[Estudiantes18]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes18()
    {
        return $this->hasMany(Estudiante::className(), ['id_estudio_grupal' => 'id'])->inverseOf('estudioGrupal');
    }

    /**
     * Gets query for [[Estudiantes19]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes19()
    {
        return $this->hasMany(Estudiante::className(), ['id_estudio_ejercicios' => 'id'])->inverseOf('estudioEjercicios');
    }

    /**
     * Gets query for [[Estudiantes2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes2()
    {
        return $this->hasMany(Estudiante::className(), ['id_probador' => 'id'])->inverseOf('probador');
    }

    /**
     * Gets query for [[Estudiantes20]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes20()
    {
        return $this->hasMany(Estudiante::className(), ['id_estudio_repasadores' => 'id'])->inverseOf('estudioRepasadores');
    }

    /**
     * Gets query for [[Estudiantes21]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes21()
    {
        return $this->hasMany(Estudiante::className(), ['id_interes_apoyar_orga' => 'id'])->inverseOf('interesApoyarOrga');
    }

    /**
     * Gets query for [[Estudiantes22]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes22()
    {
        return $this->hasMany(Estudiante::className(), ['id_interes_prob_soc_ambi' => 'id'])->inverseOf('interesProbSocAmbi');
    }

    /**
     * Gets query for [[Estudiantes23]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes23()
    {
        return $this->hasMany(Estudiante::className(), ['id_interes_prac_laborales' => 'id'])->inverseOf('interesPracLaborales');
    }

    /**
     * Gets query for [[Estudiantes3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes3()
    {
        return $this->hasMany(Estudiante::className(), ['id_diseñador_sotf' => 'id'])->inverseOf('diseñadorSotf');
    }

    /**
     * Gets query for [[Estudiantes4]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes4()
    {
        return $this->hasMany(Estudiante::className(), ['id_diseñador_ui_ux' => 'id'])->inverseOf('diseñadorUiUx');
    }

    /**
     * Gets query for [[Estudiantes5]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes5()
    {
        return $this->hasMany(Estudiante::className(), ['id_seguridad' => 'id'])->inverseOf('seguridad');
    }

    /**
     * Gets query for [[Estudiantes6]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes6()
    {
        return $this->hasMany(Estudiante::className(), ['id_escritor_expositor' => 'id'])->inverseOf('escritorExpositor');
    }

    /**
     * Gets query for [[Estudiantes7]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes7()
    {
        return $this->hasMany(Estudiante::className(), ['id_gestor_proyectos' => 'id'])->inverseOf('gestorProyectos');
    }

    /**
     * Gets query for [[Estudiantes8]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes8()
    {
        return $this->hasMany(Estudiante::className(), ['id_facilitador_desiciones' => 'id'])->inverseOf('facilitadorDesiciones');
    }

    /**
     * Gets query for [[Estudiantes9]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes9()
    {
        return $this->hasMany(Estudiante::className(), ['id_desempeño_profesional' => 'id'])->inverseOf('desempeñoProfesional');
    }
}
