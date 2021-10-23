<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "dato_militar".
 *
 * @property int $id
 * @property string|null $situacion_militar
 *
 * @property Estudiante[] $estudiantes
 */
class DatoMilitar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dato_militar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['situacion_militar'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'situacion_militar' => 'Situacion Militar',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_dato_militar' => 'id']);
    }
}
