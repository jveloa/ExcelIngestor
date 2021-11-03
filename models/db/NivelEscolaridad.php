<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "nivel_escolaridad".
 *
 * @property int $id
 * @property string|null $nivel_escolaridad
 *
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes0
 */
class NivelEscolaridad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nivel_escolaridad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivel_escolaridad'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivel_escolaridad' => 'Nivel Escolaridad',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_nivel_escolaridad_padre' => 'id']);
    }

    /**
     * Gets query for [[Estudiantes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes0()
    {
        return $this->hasMany(Estudiante::className(), ['id_nivel_escolaridad_madre' => 'id']);
    }
}
