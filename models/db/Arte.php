<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "arte".
 *
 * @property int $id
 * @property string|null $arte
 *
 * @property EstudianteArte $estudianteArte
 */
class Arte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'arte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['arte'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'arte' => 'Arte',
        ];
    }

    /**
     * Gets query for [[EstudianteArte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteArte()
    {
        return $this->hasOne(EstudianteArte::className(), ['id_arte' => 'id'])->inverseOf('arte');
    }
}
