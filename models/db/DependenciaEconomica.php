<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "dependencia_economica".
 *
 * @property int $id
 * @property string|null $dependencia_economica
 *
 * @property Estudiante[] $estudiantes
 */
class DependenciaEconomica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dependencia_economica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dependencia_economica'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dependencia_economica' => 'Dependencia Economica',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_dependencia_economica' => 'id']);
    }
}
