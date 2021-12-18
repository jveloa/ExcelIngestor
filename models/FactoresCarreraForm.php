<?php


namespace app\models;


use app\models\db\Curso;
use app\models\db\Estudiante;
use yii\helpers\BaseArrayHelper;

class FactoresCarreraForm extends \yii\base\Model
{

    public $idCurso;

    public function rules()
    {
        return [[['idCurso'],
            'required'],
            [['idCurso'],
                'number'],];
    }

    public function attributeLabels()
    {
        return ['idCurso' => 'Curso'];
    }

    public function getCursos()
    {
        $listaCursos = Curso::find()->all();
        return BaseArrayHelper::map($listaCursos, 'id', 'curso');
    }

    public function getPorcientosFactores()
    {
        $idCurso = $this->idCurso;
        if (isset($idCurso)) {
            $total = Estudiante::find()->where(['id_curso' => $idCurso])->count();

            $sugerenciaFamiliar = Estudiante::find()->where(['sugerencia_familiar' => true])->andWhere(['id_curso' => $idCurso])->count();
            $familia = Estudiante::find()->where(['familia' => true])->andWhere(['id_curso' => $idCurso])->count();
            $amigos = Estudiante::find()->where(['amigos' => true])->andWhere(['id_curso' => $idCurso])->count();
            $desicionPersonal = Estudiante::find()->where(['desicion_personal' => true])->andWhere(['id_curso' => $idCurso])->count();
            $profesores = Estudiante::find()->where(['profesores' => true])->andWhere(['id_curso' => $idCurso])->count();
            $vocacion = Estudiante::find()->where(['vocacion' => true])->andWhere(['id_curso' => $idCurso])->count();
            $campannas_divulgativas = Estudiante::find()->where(['campañas_divulgativas' => true])->andWhere(['id_curso' => $idCurso])->count();
            $seguir_con_amigos = Estudiante::find()->where(['seguir_con_amigos' => true])->andWhere(['id_curso' => $idCurso])->count();
            $noOportunidad = Estudiante::find()->where(['no_oportunidad' => true])->andWhere(['id_curso' => $idCurso])->count();
            $influenciasOtras = Estudiante::find()->where(['influencias_otras' => true])->andWhere(['id_curso' => $idCurso])->count();

            return $porcientosfactores = [
                '1' => $sugerenciaFamiliar * 100 / $total,
                '2' => $familia * 100 / $total,
                '3' => $amigos * 100 / $total,
                '4' => $desicionPersonal * 100 / $total,
                '5' => $profesores * 100 / $total,
                '6' => $vocacion * 100 / $total,
                '7' => $campannas_divulgativas * 100 / $total,
                '8' => $seguir_con_amigos * 100 / $total,
                '9' => $noOportunidad * 100 / $total,
                '10' => $influenciasOtras * 100 / $total,

            ];

        }
    }
}