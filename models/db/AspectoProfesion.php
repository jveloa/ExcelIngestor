<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "aspecto_profesion".
 *
 * @property int $id
 * @property string|null $aspecto_profesion
 *
 * @property EstudianteAspectoProfesion[] $estudianteAspectoProfesions
 */
class AspectoProfesion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aspecto_profesion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aspecto_profesion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aspecto_profesion' => 'Aspecto Profesion',
        ];
    }

    /**
     * Gets query for [[EstudianteAspectoProfesions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteAspectoProfesions()
    {
        return $this->hasMany(EstudianteAspectoProfesion::className(), ['id_aspecto_profesion' => 'id']);
    }
}
