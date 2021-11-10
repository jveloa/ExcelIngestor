<?php


namespace app\models;
use yii\base\Model;

class EgresadoNotasForm extends Model
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
            'egresoid' => 'Lugar de egreso'
        ];
    }


}