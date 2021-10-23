<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "integracion_politica".
 *
 * @property int $id
 * @property string|null $integracion
 *
 * @property Estudiante[] $estudiantes
 */
class IntegracionPolitica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integracion_politica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['integracion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'integracion' => 'Integracion',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_integracion_politica' => 'id']);
    }
}
