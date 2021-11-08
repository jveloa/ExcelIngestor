<?php


namespace app\models;
use yii\base\Model;


class EgresadoForm extends Model


{
   public $egresoid;

    public function rules()
    {
        return [
            [['egresoid'], 'number'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'egresoid' => 'Lista de lugares de egresos'
        ];
    }
}
