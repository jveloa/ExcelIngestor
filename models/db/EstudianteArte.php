<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "estudiante_arte".
 *
 * @property string $id_estudiante
 * @property int $id_arte
 *
 * @property Arte $arte
 * @property Estudiante $estudiante
 */
class EstudianteArte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante_arte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_arte'], 'required'],
            [['id_estudiante'], 'string'],
            [['id_arte'], 'default', 'value' => null],
            [['id_arte'], 'integer'],
            [['id_arte'], 'unique'],
            [['id_estudiante'], 'unique'],
            [['id_arte'], 'exist', 'skipOnError' => true, 'targetClass' => Arte::className(), 'targetAttribute' => ['id_arte' => 'id']],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carne']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'id_arte' => 'Id Arte',
        ];
    }

    /**
     * Gets query for [[Arte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArte()
    {
        return $this->hasOne(Arte::className(), ['id' => 'id_arte'])->inverseOf('estudianteArte');
    }

    /**
     * Gets query for [[Estudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['carne' => 'id_estudiante'])->inverseOf('estudianteArte');
    }
}
