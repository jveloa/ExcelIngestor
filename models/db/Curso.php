<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id
 * @property string $curso
 *
 * @property Estudiante[] $estudiantes
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curso'], 'required'],
            [['curso'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curso' => 'Curso',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_curso' => 'id'])->inverseOf('curso');
    }
}
