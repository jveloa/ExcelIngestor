<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "deporte_arte".
 *
 * @property int $id
 * @property string|null $deporte_arte
 *
 * @property EstudianteDeporteArte[] $estudianteDeporteArtes
 */
class DeporteArte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deporte_arte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deporte_arte'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deporte_arte' => 'Deporte Arte',
        ];
    }

    /**
     * Gets query for [[EstudianteDeporteArtes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteDeporteArtes()
    {
        return $this->hasMany(EstudianteDeporteArte::className(), ['id_deporte_arte' => 'id'])->inverseOf('deporteArte');
    }
}
