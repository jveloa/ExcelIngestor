<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "nivel_interes".
 *
 * @property int $id
 * @property string|null $nivel_interes
 *
 * @property EstudianteInteres[] $estudianteInteres
 * @property EstudianteInteres[] $estudianteInteres0
 * @property EstudianteInteres[] $estudianteInteres1
 */
class NivelInteres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nivel_interes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivel_interes'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivel_interes' => 'Nivel Interes',
        ];
    }

    /**
     * Gets query for [[EstudianteInteres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteInteres()
    {
        return $this->hasMany(EstudianteInteres::className(), ['organizaciones_estudiantiles' => 'id']);
    }

    /**
     * Gets query for [[EstudianteInteres0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteInteres0()
    {
        return $this->hasMany(EstudianteInteres::className(), ['problemas_soci_ambien' => 'id']);
    }

    /**
     * Gets query for [[EstudianteInteres1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteInteres1()
    {
        return $this->hasMany(EstudianteInteres::className(), ['practicas_laborales' => 'id']);
    }
}
