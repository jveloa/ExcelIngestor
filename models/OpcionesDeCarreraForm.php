<?php
    
    
    namespace app\models;
    
    
    use app\models\db\Curso;
    use app\models\db\Estudiante;
    use yii\base\Model;
    use yii\helpers\BaseArrayHelper;
    
    class OpcionesDeCarreraForm extends Model{
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
        
        public function getPorcientosOpciones(){
            $idCurso = $this->idCurso;
            if(isset($idCurso)){
                $total = Estudiante::find()->where(['id_curso' => $idCurso])->count();
    
                $porOpc1 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '1'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc2 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '2'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc3 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '3'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc4 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '4'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc5 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '5'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc6 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '6'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc7 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '7'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc8 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '8'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc9 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                     ->where(['resp_sobre_eleccion.respuesta' => '9'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc10 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                          'resp_sobre_eleccion.id = estudiante.carerra_opcion')
                                      ->where(['resp_sobre_eleccion.respuesta' => '10'])
                                      ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                return $porcientoOpciones = ['1' => $porOpc1,
                                             '2' => $porOpc2,
                                             '3' => $porOpc3,
                                             '4' => $porOpc4,
                                             '5' => $porOpc5,
                                             '6' => $porOpc6,
                                             '7' => $porOpc7,
                                             '8' => $porOpc8,
                                             '9' => $porOpc9,
                                             '10' => $porOpc10,];
                
            }
            return [];
        }
        
        public function getCursos(){
            $listaCursos = Curso::find()->all();
            return BaseArrayHelper::map($listaCursos, 'id', 'curso');
        }
    }