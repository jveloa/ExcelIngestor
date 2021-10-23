<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "sector_ocupacional".
 *
 * @property int $id
 * @property string|null $sector_ocupacional
 *
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes0
 */
class SectorOcupacional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sector_ocupacional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sector_ocupacional'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector_ocupacional' => 'Sector Ocupacional',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_sector_ocupacional_padre' => 'id']);
    }

    /**
     * Gets query for [[Estudiantes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes0()
    {
        return $this->hasMany(Estudiante::className(), ['id_sector_ocupacional_madre' => 'id']);
    }
}
