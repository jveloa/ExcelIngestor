<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "pregunta".
 *
 * @property int $id
 * @property string|null $pregunta
 *
 * @property EstudiantePregResp[] $estudiantePregResps
 */
class Pregunta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pregunta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pregunta'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pregunta' => 'Pregunta',
        ];
    }

    /**
     * Gets query for [[EstudiantePregResps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantePregResps()
    {
        return $this->hasMany(EstudiantePregResp::className(), ['id_pregunta' => 'id']);
    }
}
