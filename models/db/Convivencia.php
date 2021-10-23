<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "convivencia".
 *
 * @property int $id
 * @property string|null $convivencia
 *
 * @property Estudiante[] $estudiantes
 */
class Convivencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convivencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['convivencia'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'convivencia' => 'Convivencia',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_convivencia' => 'id']);
    }
}
