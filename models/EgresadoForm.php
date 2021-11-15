<?php


namespace app\models;
use yii\base\Model;


class EgresadoForm extends Model


{
   public $egresoid;
    public $cursoid;

    public function rules()
    {
        return [
            [['egresoid'], 'number'],
            [['cursoid'], 'number'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'egresoid' => 'Lugar de egreso',
            'cursoid' => 'Curso académico'
        ];
    }
}
