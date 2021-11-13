<?php


namespace app\models;
use yii\base\Model;

class EstadisticasCursoForm extends Model
{
    public $cursoid;

    public function rules()
    {
        return [
            [['cursoid'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cursoid' => 'Curso académico'
        ];
    }


}