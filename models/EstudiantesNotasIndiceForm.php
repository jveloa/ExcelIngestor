<?php


namespace app\models;


use yii\base\Model;

class EstudiantesNotasIndiceForm extends Model
{

    public $indiceChk;
    public $notasChk;

    public function rules()
    {
        return [
            [['indiceChk'], 'boolean'],
            [['notasChk'], 'boolean'],
        ];
    }


}