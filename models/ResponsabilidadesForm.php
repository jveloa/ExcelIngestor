<?php
    
    
    namespace app\models;
    
    
    use yii\base\Model;

    class ResponsabilidadesForm extends Model{
        public $idResponsabilidades;
    
        public function rules(){
            return [
                [
                    ['idResponsabilidades'],
                    'number'
                ],
            ];
        }
    
        public function attributeLabels(){
            return [
                'idResponsabilidades' => 'Nivel de interés de pertenecer a organizaciones'
            ];
        }
    }