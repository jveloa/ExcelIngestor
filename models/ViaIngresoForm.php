<?php
    
    
    namespace app\models;
    
    
    use yii\base\Model;

    class ViaIngresoForm extends Model{
        public $idIngreso;
    
        public function rules()
        {
            return [
                [['idIngreso'], 'number'],
            ];
        }
        public function attributeLabels()
        {
            return [
                'idIngreso' => 'Lugar de ingreso'
            ];
        }
    }