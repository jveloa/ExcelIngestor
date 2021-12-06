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

    public $cursoid;

    public function rules()
    {
        return [
            [['indiceChk'], 'boolean'],
            [['indiceText'], 'number','max'=>100,'min'=>1],

            [['espanolChk'], 'boolean'],
            [['espanolText'], 'number','max'=>100,'min'=>1],

            [['matematicaChk'], 'boolean'],
            [['matematicaText'], 'number','max'=>100,'min'=>1],

            [['historiaChk'], 'boolean'],
            [['historiaText'], 'number','max'=>100,'min'=>1],

            [['habilitarChk'], 'boolean'],

            [['cursoid'], 'number'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'indiceText' => 'Índice académico',
            'espanolText' => 'Nota de Español',
            'matematicaText' => 'Nota de Matemática',
            'historiaText' => 'Nota de Historia',
            'cursoid' => 'Curso académico',

        ];
    }
}