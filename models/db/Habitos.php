<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "habitos".
 *
 * @property string $id_estudiante
 * @property bool $fumador
 * @property bool $bebedor
 * @property string|null $comentario_deporte
 * @property string|null $comentario_arte
 * @property bool $intrumento_musical
 * @property string|null $utltimo_libro
 * @property string|null $anno_ultimo_libro
 * @property string|null $penultimo_libro
 * @property string|null $anno_penultimo_libro
 * @property string|null $antepenultimo_libro
 * @property string|null $anno_antepenultimo_libro
 *
 * @property Estudiante $estudiante
 */
class Habitos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'habitos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'fumador', 'bebedor', 'intrumento_musical'], 'required'],
            [['id_estudiante', 'comentario_deporte', 'comentario_arte', 'utltimo_libro', 'anno_ultimo_libro', 'penultimo_libro', 'anno_penultimo_libro', 'antepenultimo_libro', 'anno_antepenultimo_libro'], 'string'],
            [['fumador', 'bebedor', 'intrumento_musical'], 'boolean'],
            [['id_estudiante'], 'unique'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carné']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'fumador' => 'Fumador',
            'bebedor' => 'Bebedor',
            'comentario_deporte' => 'Comentario Deporte',
            'comentario_arte' => 'Comentario Arte',
            'intrumento_musical' => 'Intrumento Musical',
            'utltimo_libro' => 'Utltimo Libro',
            'anno_ultimo_libro' => 'Anno Ultimo Libro',
            'penultimo_libro' => 'Penultimo Libro',
            'anno_penultimo_libro' => 'Anno Penultimo Libro',
            'antepenultimo_libro' => 'Antepenultimo Libro',
            'anno_antepenultimo_libro' => 'Anno Antepenultimo Libro',
        ];
    }

    /**
     * Gets query for [[Estudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['carné' => 'id_estudiante']);
    }
}
