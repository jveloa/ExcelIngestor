<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property string $nombre nombre y apellidos
 * @property string $carne
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
 * @property string|null $comentario_deporte
 * @property string|null $comentario_arte
 * @property string|null $ultimo_libro
 * @property string|null $anno_ultimo_libro
 * @property string|null $penultimo_libro
 * @property string|null $anno_penultimo_libro
 * @property string|null $antepenultimo_libro
 * @property string|null $anno_antepenultimo_libro
 * @property int $id_lo_escencial
 * @property int $id_no_solo_de_pan
 * @property int $id_camaron_que
 * @property int $id_a_es_menor
 * @property int $id_editores_texto
 * @property int $id_hojas_de_calculo
 * @property int $id_editores_presentaciones
 * @property int $id_software_grafico
 * @property int $id_lenguajes_programacion
 * @property int $id_dispo_copumtadora
 * @property int $id_espacio_estudiar
 * @property string|null $musica_favorita
 * @property int $id_tiempo_transcurrido
 * @property int $id_desicion_estudiar
 * @property bool $xq_me_gusta
 * @property bool $para_tener_titulo
 * @property bool $complacer_padres
 * @property bool $prepararme_futuro
 * @property bool $se_parece_a_otra
 * @property bool $para_ser_alguien
 * @property string|null $razones_otras
 * @property bool $sugerencia_familiar
 * @property bool $familia
 * @property bool $amigos
 * @property bool $profesores
 * @property bool $desicion_personal
 * @property bool $no_oportunidad
 * @property string|null $influencias_otras
 * @property bool $exp_circulos_interes
 * @property bool $exp_conf_charlas
 * @property bool $exp_concursos
 * @property bool $exp_joven_club
 * @property bool $exp_familias_conocido
 * @property string $experiencias_otras
 * @property int $id_mantener_est_carrera
 * @property string|null $comentario_mantener_est
 * @property int $id_trabajo_graduado
 * @property int $id_programador
 * @property int $id_probador
 * @property int $id_diseñador_sotf
 * @property int $id_diseñador_ui_ux
 * @property int $id_seguridad
 * @property int $id_escritor_expositor
 * @property int $id_gestor_proyectos
 * @property int $id_facilitador_desiciones
 * @property int $id_desempeño_profesional
 * @property int $id_relacion_carreras
 * @property int $id_importancia_socie
 * @property int $id_influencia_cien_tec
 * @property int $id_superacion_constante
 * @property int $id_horas_estudio
 * @property int $id_horas_otros_trabajos
 * @property int $id_horas_recreacion
 * @property int $id_estudio_libro
 * @property int $id_estudio_grupal
 * @property int $id_estudio_ejercicios
 * @property int $id_estudio_repasadores
 * @property int $id_interes_apoyar_orga
 * @property int $id_interes_prob_soc_ambi
 * @property int $id_interes_prac_laborales
 * @property bool $vocacion
 * @property bool $campañas_divulgativas
 * @property bool $seguir_con_amigos
 * @property int $id_practicas_artes
 * @property int $id_practicas_deportes
 * @property string|null $concursos
 * @property int $id_fumador
 * @property int $id_bebedor
 * @property int|null $id_curso
 *
 * @property RespPreguntasMas $aEsMenor
 * @property RespDeporteArte $bebedor
 * @property RespPreguntasMas $camaronQue
 * @property RespSobreEleccion $carerraOpcion
 * @property Convivencia $convivencia
 * @property Curso $curso
 * @property DatoMilitar $datoMilitar
 * @property DependenciaEconomica $dependenciaEconomica
 * @property RespSobreFuturo $desempeñoProfesional
 * @property RespSobreEleccion $desicionEstudiar
 * @property RespSobreFuturo $diseñadorSotf
 * @property RespSobreFuturo $diseñadorUiUx
 * @property RespPreguntasMas $dispoCopumtadora
 * @property RespPreguntasMas $editoresPresentaciones
 * @property RespPreguntasMas $editoresTexto
 * @property EgresadoDe $egresado
 * @property RespSobreFuturo $escritorExpositor
 * @property RespPreguntasMas $espacioEstudiar
 * @property EstadoCivil $estadoCivil
 * @property EstudianteArte[] $estudianteArtes
 * @property EstudianteDeporte[] $estudianteDeportes
 * @property RespSobreFuturo $estudioEjercicios
 * @property RespSobreFuturo $estudioGrupal
 * @property RespSobreFuturo $estudioLibro
 * @property RespSobreFuturo $estudioRepasadores
 * @property ExperienciaDireccion $experienciaDireccion
 * @property RespSobreFuturo $facilitadorDesiciones
 * @property RespDeporteArte $fumador
 * @property RespSobreFuturo $gestorProyectos
 * @property RespPreguntasMas $hojasDeCalculo
 * @property RespSobreFuturo $horasEstudio
 * @property RespSobreFuturo $horasOtrosTrabajos
 * @property RespSobreFuturo $horasRecreacion
 * @property RespSobreFuturo $importanciaSocie
 * @property RespSobreFuturo $influenciaCienTec
 * @property Ingreso $ingreso
 * @property IntegracionPolitica $integracionPolitica
 * @property RespSobreFuturo $interesApoyarOrga
 * @property RespSobreFuturo $interesPracLaborales
 * @property RespSobreFuturo $interesProbSocAmbi
 * @property RespPreguntasMas $lenguajesProgramacion
 * @property RespPreguntasMas $loEscencial
 * @property RespSobreFuturo $mantenerEstCarrera
 * @property Municipio $municipio
 * @property NivelEscolaridad $nivelEscolaridadMadre
 * @property NivelEscolaridad $nivelEscolaridadPadre
 * @property RespPreguntasMas $noSoloDePan
 * @property RespDeporteArte $practicasArtes
 * @property RespDeporteArte $practicasDeportes
 * @property RespSobreFuturo $probador
 * @property RespSobreFuturo $programador
 * @property RespSobreFuturo $relacionCarreras
 * @property SectorOcupacional $sectorOcupacionalMadre
 * @property SectorOcupacional $sectorOcupacionalPadre
 * @property RespSobreFuturo $seguridad
 * @property RespPreguntasMas $softwareGrafico
 * @property RespSobreFuturo $superacionConstante
 * @property RespSobreEleccion $tiempoTranscurrido
 * @property RespSobreFuturo $trabajoGraduado
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
            [['nombre', 'carne', 'id_municipio', 'id_egresado', 'id_ingreso', 'nota_matematica', 'nota_espannol', 'nota_historia', 'indice_academico', 'id_dato_militar', 'id_integracion_politica', 'id_experiencia_direccion', 'becado', 'cantidad_hijos', 'estado_civil', 'id_convivencia', 'id_dependencia_economica', 'id_sector_ocupacional_padre', 'id_sector_ocupacional_madre', 'id_nivel_escolaridad_padre', 'id_nivel_escolaridad_madre', 'informar_familia', 'carerra_opcion', 'id_lo_escencial', 'id_no_solo_de_pan', 'id_camaron_que', 'id_a_es_menor', 'id_editores_texto', 'id_hojas_de_calculo', 'id_editores_presentaciones', 'id_software_grafico', 'id_lenguajes_programacion', 'id_dispo_copumtadora', 'id_espacio_estudiar', 'id_tiempo_transcurrido', 'id_desicion_estudiar', 'xq_me_gusta', 'para_tener_titulo', 'complacer_padres', 'prepararme_futuro', 'se_parece_a_otra', 'para_ser_alguien', 'sugerencia_familiar', 'familia', 'amigos', 'profesores', 'desicion_personal', 'no_oportunidad', 'exp_circulos_interes', 'exp_conf_charlas', 'exp_concursos', 'exp_joven_club', 'exp_familias_conocido', 'experiencias_otras', 'id_mantener_est_carrera', 'id_trabajo_graduado', 'id_programador', 'id_probador', 'id_diseñador_sotf', 'id_diseñador_ui_ux', 'id_seguridad', 'id_escritor_expositor', 'id_gestor_proyectos', 'id_facilitador_desiciones', 'id_desempeño_profesional', 'id_relacion_carreras', 'id_importancia_socie', 'id_influencia_cien_tec', 'id_superacion_constante', 'id_horas_estudio', 'id_horas_otros_trabajos', 'id_horas_recreacion', 'id_estudio_libro', 'id_estudio_grupal', 'id_estudio_ejercicios', 'id_estudio_repasadores', 'id_interes_apoyar_orga', 'id_interes_prob_soc_ambi', 'id_interes_prac_laborales', 'vocacion', 'campañas_divulgativas', 'seguir_con_amigos', 'id_practicas_artes', 'id_practicas_deportes', 'id_fumador', 'id_bebedor'], 'required'],
            [['nombre', 'carne', 'contacto_email', 'contacto_telefono', 'comentario_deporte', 'comentario_arte', 'ultimo_libro', 'anno_ultimo_libro', 'penultimo_libro', 'anno_penultimo_libro', 'antepenultimo_libro', 'anno_antepenultimo_libro', 'musica_favorita', 'razones_otras', 'influencias_otras', 'experiencias_otras', 'comentario_mantener_est', 'concursos'], 'string'],
            [['id_municipio', 'id_egresado', 'id_ingreso', 'nota_matematica', 'nota_espannol', 'nota_historia', 'indice_academico', 'id_dato_militar', 'id_integracion_politica', 'id_experiencia_direccion', 'cantidad_hijos', 'estado_civil', 'id_convivencia', 'id_dependencia_economica', 'id_sector_ocupacional_padre', 'id_sector_ocupacional_madre', 'id_nivel_escolaridad_padre', 'id_nivel_escolaridad_madre', 'carerra_opcion', 'id_lo_escencial', 'id_no_solo_de_pan', 'id_camaron_que', 'id_a_es_menor', 'id_editores_texto', 'id_hojas_de_calculo', 'id_editores_presentaciones', 'id_software_grafico', 'id_lenguajes_programacion', 'id_dispo_copumtadora', 'id_espacio_estudiar', 'id_tiempo_transcurrido', 'id_desicion_estudiar', 'id_mantener_est_carrera', 'id_trabajo_graduado', 'id_programador', 'id_probador', 'id_diseñador_sotf', 'id_diseñador_ui_ux', 'id_seguridad', 'id_escritor_expositor', 'id_gestor_proyectos', 'id_facilitador_desiciones', 'id_desempeño_profesional', 'id_relacion_carreras', 'id_importancia_socie', 'id_influencia_cien_tec', 'id_superacion_constante', 'id_horas_estudio', 'id_horas_otros_trabajos', 'id_horas_recreacion', 'id_estudio_libro', 'id_estudio_grupal', 'id_estudio_ejercicios', 'id_estudio_repasadores', 'id_interes_apoyar_orga', 'id_interes_prob_soc_ambi', 'id_interes_prac_laborales', 'id_practicas_artes', 'id_practicas_deportes', 'id_fumador', 'id_bebedor', 'id_curso'], 'default', 'value' => null],
            [['id_municipio', 'id_egresado', 'id_ingreso', 'nota_matematica', 'nota_espannol', 'nota_historia', 'indice_academico', 'id_dato_militar', 'id_integracion_politica', 'id_experiencia_direccion', 'cantidad_hijos', 'estado_civil', 'id_convivencia', 'id_dependencia_economica', 'id_sector_ocupacional_padre', 'id_sector_ocupacional_madre', 'id_nivel_escolaridad_padre', 'id_nivel_escolaridad_madre', 'carerra_opcion', 'id_lo_escencial', 'id_no_solo_de_pan', 'id_camaron_que', 'id_a_es_menor', 'id_editores_texto', 'id_hojas_de_calculo', 'id_editores_presentaciones', 'id_software_grafico', 'id_lenguajes_programacion', 'id_dispo_copumtadora', 'id_espacio_estudiar', 'id_tiempo_transcurrido', 'id_desicion_estudiar', 'id_mantener_est_carrera', 'id_trabajo_graduado', 'id_programador', 'id_probador', 'id_diseñador_sotf', 'id_diseñador_ui_ux', 'id_seguridad', 'id_escritor_expositor', 'id_gestor_proyectos', 'id_facilitador_desiciones', 'id_desempeño_profesional', 'id_relacion_carreras', 'id_importancia_socie', 'id_influencia_cien_tec', 'id_superacion_constante', 'id_horas_estudio', 'id_horas_otros_trabajos', 'id_horas_recreacion', 'id_estudio_libro', 'id_estudio_grupal', 'id_estudio_ejercicios', 'id_estudio_repasadores', 'id_interes_apoyar_orga', 'id_interes_prob_soc_ambi', 'id_interes_prac_laborales', 'id_practicas_artes', 'id_practicas_deportes', 'id_fumador', 'id_bebedor', 'id_curso'], 'integer'],
            [['becado', 'informar_familia', 'xq_me_gusta', 'para_tener_titulo', 'complacer_padres', 'prepararme_futuro', 'se_parece_a_otra', 'para_ser_alguien', 'sugerencia_familiar', 'familia', 'amigos', 'profesores', 'desicion_personal', 'no_oportunidad', 'exp_circulos_interes', 'exp_conf_charlas', 'exp_concursos', 'exp_joven_club', 'exp_familias_conocido', 'vocacion', 'campañas_divulgativas', 'seguir_con_amigos'], 'boolean'],
            [['carne'], 'unique'],
            [['id_convivencia'], 'exist', 'skipOnError' => true, 'targetClass' => Convivencia::className(), 'targetAttribute' => ['id_convivencia' => 'id']],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id']],
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
            [['id_practicas_artes'], 'exist', 'skipOnError' => true, 'targetClass' => RespDeporteArte::className(), 'targetAttribute' => ['id_practicas_artes' => 'id']],
            [['id_practicas_deportes'], 'exist', 'skipOnError' => true, 'targetClass' => RespDeporteArte::className(), 'targetAttribute' => ['id_practicas_deportes' => 'id']],
            [['id_fumador'], 'exist', 'skipOnError' => true, 'targetClass' => RespDeporteArte::className(), 'targetAttribute' => ['id_fumador' => 'id']],
            [['id_bebedor'], 'exist', 'skipOnError' => true, 'targetClass' => RespDeporteArte::className(), 'targetAttribute' => ['id_bebedor' => 'id']],
            [['id_lo_escencial'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_lo_escencial' => 'id']],
            [['id_no_solo_de_pan'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_no_solo_de_pan' => 'id']],
            [['id_camaron_que'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_camaron_que' => 'id']],
            [['id_a_es_menor'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_a_es_menor' => 'id']],
            [['id_editores_texto'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_editores_texto' => 'id']],
            [['id_hojas_de_calculo'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_hojas_de_calculo' => 'id']],
            [['id_editores_presentaciones'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_editores_presentaciones' => 'id']],
            [['id_software_grafico'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_software_grafico' => 'id']],
            [['id_lenguajes_programacion'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_lenguajes_programacion' => 'id']],
            [['id_dispo_copumtadora'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_dispo_copumtadora' => 'id']],
            [['id_espacio_estudiar'], 'exist', 'skipOnError' => true, 'targetClass' => RespPreguntasMas::className(), 'targetAttribute' => ['id_espacio_estudiar' => 'id']],
            [['carerra_opcion'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccion::className(), 'targetAttribute' => ['carerra_opcion' => 'id']],
            [['id_tiempo_transcurrido'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccion::className(), 'targetAttribute' => ['id_tiempo_transcurrido' => 'id']],
            [['id_desicion_estudiar'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreEleccion::className(), 'targetAttribute' => ['id_desicion_estudiar' => 'id']],
            [['id_mantener_est_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_mantener_est_carrera' => 'id']],
            [['id_trabajo_graduado'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_trabajo_graduado' => 'id']],
            [['id_programador'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_programador' => 'id']],
            [['id_probador'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_probador' => 'id']],
            [['id_diseñador_sotf'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_diseñador_sotf' => 'id']],
            [['id_diseñador_ui_ux'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_diseñador_ui_ux' => 'id']],
            [['id_seguridad'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_seguridad' => 'id']],
            [['id_escritor_expositor'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_escritor_expositor' => 'id']],
            [['id_gestor_proyectos'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_gestor_proyectos' => 'id']],
            [['id_facilitador_desiciones'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_facilitador_desiciones' => 'id']],
            [['id_desempeño_profesional'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_desempeño_profesional' => 'id']],
            [['id_relacion_carreras'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_relacion_carreras' => 'id']],
            [['id_importancia_socie'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_importancia_socie' => 'id']],
            [['id_influencia_cien_tec'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_influencia_cien_tec' => 'id']],
            [['id_superacion_constante'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_superacion_constante' => 'id']],
            [['id_horas_estudio'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_horas_estudio' => 'id']],
            [['id_horas_otros_trabajos'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_horas_otros_trabajos' => 'id']],
            [['id_horas_recreacion'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_horas_recreacion' => 'id']],
            [['id_estudio_libro'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_estudio_libro' => 'id']],
            [['id_estudio_grupal'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_estudio_grupal' => 'id']],
            [['id_estudio_ejercicios'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_estudio_ejercicios' => 'id']],
            [['id_estudio_repasadores'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_estudio_repasadores' => 'id']],
            [['id_interes_apoyar_orga'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_interes_apoyar_orga' => 'id']],
            [['id_interes_prob_soc_ambi'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_interes_prob_soc_ambi' => 'id']],
            [['id_interes_prac_laborales'], 'exist', 'skipOnError' => true, 'targetClass' => RespSobreFuturo::className(), 'targetAttribute' => ['id_interes_prac_laborales' => 'id']],
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
            'carne' => 'Carne',
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
            'comentario_deporte' => 'Comentario Deporte',
            'comentario_arte' => 'Comentario Arte',
            'ultimo_libro' => 'Ultimo Libro',
            'anno_ultimo_libro' => 'Anno Ultimo Libro',
            'penultimo_libro' => 'Penultimo Libro',
            'anno_penultimo_libro' => 'Anno Penultimo Libro',
            'antepenultimo_libro' => 'Antepenultimo Libro',
            'anno_antepenultimo_libro' => 'Anno Antepenultimo Libro',
            'id_lo_escencial' => 'Id Lo Escencial',
            'id_no_solo_de_pan' => 'Id No Solo De Pan',
            'id_camaron_que' => 'Id Camaron Que',
            'id_a_es_menor' => 'Id A Es Menor',
            'id_editores_texto' => 'Id Editores Texto',
            'id_hojas_de_calculo' => 'Id Hojas De Calculo',
            'id_editores_presentaciones' => 'Id Editores Presentaciones',
            'id_software_grafico' => 'Id Software Grafico',
            'id_lenguajes_programacion' => 'Id Lenguajes Programacion',
            'id_dispo_copumtadora' => 'Id Dispo Copumtadora',
            'id_espacio_estudiar' => 'Id Espacio Estudiar',
            'musica_favorita' => 'Musica Favorita',
            'id_tiempo_transcurrido' => 'Id Tiempo Transcurrido',
            'id_desicion_estudiar' => 'Id Desicion Estudiar',
            'xq_me_gusta' => 'Xq Me Gusta',
            'para_tener_titulo' => 'Para Tener Titulo',
            'complacer_padres' => 'Complacer Padres',
            'prepararme_futuro' => 'Prepararme Futuro',
            'se_parece_a_otra' => 'Se Parece A Otra',
            'para_ser_alguien' => 'Para Ser Alguien',
            'razones_otras' => 'Razones Otras',
            'sugerencia_familiar' => 'Sugerencia Familiar',
            'familia' => 'Familia',
            'amigos' => 'Amigos',
            'profesores' => 'Profesores',
            'desicion_personal' => 'Desicion Personal',
            'no_oportunidad' => 'No Oportunidad',
            'influencias_otras' => 'Influencias Otras',
            'exp_circulos_interes' => 'Exp Circulos Interes',
            'exp_conf_charlas' => 'Exp Conf Charlas',
            'exp_concursos' => 'Exp Concursos',
            'exp_joven_club' => 'Exp Joven Club',
            'exp_familias_conocido' => 'Exp Familias Conocido',
            'experiencias_otras' => 'Experiencias Otras',
            'id_mantener_est_carrera' => 'Id Mantener Est Carrera',
            'comentario_mantener_est' => 'Comentario Mantener Est',
            'id_trabajo_graduado' => 'Id Trabajo Graduado',
            'id_programador' => 'Id Programador',
            'id_probador' => 'Id Probador',
            'id_diseñador_sotf' => 'Id Diseñador Sotf',
            'id_diseñador_ui_ux' => 'Id Diseñador Ui Ux',
            'id_seguridad' => 'Id Seguridad',
            'id_escritor_expositor' => 'Id Escritor Expositor',
            'id_gestor_proyectos' => 'Id Gestor Proyectos',
            'id_facilitador_desiciones' => 'Id Facilitador Desiciones',
            'id_desempeño_profesional' => 'Id Desempeño Profesional',
            'id_relacion_carreras' => 'Id Relacion Carreras',
            'id_importancia_socie' => 'Id Importancia Socie',
            'id_influencia_cien_tec' => 'Id Influencia Cien Tec',
            'id_superacion_constante' => 'Id Superacion Constante',
            'id_horas_estudio' => 'Id Horas Estudio',
            'id_horas_otros_trabajos' => 'Id Horas Otros Trabajos',
            'id_horas_recreacion' => 'Id Horas Recreacion',
            'id_estudio_libro' => 'Id Estudio Libro',
            'id_estudio_grupal' => 'Id Estudio Grupal',
            'id_estudio_ejercicios' => 'Id Estudio Ejercicios',
            'id_estudio_repasadores' => 'Id Estudio Repasadores',
            'id_interes_apoyar_orga' => 'Id Interes Apoyar Orga',
            'id_interes_prob_soc_ambi' => 'Id Interes Prob Soc Ambi',
            'id_interes_prac_laborales' => 'Id Interes Prac Laborales',
            'vocacion' => 'Vocacion',
            'campañas_divulgativas' => 'Campañas Divulgativas',
            'seguir_con_amigos' => 'Seguir Con Amigos',
            'id_practicas_artes' => 'Id Practicas Artes',
            'id_practicas_deportes' => 'Id Practicas Deportes',
            'concursos' => 'Concursos',
            'id_fumador' => 'Id Fumador',
            'id_bebedor' => 'Id Bebedor',
            'id_curso' => 'Id Curso',
        ];
    }

    /**
     * Gets query for [[AEsMenor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAEsMenor()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_a_es_menor'])->inverseOf('estudiantes2');
    }

    /**
     * Gets query for [[Bebedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBebedor()
    {
        return $this->hasOne(RespDeporteArte::className(), ['id' => 'id_bebedor'])->inverseOf('estudiantes2');
    }

    /**
     * Gets query for [[CamaronQue]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCamaronQue()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_camaron_que'])->inverseOf('estudiantes1');
    }

    /**
     * Gets query for [[CarerraOpcion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarerraOpcion()
    {
        return $this->hasOne(RespSobreEleccion::className(), ['id' => 'carerra_opcion'])->inverseOf('estudiantes');
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
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso'])->inverseOf('estudiantes');
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
     * Gets query for [[DesempeñoProfesional]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesempeñoProfesional()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_desempeño_profesional'])->inverseOf('estudiantes9');
    }

    /**
     * Gets query for [[DesicionEstudiar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesicionEstudiar()
    {
        return $this->hasOne(RespSobreEleccion::className(), ['id' => 'id_desicion_estudiar'])->inverseOf('estudiantes1');
    }

    /**
     * Gets query for [[DiseñadorSotf]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiseñadorSotf()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_diseñador_sotf'])->inverseOf('estudiantes3');
    }

    /**
     * Gets query for [[DiseñadorUiUx]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiseñadorUiUx()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_diseñador_ui_ux'])->inverseOf('estudiantes4');
    }

    /**
     * Gets query for [[DispoCopumtadora]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDispoCopumtadora()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_dispo_copumtadora'])->inverseOf('estudiantes8');
    }

    /**
     * Gets query for [[EditoresPresentaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEditoresPresentaciones()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_editores_presentaciones'])->inverseOf('estudiantes5');
    }

    /**
     * Gets query for [[EditoresTexto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEditoresTexto()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_editores_texto'])->inverseOf('estudiantes3');
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
     * Gets query for [[EscritorExpositor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscritorExpositor()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_escritor_expositor'])->inverseOf('estudiantes6');
    }

    /**
     * Gets query for [[EspacioEstudiar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspacioEstudiar()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_espacio_estudiar'])->inverseOf('estudiantes9');
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
     * Gets query for [[EstudianteArtes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteArtes()
    {
        return $this->hasMany(EstudianteArte::className(), ['id_estudiante' => 'carne'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[EstudianteDeportes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteDeportes()
    {
        return $this->hasMany(EstudianteDeporte::className(), ['id_estudiante' => 'carne'])->inverseOf('estudiante');
    }

    /**
     * Gets query for [[EstudioEjercicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioEjercicios()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_estudio_ejercicios'])->inverseOf('estudiantes19');
    }

    /**
     * Gets query for [[EstudioGrupal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioGrupal()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_estudio_grupal'])->inverseOf('estudiantes18');
    }

    /**
     * Gets query for [[EstudioLibro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioLibro()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_estudio_libro'])->inverseOf('estudiantes17');
    }

    /**
     * Gets query for [[EstudioRepasadores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioRepasadores()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_estudio_repasadores'])->inverseOf('estudiantes20');
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
     * Gets query for [[FacilitadorDesiciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacilitadorDesiciones()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_facilitador_desiciones'])->inverseOf('estudiantes8');
    }

    /**
     * Gets query for [[Fumador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFumador()
    {
        return $this->hasOne(RespDeporteArte::className(), ['id' => 'id_fumador'])->inverseOf('estudiantes1');
    }

    /**
     * Gets query for [[GestorProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGestorProyectos()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_gestor_proyectos'])->inverseOf('estudiantes7');
    }

    /**
     * Gets query for [[HojasDeCalculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHojasDeCalculo()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_hojas_de_calculo'])->inverseOf('estudiantes4');
    }

    /**
     * Gets query for [[HorasEstudio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasEstudio()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_horas_estudio'])->inverseOf('estudiantes14');
    }

    /**
     * Gets query for [[HorasOtrosTrabajos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasOtrosTrabajos()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_horas_otros_trabajos'])->inverseOf('estudiantes15');
    }

    /**
     * Gets query for [[HorasRecreacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasRecreacion()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_horas_recreacion'])->inverseOf('estudiantes16');
    }

    /**
     * Gets query for [[ImportanciaSocie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImportanciaSocie()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_importancia_socie'])->inverseOf('estudiantes11');
    }

    /**
     * Gets query for [[InfluenciaCienTec]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfluenciaCienTec()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_influencia_cien_tec'])->inverseOf('estudiantes12');
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
     * Gets query for [[InteresApoyarOrga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInteresApoyarOrga()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_interes_apoyar_orga'])->inverseOf('estudiantes21');
    }

    /**
     * Gets query for [[InteresPracLaborales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInteresPracLaborales()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_interes_prac_laborales'])->inverseOf('estudiantes23');
    }

    /**
     * Gets query for [[InteresProbSocAmbi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInteresProbSocAmbi()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_interes_prob_soc_ambi'])->inverseOf('estudiantes22');
    }

    /**
     * Gets query for [[LenguajesProgramacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLenguajesProgramacion()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_lenguajes_programacion'])->inverseOf('estudiantes7');
    }

    /**
     * Gets query for [[LoEscencial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoEscencial()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_lo_escencial'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[MantenerEstCarrera]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMantenerEstCarrera()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_mantener_est_carrera'])->inverseOf('estudiantes');
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
     * Gets query for [[NoSoloDePan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoSoloDePan()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_no_solo_de_pan'])->inverseOf('estudiantes0');
    }

    /**
     * Gets query for [[PracticasArtes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPracticasArtes()
    {
        return $this->hasOne(RespDeporteArte::className(), ['id' => 'id_practicas_artes'])->inverseOf('estudiantes');
    }

    /**
     * Gets query for [[PracticasDeportes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPracticasDeportes()
    {
        return $this->hasOne(RespDeporteArte::className(), ['id' => 'id_practicas_deportes'])->inverseOf('estudiantes0');
    }

    /**
     * Gets query for [[Probador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProbador()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_probador'])->inverseOf('estudiantes2');
    }

    /**
     * Gets query for [[Programador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramador()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_programador'])->inverseOf('estudiantes1');
    }

    /**
     * Gets query for [[RelacionCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelacionCarreras()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_relacion_carreras'])->inverseOf('estudiantes10');
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

    /**
     * Gets query for [[Seguridad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguridad()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_seguridad'])->inverseOf('estudiantes5');
    }

    /**
     * Gets query for [[SoftwareGrafico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwareGrafico()
    {
        return $this->hasOne(RespPreguntasMas::className(), ['id' => 'id_software_grafico'])->inverseOf('estudiantes6');
    }

    /**
     * Gets query for [[SuperacionConstante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSuperacionConstante()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_superacion_constante'])->inverseOf('estudiantes13');
    }

    /**
     * Gets query for [[TiempoTranscurrido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiempoTranscurrido()
    {
        return $this->hasOne(RespSobreEleccion::className(), ['id' => 'id_tiempo_transcurrido'])->inverseOf('estudiantes0');
    }

    /**
     * Gets query for [[TrabajoGraduado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajoGraduado()
    {
        return $this->hasOne(RespSobreFuturo::className(), ['id' => 'id_trabajo_graduado'])->inverseOf('estudiantes0');
    }
}
