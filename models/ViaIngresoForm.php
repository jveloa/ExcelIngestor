<?php
    
    
    namespace app\models;
    
    
    use yii\base\Model;

    class ViaIngresoForm extends Model{
        public $idIngreso;
        public $cursoid;
    
        public function rules()
        {
            return [
                [['idIngreso'], 'number'],
                [['cursoid'], 'number'],
                [['idIngreso','cursoid'],'required'],
            ];
        }
        public function attributeLabels()
        {
            return [
                'idIngreso' => 'Vía de ingreso',
                'cursoid' => 'Curso académico'
            ];
        }
    }