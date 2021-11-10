<?php
    
    namespace app\models;
    
    use app\services\ArteService;
    use app\services\ConvivenciaService;
    use app\services\DatoMilitarService;
    use app\services\DependenciaEconService;
    use app\services\DeporteService;
    use app\services\EgresadoService;
    use app\services\EstadoCivilService;
    use app\services\EstudianteArteService;
    use app\services\EstudianteDeporteService;
    use app\services\EstudianteService;
    use app\services\ExperienciaDireccionService;
    use app\services\IngresoService;
    use app\services\IntegracionPoliticaService;
    use app\services\MunicipioSevices;
    use app\services\NivelEscolaridadService;
    use app\services\ProvinciaService;
    use app\services\RespDeporteArteService;
    use app\services\RespPreguntasMasService;
    use app\services\RespSobreEleccionService;
    use app\services\RespSobreFuturoService;
    use app\services\SectorOcupacionalService;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    use yii;
    use yii\base\Model;
    use yii\web\UploadedFile;


    class UploadForm extends Model{
        public $file;
    
        public function rules(){
            return [
                [
                    ['file'],
                    'file',
                    'skipOnEmpty' => false,
                    'extensions'  => 'xls,xlsx'
                ],
            ];
        }
        
        public function attributeLabels(){
            return ['file' => 'subir archivo '];
        }
        
        public function upload(){
            $file = UploadedFile::getInstance($this, 'file');
            
            if ($this->rules()){
                $tmp_file = $file->baseName . '.' . $file->extension;
                $path = 'upload/' . 'Files/';
                if (is_dir($path)){
                    $file->saveAs($path . $tmp_file);
                }else{
                    mkdir($path, 0777, true);
                    $file->saveAs($path . $tmp_file);
                }
                
                return true;
            }else{
                return 'validation failed';
            }
        }
        
        public function readExcel(){
            $reader = new Xlsx();
            $spreadSheet = $reader->load('upload/' . 'Files/' . $this->file->name);
            $sheet = $spreadSheet->getSheet(1);
            $data = [
    
                //DATOS GENERALES
                'nombre'            => $sheet->getCell("B3")->getValue(),
                'provincia'         => $sheet->getCell("b4")->getValue(),
                'municipio'         => $sheet->getCell("b5")->getValue(),
                'egresadoDe'        => $sheet->getCell("b6")->getValue(),
                'viaIngreso'        => $sheet->getCell("b7")->getValue(),
                'matematica'        => $sheet->getCell("b8")->getValue(),
                'español'           => $sheet->getCell("b9")->getValue(),
                'historia'          => $sheet->getCell("b10")->getValue(),
                'indiceAca'         => $sheet->getCell("b11")->getValue(),
                'carne'            => $sheet->getCell("b12")->getValue(),
                'datosMil'          => $sheet->getCell("b13")->getValue(),
                'orgPolitica'       => $sheet->getCell("b14")->getValue(),
                'expDireccion'      => $sheet->getCell("b15")->getValue(),
                'concursos'         => $sheet->getCell("b16")->getValue(),
    
                //ASPECTOS SOCIOECONÓMICO
                'becado'            => $sheet->getCell("b18")->getValue() == "Sí",
                'estadoCivil'       => $sheet->getCell("b19")->getValue(),
                'cantHijos'         => $sheet->getCell("b20")->getValue(),
                'convivenCon'       => $sheet->getCell("b21")->getValue(),
                'dependenciaEco'    => $sheet->getCell("b22")->getValue(),
                'trabajoMadre'      => $sheet->getCell("b23")->getValue(),
                'trabajoPadre'      => $sheet->getCell("b24")->getValue(),
                'nivelEscolarMadre' => $sheet->getCell("b25")->getValue(),
                'nivelEscolarPadre' => $sheet->getCell("b26")->getValue(),
                'informarFamilia'   => $sheet->getCell("b27")->getValue() == "Sí",
                'contactoEmail'     => $sheet->getCell("b28")->getValue(),
                'contactoTele'      => $sheet->getCell("b29")->getValue(),
    
    
                //SOBRE TU ELECCIÓN DE LA CARRERA
                'tiempo12Grado'     => $sheet->getCell("b31")->getValue(),
                'numOpcCarrera'     => $sheet->getCell("b32")->getValue(),
                'tiempoDescCarrera' => $sheet->getCell("b33")->getValue(),
            ];
    
            $data['meGusta']         = $sheet->getCell('b35')->getValue() == "X";
            $data['tituloUnive']     = $sheet->getCell('b36')->getValue() == "X";
            $data['complacerPadres'] = $sheet->getCell('b37')->getValue() == "X";
            $data['prepaFuturo']     = $sheet->getCell('b38')->getValue() == "X";
            $data['pareceOtra']      = $sheet->getCell('b39')->getValue() == "X";
            $data['serAlquien']      = $sheet->getCell('b40')->getValue() == "X";
            $data['razonesOtra']     = $sheet->getCell('b41')->getValue();
    
            $data['sugerenciaFamiliar']   = $sheet->getCell('b43')->getValue() == "X";
            $data['familia']              = $sheet->getCell('b44')->getValue() == "X";
            $data['amigos']               = $sheet->getCell('b45')->getValue() == "X";
            $data['desicionPersonal']     = $sheet->getCell('b47')->getValue() == "X";
            $data['profesores']           = $sheet->getCell('b46')->getValue() == "X";
            $data['vocacion']             = $sheet->getCell('b48')->getValue() == "X";
            $data['campañasDivulgativas'] = $sheet->getCell('b49')->getValue() == "X";
            $data['seguirAmigos']         = $sheet->getCell('b50')->getValue() == "X";
            $data['noOportunidad']        = $sheet->getCell('b51')->getValue() == "X";
            $data['influenciaOtra']       = $sheet->getCell('b52')->getValue();
    
    
            $data['expCirculos']  = $sheet->getCell('b54')->getValue() == "X";
            $data['expConf']      = $sheet->getCell('b55')->getValue() == "X";
            $data['expConcursos'] = $sheet->getCell('b56')->getValue() == "X";
            $data['expJovenClub'] = $sheet->getCell('b57')->getValue() == "X";
            $data['expFamiliar']  = $sheet->getCell('b58')->getValue() == "X";
            $data['expOtras']     = $sheet->getCell('b59')->getValue();
    
            //SOBRE TU FUTURO EN LA CARRERA
            $data1 = [
                'desicionCarrera' => $sheet->getCell("b61")->getValue(),
                'comentario'      => $sheet->getCell("b62")->getValue(),
                'imaginaGraduado' => $sheet->getCell("b63")->getValue(),
        
                'programador'    => $sheet->getCell("b65")->getValue(),
                'probador'       => $sheet->getCell("b66")->getValue(),
                'diseñadorSoft'  => $sheet->getCell("b72")->getValue(),
                'diseñadorUIUX'  => $sheet->getCell("b74")->getValue(),
                'seguridad'      => $sheet->getCell("b75")->getValue(),
                'escritorExp'    => $sheet->getCell("b76")->getValue(),
                'gestorProyecto' => $sheet->getCell("b77")->getValue(),
                'tomaDesicion'   => $sheet->getCell("b79")->getValue(),
        
                'desempeño'           => $sheet->getCell("b81")->getValue(),
                'relacionProfesiones' => $sheet->getCell("b82")->getValue(),
                'imporSociedad'       => $sheet->getCell("b83")->getValue(),
                'influenciaDesarollo' => $sheet->getCell("b84")->getValue(),
                'superacionContacte'  => $sheet->getCell("b85")->getValue(),
        
                'horasEstudio'    => $sheet->getCell("b87")->getValue(),
                'horasTrabajos'   => $sheet->getCell("b88")->getValue(),
                'horasRecreacion' => $sheet->getCell("b89")->getValue(),
        
                'estIndividualLibro' => $sheet->getCell("b91")->getValue(),
                'estGrupal'          => $sheet->getCell("b92")->getValue(),
                'realizarEjercicios' => $sheet->getCell("b93")->getValue(),
                'repasadores'        => $sheet->getCell("b94")->getValue(),
        
                'direcEstudiantil'   => $sheet->getCell("b96")->getValue(),
                'probSociales'       => $sheet->getCell("b97")->getValue(),
                'practProfesionales' => $sheet->getCell("b98")->getValue(),
            ];
    
            //HABITOS
            $data2 = [
                'fumas'           => $sheet->getCell("b100")->getValue(),
                'alcohol'         => $sheet->getCell("b101")->getValue(),
                'pracDeporte'     => $sheet->getCell("b102")->getValue(),
                'comentarioDepor' => $sheet->getCell("b128")->getValue(),
    
            ];
    
            $deportes = '';
            for ($i = 103;$i <= 127;$i++){
                $filaA  = 'A' . (string)$i;
                $filaB  = 'B' . (string)$i;
                $valueA = $sheet->getCell($filaA)->getValue();
                $valueB = $sheet->getCell($filaB)->getValue();
                if ($valueB == 'X'){
                    $deportes = $deportes . $valueA . ',';
                }
        
            }
            $data2['deportes'] = $deportes;
    
            $data3 = ['practArtes' => $sheet->getCell("b129")->getValue(),];
            $artes = '';
            for ($i = 130;$i <= 138;$i++){
                $filaA  = 'A' . (string)$i;
                $filaB  = 'B' . (string)$i;
                $valueA = $sheet->getCell($filaA)->getValue();
                $valueB = $sheet->getCell($filaB)->getValue();
                if ($valueB == 'X'){
                    $artes = $artes . $valueA . ',';
                }
        
            }
            $data3['artes']          = $artes;
            $data3['comentarioArte'] = $sheet->getCell("b139")->getValue();
    
            $data4 = [
                'ultimoLibro'      => $sheet->getCell("b140")->getValue(),
                'ultimoLibroAño'   => $sheet->getCell("b141")->getValue(),
                'penuLibro'        => $sheet->getCell("b142")->getValue(),
                'penuLibroAño'     => $sheet->getCell("b143")->getValue(),
                'antePenuLibro'    => $sheet->getCell("b144")->getValue(),
                'antePenuLibroAño' => $sheet->getCell("b145")->getValue(),
                'cantanteFav'      => $sheet->getCell("b146")->getValue(),
        
                //UNAS PREGUNTAS MÁS
                'pregunta1'        => $sheet->getCell("b149")->getValue(),
                'pregunta2'        => $sheet->getCell("b150")->getValue(),
                'pregunta3'        => $sheet->getCell("b151")->getValue(),
                'pregunta4'        => $sheet->getCell("b152")->getValue(),
        
                'editores'       => $sheet->getCell("b154")->getValue(),
                'hojasCalculo'   => $sheet->getCell("b155")->getValue(),
                'presentaciones' => $sheet->getCell("b156")->getValue(),
                'sotfGrafico'    => $sheet->getCell("b157")->getValue(),
                'lengProgra'     => $sheet->getCell("b158")->getValue(),
        
                'Computadora'    => $sheet->getCell("b160")->getValue(),
                'espacioEstudio' => $sheet->getCell("b161")->getValue(),
    
            ];
    
            $dataFinal = array_merge($data, $data1, $data2, $data3, $data4);
            return $dataFinal;
        }
    
        public function deleteExcel(){
            unlink('upload/' . 'Files/' . $this->file->name);
        }
    
        public function inputExcelDB($data){
            $trans = Yii::$app->db->beginTransaction();
            try{
                //tabla estudiante y todas las tablas que tienen llave foranea en estudiante
                $idProvincia              = ProvinciaService::create($data['provincia']);
                $idMunicipio              = MunicipioSevices::create($data['municipio'], $idProvincia);
                $idEgresado               = EgresadoService::create($data['egresadoDe']);
                $idIngreso                = IngresoService::create($data['viaIngreso']);
                $idMilitar                = DatoMilitarService::create($data['datosMil']);
                $idIntegracionPolitica    = IntegracionPoliticaService::create($data['orgPolitica']);
                $idExperienciaDireccion   = ExperienciaDireccionService::create($data['expDireccion']);
                $idEstadoCivil            = EstadoCivilService::create($data['estadoCivil']);
                $idConvivencia            = ConvivenciaService::create($data['convivenCon']);
                $idDependenciaEconomica   = DependenciaEconService::create($data['dependenciaEco']);
                $idSectorOcupacionalPadre = SectorOcupacionalService::create($data['trabajoPadre']);
                $idSectorOcupacionalMadre = SectorOcupacionalService::create($data['trabajoMadre']);
                $idNivelEscolarPadre      = NivelEscolaridadService::create($data['nivelEscolarPadre']);
                $idNivelEscolarMadre      = NivelEscolaridadService::create($data['nivelEscolarMadre']);
                $idTiempoTranscurrido     = RespSobreEleccionService::create($data['tiempo12Grado']);
                $idCarreraOpcion          = RespSobreEleccionService::create(strval($data['numOpcCarrera']));
                $idDesicionEstudiar       = RespSobreEleccionService::create($data['tiempoDescCarrera']);
                $idMantenerEstCarrera     = RespSobreFuturoService::create($data['desicionCarrera']);
                $idTrabajoGraduado        = RespSobreFuturoService::create($data['imaginaGraduado']);
                $idProgramador            = RespSobreFuturoService::create($data['programador']);
                $idProbador               = RespSobreFuturoService::create($data['probador']);
                $idDiseñadorSoft          = RespSobreFuturoService::create($data['diseñadorSoft']);
                $idDiseñadorUI            = RespSobreFuturoService::create($data['diseñadorUIUX']);
                $idSeguridad              = RespSobreFuturoService::create($data['seguridad']);
                $idEscritorExp            = RespSobreFuturoService::create($data['escritorExp']);
                $idGestorProyectos        = RespSobreFuturoService::create($data['gestorProyecto']);
                $idFacilitadorDesc        = RespSobreFuturoService::create($data['tomaDesicion']);
                $idDesepeñoPro            = RespSobreFuturoService::create($data['desempeño']);
                $idRelacionCarrera        = RespSobreFuturoService::create($data['relacionProfesiones']);
                $idImportanciaSocie       = RespSobreFuturoService::create($data['imporSociedad']);
                $idInfluenciaCien         = RespSobreFuturoService::create($data['influenciaDesarollo']);
                $idSuperacionConst        = RespSobreFuturoService::create($data['superacionContacte']);
                $idHorasEstudio           = RespSobreFuturoService::create($data['horasEstudio']);
                $idHorasOtrosTrab         = RespSobreFuturoService::create($data['horasTrabajos']);
                $idHorasRecreacion        = RespSobreFuturoService::create($data['horasRecreacion']);
                $idEstudioLibro           = RespSobreFuturoService::create($data['estIndividualLibro']);
                $idEstudioGrupal          = RespSobreFuturoService::create($data['estGrupal']);
                $idEstudioEjercicios      = RespSobreFuturoService::create($data['realizarEjercicios']);
                $idEstudioRepasadores     = RespSobreFuturoService::create($data['repasadores']);
                $idInteresOrg             = RespSobreFuturoService::create($data['direcEstudiantil']);
                $idIntresProbSociAmbi     = RespSobreFuturoService::create($data['probSociales']);
                $idInteresPracLabo        = RespSobreFuturoService::create($data['practProfesionales']);
                $idFumador                = RespDeporteArteService::create($data['fumas']);
                $idBebedor                = RespDeporteArteService::create($data['alcohol']);
                $idPracDeporte            = RespDeporteArteService::create($data['pracDeporte']);
                $idPracArte               = RespDeporteArteService::create($data['practArtes']);
                $idLoEscencial            = RespPreguntasMasService::create($data['pregunta1']);
                $idNoSoloPan              = RespPreguntasMasService::create($data['pregunta2']);
                $idCamaron                = RespPreguntasMasService::create($data['pregunta3']);
                $idAEsMenor               = RespPreguntasMasService::create($data['pregunta4']);
                $idEditoresText           = RespPreguntasMasService::create($data['editores']);
                $idHojasCalculo           = RespPreguntasMasService::create($data['hojasCalculo']);
                $idPresentaciones         = RespPreguntasMasService::create($data['presentaciones']);
                $idSotfGrafico            = RespPreguntasMasService::create($data['sotfGrafico']);
                $idLengProgramacion       = RespPreguntasMasService::create($data['lengProgra']);
                $idDispPc                 = RespPreguntasMasService::create($data['Computadora']);
                $idEspacioEstudiar        = RespPreguntasMasService::create($data['espacioEstudio']);
                $dataEstudiante           = [
                    'idMunicipio'              => $idMunicipio,
                    'idEgresado'               => $idEgresado,
                    'idIngreso'                => $idIngreso,
                    'datosMil'                 => $idMilitar,
                    'orgPolitica'              => $idIntegracionPolitica,
                    'expDireccion'             => $idExperienciaDireccion,
                    'estadoCivil'              => $idEstadoCivil,
                    'idConvivencia'            => $idConvivencia,
                    'idDependenciaEconomica'   => $idDependenciaEconomica,
                    'idSectorOcupacionalPadre' => $idSectorOcupacionalPadre,
                    'idSectorOcupacionalMadre' => $idSectorOcupacionalMadre,
                    'idNivelEscolarPadre'      => $idNivelEscolarPadre,
                    'idNivelEscolarMadre'      => $idNivelEscolarMadre,
                    'idTiempoTranscurrido'     => $idTiempoTranscurrido,
                    'idCarreraOpcion'          => $idCarreraOpcion,
                    'idDesicionEstudiar'       => $idDesicionEstudiar,
                    'idMantenerEstCarrera'     => $idMantenerEstCarrera,
                    'idTrabajoGraduado'        => $idTrabajoGraduado,
                    'idProgramador'            => $idProgramador,
                    'idProbador'               => $idProbador,
                    'idDiseñadorSoft'          => $idDiseñadorSoft,
                    'idDiseñadorUI'            => $idDiseñadorUI,
                    'idSeguridad'              => $idSeguridad,
                    'idEscritorExp'            => $idEscritorExp,
                    'idGestorProyectos'        => $idGestorProyectos,
                    'idFacilitadorDesc'        => $idFacilitadorDesc,
                    'idDesepeñoPro'            => $idDesepeñoPro,
                    'idRelacionCarrera'        => $idRelacionCarrera,
                    'idImportanciaSocie'       => $idImportanciaSocie,
                    'idInfluenciaCien'         => $idInfluenciaCien,
                    'idSuperacionConst'        => $idSuperacionConst,
                    'idHorasEstudio'           => $idHorasEstudio,
                    'idHorasOtrosTrab'         => $idHorasOtrosTrab,
                    'idHorasRecreacion'        => $idHorasRecreacion,
                    'idEstudioLibro'           => $idEstudioLibro,
                    'idEstudioGrupal'          => $idEstudioGrupal,
                    'idEstudioEjercicios'      => $idEstudioEjercicios,
                    'idEstudioRepasadores'     => $idEstudioRepasadores,
                    'idInteresOrg'             => $idInteresOrg,
                    'idIntresProbSociAmbi'     => $idIntresProbSociAmbi,
                    'idInteresPracLabo'        => $idInteresPracLabo,
                    'idFumador'                => $idFumador,
                    'idBebedor'                => $idBebedor,
                    'idPracDeporte'            => $idPracDeporte,
                    'idPracArte'               => $idPracArte,
                    'idLoEscencial'            => $idLoEscencial,
                    'idNoSoloPan'              => $idNoSoloPan,
                    'idCamaron'                => $idCamaron,
                    'idAEsMenor'               => $idAEsMenor,
                    'idEditoresText'           => $idEditoresText,
                    'idHojasCalculo'           => $idHojasCalculo,
                    'idPresentaciones'         => $idPresentaciones,
                    'idSotfGrafico'            => $idSotfGrafico,
                    'idLengProgramacion'       => $idLengProgramacion,
                    'idDispPc'                 => $idDispPc,
                    'idEspacioEstudiar'        => $idEspacioEstudiar,
                ];
        
                $idEstudiante = EstudianteService::createEstudiante($dataEstudiante, $data);
                $listaDeporte =explode(",", $data['deportes']);
                $listaArte = explode(",",$data['artes']);
                foreach ($listaDeporte as $deporte){
                    if($deporte != ""){
                        $idDeporte = DeporteService::create($deporte);
                        EstudianteDeporteService::create($idEstudiante,$idDeporte);
                    }
                }
                foreach ($listaArte as $arte){
                    if($arte != ""){
                        $idArte = ArteService::create($arte);
                        EstudianteArteService::create($idEstudiante,$idArte);
                    }
                }
                
                $trans->commit();
                
            }catch (\Exception $e){
                $trans->rollBack();
                print_r($e);
                throw $e;
            }
            
            
        
        
        }
    
    
    }

