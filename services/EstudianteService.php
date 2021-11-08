<?php
    
    
    namespace app\services;
    use app\models\db\Estudiante;

    class EstudianteService{
        static function createEstudiante($dataEstdiante, $data){
            $found = self::get($data['nombre']);
            if (!isset($found)){
                $est                              = new Estudiante();
                $est->carnet                      = $data['carnet'];
                $est->nombre                      = $data['nombre'];
                $est->id_municipio                = $dataEstdiante['idMunicipio'];
                $est->id_egresado                 = $dataEstdiante['idEgresado'];
                $est->id_ingreso                  = $dataEstdiante['idIngreso'];
                $est->nota_matematica             = $data['matematica'];
                $est->nota_espannol               = $data['español'];
                $est->nota_historia               = $data['historia'];
                $est->indice_academico            = $data['indiceAca'];
                $est->id_dato_militar             = $dataEstdiante['datosMil'];
                $est->id_integracion_politica     = $dataEstdiante['orgPolitica'];
                $est->id_experiencia_direccion    = $dataEstdiante['expDireccion'];
                $est->concursos                   = $data['concursos'];
                $est->becado                      = $data['becado'];
                $est->cantidad_hijos              = $data['cantHijos'];
                $est->estado_civil                = $dataEstdiante['estadoCivil'];
                $est->id_convivencia              = $dataEstdiante['idConvivencia'];
                $est->id_dependencia_economica    = $dataEstdiante['idDependenciaEconomica'];
                $est->id_sector_ocupacional_padre = $dataEstdiante['idSectorOcupacionalPadre'];
                $est->id_sector_ocupacional_madre = $dataEstdiante['idSectorOcupacionalMadre'];
                $est->id_nivel_escolaridad_padre  = $dataEstdiante['idNivelEscolarPadre'];
                $est->id_nivel_escolaridad_madre  = $dataEstdiante['idNivelEscolarMadre'];
                $est->informar_familia            = $data['informarFamilia'];
                $est->contacto_email              = $data['contactoEmail'];
                $est->contacto_telefono           = $data['contactoTele'];
                $est->id_tiempo_transcurrido      = $dataEstdiante['idTiempoTranscurrido'];
                $est->carerra_opcion              = $data['numOpcCarrera'];
                $est->id_desicion_estudiar        = $dataEstdiante['idMantenerEstCarrera'];
                $est->xq_me_gusta                 = $data['meGusta'];
                $est->para_tener_titulo           = $data['tituloUnive'];
                $est->complacer_padres            = $data['complacerPadres'];
                $est->prepararme_futuro           = $data['prepaFuturo'];
                $est->se_parece_a_otra            = $data['pareceOtra'];
                $est->para_ser_alguien            = $data['serAlquien'];
                $est->razones_otras               = $data['razonesOtra'];
                $est->sugerencia_familiar         = $data['sugerenciaFamiliar'];
                $est->familia                     = $data['familia'];
                $est->amigos                      = $data['amigos'];
                $est->desicion_personal           = $data['desicionPersonal'];
                $est->profesores                  = $data['profesores'];
                $est->vocacion                    = $data['vocacion'];
                $est->campañas_divulgativas       = $data['campañasDivulgativas'];
                $est->seguir_con_amigos           = $data['seguirAmigos'];
                $est->no_oportunidad              = $data['noOportunidad'];
                $est->influencias_otras           = $data['influenciaOtra'];
                $est->exp_circulos_interes        = $data['expCirculos'];
                $est->exp_conf_charlas            = $data['expConf'];
                $est->exp_concursos               = $data['expConcursos'];
                $est->exp_joven_club              = $data['expJovenClub'];
                $est->exp_familias_conocido       = $data['expFamiliar'];
                $est->experiencias_otras          = $data['expOtras'];
                $est->id_mantener_est_carrera     = $dataEstdiante['idMantenerEstCarrera'];
                $est->comentario_mantener_est     = $data['comentario'];
                $est->id_trabajo_graduado         = $dataEstdiante['idTrabajoGraduado'];
                $est->id_programador              = $dataEstdiante['idProgramador'];
                $est->id_probador                 = $dataEstdiante['idProbador'];
                $est->id_diseñador_sotf           = $dataEstdiante['idDiseñadorSoft'];
                $est->id_diseñador_ui_ux          = $dataEstdiante['idDiseñadorUI'];
                $est->id_seguridad                = $dataEstdiante['idSeguridad'];
                $est->id_escritor_expositor       = $dataEstdiante['idEscritorExp'];
                $est->id_gestor_proyectos         = $dataEstdiante['idGestorProyectos'];
                $est->id_facilitador_desiciones   = $dataEstdiante['idFacilitadorDesc'];
                $est->id_desempeño_profesional    = $dataEstdiante['idDesepeñoPro'];
                $est->id_relacion_carreras        = $dataEstdiante['idRelacionCarrera'];
                $est->id_importancia_socie        = $dataEstdiante['idImportanciaSocie'];
                $est->id_influencia_cien_tec      = $dataEstdiante['idInfluenciaCien'];
                $est->id_superacion_constante     = $dataEstdiante['idSuperacionConst'];
                $est->id_horas_estudio            = $dataEstdiante['idHorasEstudio'];
                $est->id_horas_otros_trabajos     = $dataEstdiante['idHorasOtrosTrab'];
                $est->id_horas_recreacion         = $dataEstdiante['idHorasRecreacion'];
                $est->id_estudio_libro            = $dataEstdiante['idEstudioLibro'];
                $est->id_estudio_grupal           = $dataEstdiante['idEstudioGrupal'];
                $est->id_estudio_ejercicios       = $dataEstdiante['idEstudioEjercicios'];
                $est->id_estudio_repasadores      = $dataEstdiante['idEstudioRepasadores'];
                $est->id_interes_apoyar_orga      = $dataEstdiante['idInteresOrg'];
                $est->id_interes_prob_soc_ambi    = $dataEstdiante['idIntresProbSociAmbi'];
                $est->id_interes_prac_laborales   = $dataEstdiante['idInteresPracLabo'];
                $est->id_fumador                  = $dataEstdiante['idFumador'];
                $est->id_bebedor                  = $dataEstdiante['idBebedor'];
                $est->id_practicas_deportes       = $dataEstdiante['idPracDeporte'];
                $est->comentario_deporte          = $data['comentarioDepor'];
                $est->id_practicas_artes          = $dataEstdiante['idPracArte'];
                $est->comentario_arte             = $data['comentarioArte'];
                $est->ultimo_libro                = $data['ultimoLibro'];
                $est->anno_ultimo_libro           = $data['ultimoLibroAño'];
                $est->penultimo_libro             = $data['penuLibro'];
                $est->anno_penultimo_libro        = $data['penuLibroAño'];
                $est->antepenultimo_libro         = $data['antePenuLibro'];
                $est->anno_antepenultimo_libro    = $data['antePenuLibroAño'];
                $est->musica_favorita             = $data['cantanteFav'];
                $est->id_lo_escencial             = $dataEstdiante['idLoEscencial'];
                $est->id_no_solo_de_pan           = $dataEstdiante['idNoSoloPan'];
                $est->id_camaron_que              = $dataEstdiante['idCamaron'];
                $est->id_a_es_menor               = $dataEstdiante['idAEsMenor'];
                $est->id_editores_texto           = $dataEstdiante['idEditoresText'];
                $est->id_hojas_de_calculo         = $dataEstdiante['idHojasCalculo'];
                $est->id_editores_presentaciones  = $dataEstdiante['idPresentaciones'];
                $est->id_software_grafico         = $dataEstdiante['idSotfGrafico'];
                $est->id_lenguajes_programacion   = $dataEstdiante['idLengProgramacion'];
                $est->id_dispo_copumtadora        = $dataEstdiante['idDispPc'];
                $est->id_espacio_estudiar         = $dataEstdiante['idEspacioEstudiar'];
                $est->save(false);
                return self::get($data['nombre'])['carnet'];
            }
            return self::get($data['nombre'])['carnet'];
        }
        
        static function get($nombre){
            $est = Estudiante::findOne(['nombre'=> $nombre]);
            if(isset($est)){
                return $est->getAttributes();
            }else return null;
            
            
        }
        
    }