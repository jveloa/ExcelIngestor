<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "estudiante_deporte_arte".
 *
 * @property string $id_estudiante
 * @property int $id_deporte_arte
 *
 * @property DeporteArte $deporteArte
 * @property Estudiante $estudiante
 */
class EstudianteDeporteArte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante_deporte_arte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_deporte_arte'], 'required'],
            [['id_estudiante'], 'string'],
            [['id_deporte_arte'], 'default', 'value' => null],
            [['id_deporte_arte'], 'integer'],
            [['id_deporte_arte'], 'exist', 'skipOnError' => true, 'targetClass' => DeporteArte::className(), 'targetAttribute' => ['id_deporte_arte' => 'id']],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'carnet']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'id_deporte_arte' => 'Id Deporte Arte',
        ];
    }

    /**
     * Gets query for [[DeporteArte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeporteArte()
    {
        return $this->hasOne(DeporteArte::className(), ['id' => 'id_deporte_arte'])->inverseOf('estudianteDeporteArtes');
    }

    /**
     * Gets query for [[Estudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['carnet' => 'id_estudiante'])->inverseOf('estudianteDeporteArtes');
    }
}
