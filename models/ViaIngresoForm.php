<?php
    
    
    namespace app\models;


    use app\models\db\Estudiante;
    use yii\base\Model;

    class ViaIngresoForm extends Model{
        public $idIngreso;
        public $cursoid;
    
        public function rules(){
            return [
                [['idIngreso'], 'number'], [['cursoid'], 'number'], [['cursoid', 'idIngreso'], 'required'],
            ];
        }
    
        public function attributeLabels(){
            return [
                'idIngreso' => 'Vía de ingreso', 'cursoid' => 'Curso académico'
            ];
        }
    
        public function getEstudiantes(){
            $estudiantes = Estudiante::find()->where(['id_ingreso' => $this->idIngreso, 'id_curso' => $this->cursoid])
                                     ->orderBy("carne")->all();
            return $estudiantes;
        }
    
        public function getCantEstudiantes(){
            $cantEstudiantes = Estudiante::find()->where([
                'id_ingreso' => $this->idIngreso, 'id_curso' => $this->cursoid,
            ])->count();
            return $cantEstudiantes;
        }
    
    
    }