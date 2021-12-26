<?php
    
    
    namespace app\models;
    
    
    use app\models\db\Curso;
    use app\models\db\Estudiante;
    use yii\base\Model;
    use yii\helpers\BaseArrayHelper;
    
    class RazonesIngresoForm extends Model{
        public $idCurso;
        
        public function rules(){
            return [[['idCurso'],
                     'required'],
                    [['idCurso'],
                     'number'],];
        }
        
        public function attributeLabels(){
            return ['idCurso' => 'Curso'];
        }
        
        public function getCursos(){
            $listaCursos = Curso::find()->all();
            return BaseArrayHelper::map($listaCursos, 'id', 'curso');
        }
        
        public function getProcientosRazones(){
            $idCurso = $this->idCurso;
            if (isset($idCurso)){
                $total = Estudiante::find()->where(['id_curso' => $idCurso])->count();
                
                $porOpc1 = Estudiante::find()->where(['xq_me_gusta' => True])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                $porOpc2 = Estudiante::find()->where(['para_tener_titulo' => True])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                $porOpc3 = Estudiante::find()->where(['complacer_padres' => True])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                $porOpc4 = Estudiante::find()->where(['prepararme_futuro' => True])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                $porOpc5 = Estudiante::find()->where(['se_parece_a_otra' => True])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                $porOpc6 = Estudiante::find()->where(['para_ser_alguien' => True])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                $porOpc7 = Estudiante::find()->where(['razones_otras' => True])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                
                return $porcientoRazones = ['1' => $porOpc1,
                                            '2' => $porOpc2,
                                            '3' => $porOpc3,
                                            '4' => $porOpc4,
                                            '5' => $porOpc5,
                                            '6' => $porOpc6,
                                            '7' => $porOpc7,];
            }
            return [];
        }
    }