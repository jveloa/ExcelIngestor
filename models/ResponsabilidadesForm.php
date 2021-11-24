<?php
    
    
    namespace app\models;
    
    
    use yii\base\Model;

    class ResponsabilidadesForm extends Model{
        public $idResponsabilidades;
        public $idCurso;
    
        public function rules(){
            return [
                [
                    ['idResponsabilidades'],
                    'number',
                ],
                [
                    ['idCurso'],
                    'number',
                ],
                [
                    ['idCurso','idResponsabilidades'],
                    'required'
                ],
            ];
        }
    
        public function attributeLabels(){
            return [
                'idResponsabilidades' => 'Nivel de interés de pertenecer a organizaciones',
                'idCurso'             => 'Curso'
            ];
        }
    }