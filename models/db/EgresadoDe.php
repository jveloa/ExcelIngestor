<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "egresado_de".
 *
 * @property int $id
 * @property string|null $lugar
 *
 * @property Estudiante[] $estudiantes
 */
class EgresadoDe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'egresado_de';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lugar'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lugar' => 'Lugar',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_egresado' => 'id']);
    }
}
