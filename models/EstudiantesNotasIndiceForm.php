<?php


namespace app\models;


use yii\base\Model;

class EstudiantesNotasIndiceForm extends Model
{

    public $indiceChk;
    public $notasChk;
    public $cursoid;

    public function rules()
    {
        return [
            [['indiceChk'], 'number'],
            [['notasChk'], 'number'],
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