<?php
    
    
    namespace app\models;
    
    
    use app\models\db\Estudiante;
    use app\models\db\EstudianteArte;
    use app\models\db\EstudianteDeporte;
    use yii\base\Model;
    
    class ArtesForm extends Model{
        public $idArte;
        public $idCurso;
        
        public function rules(){
            return [
                [
                    ['idArte','idCurso'],
                    'required'
                ],
                [
                    [
                        'idCurso',
                        'idArte'
                    ],
                    'number'
                ],
            ];
        }
        
        public function attributeLabels(){
            return [
                'idArte' => 'Manifestación artística',
                'idCurso'   => 'Curso'
            ];
        }
        
        public function getEstudiantes(){
            $lista = [];
            if (isset($this->idArte)){
                $lista = Estudiante::find()
                    ->innerJoin('estudiante_arte', 'estudiante_arte.id_estudiante = estudiante.carne')
                    ->where(['estudiante_arte.id_arte' => $this->idArte])
                    ->andWhere(['id_curso'=> $this->idCurso])
                    ->all();
            }
            return $lista;
        }
        
        public function getCantEstudiantes(){
            $cant = 0;
            if (isset($this->idArte)){
                $cant = Estudiante::find()
                                  ->innerJoin('estudiante_arte', 'estudiante_arte.id_estudiante = estudiante.carne')
                                  ->where(['estudiante_arte.id_arte' => $this->idArte])
                                  ->andWhere(['id_curso'=> $this->idCurso])
                                  ->count();
            }
            return $cant;
        }
    }