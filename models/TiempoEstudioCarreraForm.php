<?php
    
    
    namespace app\models;
    
    use app\models\db\Curso;
    use app\models\db\Estudiante;
    use yii\base\Model;
    use yii\helpers\BaseArrayHelper;
    
    class TiempoEstudioCarreraForm extends Model{
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
        
        public function getPorcientosTiempoEstudio(){
            $idCurso = $this->idCurso;
            if (isset($idCurso)){
                $total = Estudiante::find()->where(['id_curso' => $idCurso])->count();
                
                $porOpc1 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                       'resp_sobre_eleccion.id = estudiante.id_desicion_estudiar')
                        ->where(['resp_sobre_eleccion.respuesta' => 'Desde pequeño'])
                        ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc2 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.id_desicion_estudiar')
                                     ->where(['resp_sobre_eleccion.respuesta' => 'Hace más de 2 años'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc3 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.id_desicion_estudiar')
                                     ->where(['resp_sobre_eleccion.respuesta' => 'Hace un año (aproximadamente)'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc4 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.id_desicion_estudiar')
                                     ->where(['resp_sobre_eleccion.respuesta' => 'Desde que analicé las opciones posibles'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
    
                $porOpc5 = Estudiante::find()->innerJoin('resp_sobre_eleccion',
                                                         'resp_sobre_eleccion.id = estudiante.id_desicion_estudiar')
                                     ->where(['resp_sobre_eleccion.respuesta' => 'Desde que me la otorgaron'])
                                     ->andWhere(['id_curso' => $idCurso])->count() * 100 / $total;
                
                return $porcientosOpciones = ['1' => $porOpc1,
                                              '2' => $porOpc2,
                                              '3' => $porOpc3,
                                              '4' => $porOpc4,
                                              '5' => $porOpc5,
                ];
                
            }
            return [];
            
        }
    }