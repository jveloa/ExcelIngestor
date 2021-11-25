<?php
    
    
    namespace app\models;
    
    
    use app\models\db\Estudiante;
    use app\models\db\EstudianteDeporte;
    use yii\base\Model;

    class DeportesForm extends Model{
        public $idDeporte;
        public $idCurso;
        
        public function rules(){
            return [
                [
                    ['idDeporte','idCurso'],
                    'required'
                ],
                [
                    [
                        'idCurso',
                        'idDeporte'
                    ],
                    'number'
                ],
            ];
        }
        
        public function attributeLabels(){
            return [
                'idDeporte' => 'Deporte',
                'idCurso'   => 'Curso'
            ];
        }
        
        public function getEstudiantes(){
            $lista = [];
            if (isset($this->idDeporte)){
                $lista = Estudiante::find()->innerJoin('estudiante_deporte',
                        'estudiante_deporte.id_estudiante = estudiante.carne')
                                   ->where(['estudiante_deporte.id_deporte' => $this->idDeporte])
                                   ->andWhere(['id_curso' => $this->idCurso])
                    ->all();
            }
            return $lista;
        }
        
        public function getCantEstudiantes(){
            $cant = 0;
            if (isset($this->idDeporte)){
                $cant = Estudiante::find()->innerJoin('estudiante_deporte',
                    'estudiante_deporte.id_estudiante = estudiante.carne')
                                  ->where(['estudiante_deporte.id_deporte' => $this->idDeporte])
                                  ->andWhere(['id_curso' => $this->idCurso])
                                  ->count();
            }
            return $cant;
        }
    }