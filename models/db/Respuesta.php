<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "respuesta".
 *
 * @property int $id
 * @property string|null $respuesta
 *
 * @property EstudiantePregResp[] $estudiantePregResps
 */
class Respuesta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['respuesta'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'respuesta' => 'Respuesta',
        ];
    }

    /**
     * Gets query for [[EstudiantePregResps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantePregResps()
    {
        return $this->hasMany(EstudiantePregResp::className(), ['id_respuesta' => 'id']);
    }
}
