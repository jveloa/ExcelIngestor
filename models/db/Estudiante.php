<?php

namespace app\models\db;



/**
 * This is the model class for table "estudiante".
 *
 * @property string $nombre nombre y apellidos
 * @property string $carnet
 * @property int $id_municipio
 * @property int $id_egresado Egresado de (IPVCE, Preuniversitario urbano, Preuniversitario becado, Técnico medio, Facultad obrero-campesina, Estudio en el exterior, otro)
 * @property int $id_ingreso Vía de ingreso (Directamente del pre, Concurso, otro)
 * @property int $nota_matematica Nota en el examen de ingreso de Matemática
 * @property int $nota_espannol Nota en el examen de ingreso de Español
 * @property int $nota_historia Nota en el examen de ingreso de Historia
 * @property int $indice_academico
 * @property int $id_dato_militar
 * @property int $id_integracion_politica
 * @property int $id_experiencia_direccion
 * @property bool $becado
 * @property int $cantidad_hijos
 * @property int $estado_civil
 * @property int $id_convivencia
 * @property int $id_dependencia_economica
 * @property int $id_sector_ocupacional_padre
 * @property int $id_sector_ocupacional_madre
 * @property int $id_nivel_escolaridad_padre
 * @property int $id_nivel_escolaridad_madre
 * @property bool $informar_familia
 * @property int $carerra_opcion ¿En qué opción solicitaste la carrera? (1, 2,… 10, No la pedí)
 * @property string|null $contacto_email
 * @property string|null $contacto_telefono
 *
 * @property Convivencia $convivencia
 * @property DatoMilitar $datoMilitar
 * @property DependenciaEconomica $dependenciaEconomica
 * @property EgresadoDe $egresado
 * @property EstadoCivil $estadoCivil
 * @property EstudianteAspectoProfesion $estudianteAspectoProfesion
 * @property EstudianteDeporteArte[] $estudianteDeporteArtes
 * @property EstudianteInteres $estudianteInteres
 * @property EstudiantePregResp[] $estudiantePregResps
 * @property ExperienciaCarrera[] $experienciaCarreras
 * @property ExperienciaDireccion $experienciaDireccion
 * @property FactorIngresoCarrera[] $factorIngresoCarreras
 * @property FormaEstudio $formaEstudio
 * @property Habitos $habitos
 * @property HorasDedicadas $horasDedicadas
 * @property Ingreso $ingreso
 * @property IntegracionPolitica $integracionPolitica
 * @property Municipio $municipio
 * @property NivelEscolaridad $nivelEscolaridadMadre
 * @property NivelEscolaridad $nivelEscolaridadPadre
 * @property ParticipacionConcurso[] $participacionConcursos
 * @property RazonIngresoCarrera[] $razonIngresoCarreras
 * @property Rol $rol
 * @property SectorOcupacional $sectorOcupacionalMadre
 * @property SectorOcupacional $sectorOcupacionalPadre
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'carnet', 'id_municipio', 'id_egresado', 'id_ingreso', 'nota_matematica', 'nota_espannol', 'nota_historia', 'indice_academico', 'id_dato_militar', 'id_integracion_politica', 'id_experiencia_direccion', 'becado', 'cantidad_hijos', 'estado_civil', 'id_convivencia', 'id_dependencia_economica', 'id_sector_ocupacional_padre', 'id_sector_ocupacional_madre', 'id_nivel_escolaridad_padre', 'id_nivel_escolaridad_madre', 'informar_familia', 'carerra_opcion'], 'required'],
            [['nombre', 'carnet', 'contacto_email', 'contacto_telefono'], 'string'],
            [['id_municipio', 'id_egresado', 'id_ingreso', 'nota_matematica', 'nota_espannol', 'nota_historia', 'indice_academico', 'id_dato_militar', 'id_integracion_politica', 'id_experiencia_direccion', 'cantidad_hijos', 'estado_civil', 'id_convivencia', 'id_dependencia_economica', 'id_sector_ocupacional_padre', 'id_sector_ocupacional_madre', 'id_nivel_escolaridad_padre', 'id_nivel_escolaridad_madre', 'carerra_opcion'], 'default', 'value' => null],
            [['id_municipio', 'id_egresado', 'id_ingreso', 'nota_matematica', 'nota_espannol', 'nota_historia', 'indice_academico', 'id_dato_militar', 'id_integracion_politica', 'id_experiencia_direccion', 'cantidad_hijos', 'estado_civil', 'id_convivencia', 'id_dependencia_economica', 'id_sector_ocupacional_padre', 'id_sector_ocupacional_madre', 'id_nivel_escolaridad_padre', 'id_nivel_escolaridad_madre', 'carerra_opcion'], 'integer'],
            [['becado', 'informar_familia'], 'boolean'],
            [['carnet'], 'unique'],
            [['id_convivencia'], 'exist', 'skipOnError' => true, 'targetClass' => Convivencia::className(), 'targetAttribute' => ['id_convivencia' => 'id']],
            [['id_dato_militar'], 'exist', 'skipOnError' => true, 'targetClass' => DatoMilitar::className(), 'targetAttribute' => ['id_dato_militar' => 'id']],
            [['id_dependencia_economica'], 'exist', 'skipOnError' => true, 'targetClass' => DependenciaEconomica::className(), 'targetAttribute' => ['id_dependencia_economica' => 'id']],
            [['id_egresado'], 'exist', 'skipOnError' => true, 'targetClass' => EgresadoDe::className(), 'targetAttribute' => ['id_egresado' => 'id']],
            [['estado_civil'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoCivil::className(), 'targetAttribute' => ['estado_civil' => 'id']],
            [['id_experiencia_direccion'], 'exist', 'skipOnError' => true, 'targetClass' => ExperienciaDireccion::className(), 'targetAttribute' => ['id_experiencia_direccion' => 'id']],
            [['id_ingreso'], 'exist', 'skipOnError' => true, 'targetClass' => Ingreso::className(), 'targetAttribute' => ['id_ingreso' => 'id']],
            [['id_integracion_politica'], 'exist', 'skipOnError' => true, 'targetClass' => IntegracionPolitica::className(), 'targetAttribute' => ['id_integracion_politica' => 'id']],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['id_municipio' => 'id']],
            [['id_nivel_escolaridad_padre'], 'exist', 'skipOnError' => true, 'targetClass' => NivelEscolaridad::className(), 'targetAttribute' => ['id_nivel_escolaridad_padre' => 'id']],
            [['id_nivel_escolaridad_madre'], 'exist', 'skipOnError' => true, 'targetClass' => NivelEscolaridad::className(), 'targetAttribute' => ['id_nivel_escolaridad_madre' => 'id']],
            [['id_sector_ocupacional_padre'], 'exist', 'skipOnError' => true, 'targetClass' => SectorOcupacional::className(), 'targetAttribute' => ['id_sector_ocupacional_padre' => 'id']],
            [['id_sector_ocupacional_madre'], 'exist', 'skipOnError' => true, 'targetClass' => SectorOcupacional::className(), 'targetAttribute' => ['id_sector_ocupacional_madre' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nombre' => 'nombre y apellidos',
            'carnet' => 'Carnet',
            'id_municipio' => 'Id Municipio',
            'id_egresado' => 'Egresado de (IPVCE, Preuniversitario urbano, Preuniversitario becado, Técnico medio, Facultad obrero-campesina, Estudio en el exterior, otro)',
            'id_ingreso' => 'Vía de ingreso (Directamente del pre, Concurso, otro)',
            'nota_matematica' => 'Nota en el examen de ingreso de Matemática',
            'nota_espannol' => 'Nota en el examen de ingreso de Español',
            'nota_historia' => 'Nota en el examen de ingreso de Historia',
            'indice_academico' => 'Indice Academico',
            'id_dato_militar' => 'Id Dato Militar',
            'id_integracion_politica' => 'Id Integracion Politica',
            'id_experiencia_direccion' => 'Id Experiencia Direccion',
            'becado' => 'Becado',
            'cantidad_hijos' => 'Cantidad Hijos',
            'estado_civil' => 'Estado Civil',
            'id_convivencia' => 'Id Convivencia',
            'id_dependencia_economica' => 'Id Dependencia Economica',
            'id_sector_ocupacional_padre' => 'Id Sector Ocupacional Padre',
            'id_sector_ocupacional_madre' => 'Id Sector Ocupacional Madre',
            'id_nivel_escolaridad_padre' => 'Id Nivel Escolaridad Padre',
            'id_nivel_escolaridad_madre' => 'Id Nivel Escolaridad Madre',
            'informar_familia' => 'Informar Familia',
            'carerra_opcion' => '¿En qué opción solicitaste la carrera? (1, 2,… 10, No la pedí)',
            'contacto_email' => 'Contacto Email',
            'contacto_telefono' => 'Contacto Telefono',
        ];
    }

    /**
     * Gets query for [[Convivencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConvivencia()
    {
        return $this->hasOne(Convivencia::className(), ['id' => 'id_convivencia'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[DatoMilitar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatoMilitar()
    {
        return $this->hasOne(DatoMilitar::className(), ['id' => 'id_dato_militar'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[DependenciaEconomica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDependenciaEconomica()
    {
        return $this->hasOne(DependenciaEconomica::className(), ['id' => 'id_dependencia_economica'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[Egresado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEgresado()
    {
        return $this->hasOne(EgresadoDe::className(), ['id' => 'id_egresado'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[EstadoCivil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoCivil()
    {
        return $this->hasOne(EstadoCivil::className(), ['id' => 'estado_civil'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[EstudianteAspectoProfesion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteAspectoProfesion()
    {
        return $this->hasOne(EstudianteAspectoProfesion::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[EstudianteDeporteArtes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteDeporteArtes()
    {
        return $this->hasMany(EstudianteDeporteArte::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[EstudianteInteres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteInteres()
    {
        return $this->hasOne(EstudianteInteres::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[EstudiantePregResps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantePregResps()
    {
        return $this->hasMany(EstudiantePregResp::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[ExperienciaCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExperienciaCarreras()
    {
        return $this->hasMany(ExperienciaCarrera::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[ExperienciaDireccion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExperienciaDireccion()
    {
        return $this->hasOne(ExperienciaDireccion::className(), ['id' => 'id_experiencia_direccion'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[FactorIngresoCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactorIngresoCarreras()
    {
        return $this->hasMany(FactorIngresoCarrera::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[FormaEstudio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFormaEstudio()
    {
        return $this->hasOne(FormaEstudio::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[Habitos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHabitos()
    {
        return $this->hasOne(Habitos::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[HorasDedicadas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasDedicadas()
    {
        return $this->hasOne(HorasDedicadas::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[Ingreso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngreso()
    {
        return $this->hasOne(Ingreso::className(), ['id' => 'id_ingreso'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[IntegracionPolitica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegracionPolitica()
    {
        return $this->hasOne(IntegracionPolitica::className(), ['id' => 'id_integracion_politica'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[Municipio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id' => 'id_municipio'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[NivelEscolaridadMadre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNivelEscolaridadMadre()
    {
        return $this->hasOne(NivelEscolaridad::className(), ['id' => 'id_nivel_escolaridad_madre'])->inverseOf('estudiantes0');
    }

    /**
     * Gets query for [[NivelEscolaridadPadre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNivelEscolaridadPadre()
    {
        return $this->hasOne(NivelEscolaridad::className(), ['id' => 'id_nivel_escolaridad_padre'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[ParticipacionConcursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipacionConcursos()
    {
        return $this->hasMany(ParticipacionConcurso::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[RazonIngresoCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRazonIngresoCarreras()
    {
        return $this->hasMany(RazonIngresoCarrera::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[Rol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id_estudiante' => 'carnet'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[SectorOcupacionalMadre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSectorOcupacionalMadre()
    {
        return $this->hasOne(SectorOcupacional::className(), ['id' => 'id_sector_ocupacional_madre'])->inverseOf('estudiantes0');
    }

    /**
     * Gets query for [[SectorOcupacionalPadre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSectorOcupacionalPadre()
    {
        return $this->hasOne(SectorOcupacional::className(), ['id' => 'id_sector_ocupacional_padre'])->inverseOf('estudiantes');
    }
}
