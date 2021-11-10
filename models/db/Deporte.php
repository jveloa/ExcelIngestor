<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "deporte".
 *
 * @property int $id
 * @property string|null $deporte
 *
 * @property EstudianteDeporte[] $estudianteDeportes
 */
class Deporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deporte'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deporte' => 'Deporte',
        ];
    }

    /**
     * Gets query for [[EstudianteDeportes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteDeportes()
    {
        return $this->hasMany(EstudianteDeporte::className(), ['id_deporte' => 'id'])->inverseOf('deporte');
    }
}
