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
                    ['idDeporte'],
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
                'idDeporte' => 'Deportes',
                'idCurso'   => 'Curso'
            ];
        }
        
        public function getEstudiantes(){
            $lista = [];
            if (isset($this->idDeporte)){
                $lista = Estudiante::find()
                    ->innerJoin('estudiante_deporte', 'estudiante_deporte.id_estudiante = estudiante.carne')
                    ->where(['estudiante_deporte.id_deporte' => $this->idDeporte])
                    ->all();
            }
            return $lista;
        }
        
        public function getCantEstudiantes(){
            $cant = 0;
            if (isset($this->idDeporte)){
                $cant = EstudianteDeporte::find()->where(['id_deporte' => $this->idDeporte])->count();
            }
            return $cant;
        }
    }