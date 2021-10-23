<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "experiencia_direccion".
 *
 * @property int $id
 * @property string|null $organizacion
 *
 * @property Estudiante[] $estudiantes
 */
class ExperienciaDireccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experiencia_direccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organizacion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organizacion' => 'Organizacion',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_experiencia_direccion' => 'id']);
    }
}
