<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "resp_preguntas_mas".
 *
 * @property int $id
 * @property string $respuesta
 *
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes0
 * @property Estudiante[] $estudiantes1
 * @property Estudiante[] $estudiantes2
 * @property Estudiante[] $estudiantes3
 * @property Estudiante[] $estudiantes4
 * @property Estudiante[] $estudiantes5
 * @property Estudiante[] $estudiantes6
 * @property Estudiante[] $estudiantes7
 * @property Estudiante[] $estudiantes8
 * @property Estudiante[] $estudiantes9
 */
class RespPreguntasMas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resp_preguntas_mas';
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
        return $this->hasMany(Estudiante::className(), ['id_lo_escencial' => 'id'])->inverseOf('loEscencial');
    }

    /**
     * Gets query for [[Estudiantes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes0()
    {
        return $this->hasMany(Estudiante::className(), ['id_no_solo_de_pan' => 'id'])->inverseOf('noSoloDePan');
    }

    /**
     * Gets query for [[Estudiantes1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes1()
    {
        return $this->hasMany(Estudiante::className(), ['id_camaron_que' => 'id'])->inverseOf('camaronQue');
    }

    /**
     * Gets query for [[Estudiantes2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes2()
    {
        return $this->hasMany(Estudiante::className(), ['id_a_es_menor' => 'id'])->inverseOf('aEsMenor');
    }

    /**
     * Gets query for [[Estudiantes3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes3()
    {
        return $this->hasMany(Estudiante::className(), ['id_editores_texto' => 'id'])->inverseOf('editoresTexto');
    }

    /**
     * Gets query for [[Estudiantes4]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes4()
    {
        return $this->hasMany(Estudiante::className(), ['id_hojas_de_calculo' => 'id'])->inverseOf('hojasDeCalculo');
    }

    /**
     * Gets query for [[Estudiantes5]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes5()
    {
        return $this->hasMany(Estudiante::className(), ['id_editores_presentaciones' => 'id'])->inverseOf('editoresPresentaciones');
    }

    /**
     * Gets query for [[Estudiantes6]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes6()
    {
        return $this->hasMany(Estudiante::className(), ['id_software_grafico' => 'id'])->inverseOf('softwareGrafico');
    }

    /**
     * Gets query for [[Estudiantes7]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes7()
    {
        return $this->hasMany(Estudiante::className(), ['id_lenguajes_programacion' => 'id'])->inverseOf('lenguajesProgramacion');
    }

    /**
     * Gets query for [[Estudiantes8]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes8()
    {
        return $this->hasMany(Estudiante::className(), ['id_dispo_copumtadora' => 'id'])->inverseOf('dispoCopumtadora');
    }

    /**
     * Gets query for [[Estudiantes9]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes9()
    {
        return $this->hasMany(Estudiante::className(), ['id_espacio_estudiar' => 'id'])->inverseOf('espacioEstudiar');
    }
}
