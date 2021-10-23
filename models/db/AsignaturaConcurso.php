<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "asignatura_concurso".
 *
 * @property int $id
 * @property string|null $asignatura
 *
 * @property ParticipacionConcurso[] $participacionConcursos
 */
class AsignaturaConcurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignatura_concurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asignatura'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asignatura' => 'Asignatura',
        ];
    }

    /**
     * Gets query for [[ParticipacionConcursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipacionConcursos()
    {
        return $this->hasMany(ParticipacionConcurso::className(), ['id_asignatura' => 'id']);
    }
}
