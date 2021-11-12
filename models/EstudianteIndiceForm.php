<?php


namespace app\models;


use yii\base\Model;

class EstudianteIndiceForm extends Model
{
    public $indiceChk;
    public $indiceText;

    public $espanolChk;
    public $espanolText;

    public $matematicaChk;
    public $matematicaText;

    public $historiaChk;
    public $historiaText;

    public $habilitarChk;

    public function rules()
    {
        return [
            [['indiceChk'], 'boolean'],
            [['indiceText'], 'number','max'=>100,'min'=>0],

            [['espanolChk'], 'boolean'],
            [['espanolText'], 'number','max'=>100,'min'=>0],

            [['matematicaChk'], 'boolean'],
            [['matematicaText'], 'number','max'=>100,'min'=>0],

            [['historiaChk'], 'boolean'],
            [['historiaText'], 'number','max'=>100,'min'=>0],

            [['habilitarChk'], 'boolean'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'indiceText' => 'Indice academico',
            'espanolText' => 'Nota de Español',
            'matematicaText' => 'Nota de Matemática',
            'historiaText' => 'Nota de Historia'

        ];
    }
}