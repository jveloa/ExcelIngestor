<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "ingreso".
 *
 * @property string|null $via_ingreso
 * @property int $id
 *
 * @property Estudiante[] $estudiantes
 */
class Ingreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['via_ingreso'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'via_ingreso' => 'Via Ingreso',
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_ingreso' => 'id']);
    }
}
