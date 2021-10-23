<?php
    
    namespace app\models;
    
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    use yii\db\ActiveRecord;
    use yii\web\UploadedFile;
    
    
    class uploadForm extends ActiveRecord{
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
                'carnet'            => $sheet->getCell("b12")->getValue(),
                'datosMil'          => $sheet->getCell("b13")->getValue(),
                'orgPolitica'       => $sheet->getCell("b14")->getValue(),
                'indiceAca'         => $sheet->getCell("b15")->getValue(),
                'expDireccion'      => $sheet->getCell("b15")->getValue(),
                'concursos'         => $sheet->getCell("b16")->getValue(),
                
                //ASPECTOS SOCIOECONÓMICO
                'becado'            => $sheet->getCell("b18")->getValue(),
                'estadoCivil'       => $sheet->getCell("b19")->getValue(),
                'cantHijos'         => $sheet->getCell("b20")->getValue(),
                'convivenCon'       => $sheet->getCell("b21")->getValue(),
                'dependenciaEco'    => $sheet->getCell("b22")->getValue(),
                'trabajoMadre'      => $sheet->getCell("b23")->getValue(),
                'trabajoPadre'      => $sheet->getCell("b24")->getValue(),
                'nivelEscolarMadre' => $sheet->getCell("b25")->getValue(),
                'nivelEscolarPadre' => $sheet->getCell("b26")->getValue(),
                'informarFamilia'   => $sheet->getCell("b27")->getValue(),
                'contactoEmail'     => $sheet->getCell("b28")->getValue(),
                'contactoTele'      => $sheet->getCell("b29")->getValue(),
                
                
                //SOBRE TU ELECCIÓN DE LA CARRERA
                'tiempo12Grado'     => $sheet->getCell("b31")->getValue(),
                'numOpcCarrera'     => $sheet->getCell("b32")->getValue(),
                'tiempoDescCarrera' => $sheet->getCell("b33")->getValue(),
            ];
            
            $razones = '';
            for ($i = 35;$i <= 41;$i++){
                $filaA = 'A' . (string)$i;
                $filaB = 'B' . (string)$i;
                $valueA = $sheet->getCell($filaA)->getValue();
                $valueB = $sheet->getCell($filaB)->getValue();
                if ($valueA == 'Otras ¿cuáles?'){
                    $razones = $razones . $valueB . ',';
                }else if ($valueB == 'X'){
                    $razones = $razones . $valueA . ',';
                }
                
                
            }
            $data['razonesCarrera'] = $razones;
            
            $factoresEleccion = '';
            for ($i = 43;$i <= 52;$i++){
                $filaA = 'A' . (string)$i;
                $filaB = 'B' . (string)$i;
                $valueA = $sheet->getCell($filaA)->getValue();
                $valueB = $sheet->getCell($filaB)->getValue();
                if ($valueA == 'Otros. ¿Cuáles?'){
                    $factoresEleccion = $factoresEleccion . $valueB . ',';
                }else if ($valueB == 'X'){
                    $factoresEleccion = $factoresEleccion . $valueA . ',';
                }
                
                
            }
            $data['factoresEleccion'] = $factoresEleccion;
            
            $experienciaCarrera = '';
            for ($i = 54;$i <= 59;$i++){
                $filaA = 'A' . (string)$i;
                $filaB = 'B' . (string)$i;
                $valueA = $sheet->getCell($filaA)->getValue();
                $valueB = $sheet->getCell($filaB)->getValue();
                if ($valueA == 'Otros. ¿Cuáles?'){
                    $experienciaCarrera = $experienciaCarrera . $valueB . ',';
                }else if ($valueB == 'X'){
                    $experienciaCarrera = $experienciaCarrera . $valueA . ',';
                }
                
            }
            $data['experienciaCarrera'] = $experienciaCarrera;
            
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
                
                'dedicarseA'          => $sheet->getCell("b81")->getValue(),
                'relacionProfesiones' => $sheet->getCell("b82")->getValue(),
                'imporSociedad'       => $sheet->getCell("b83")->getValue(),
                'influenciaDesarollo' => $sheet->getCell("b84")->getValue(),
                'superacionContacte'  => $sheet->getCell("b85")->getValue(),
                
                'horasEstudio'    => $sheet->getCell("b87")->getValue(),
                'horasTrabajos'   => $sheet->getCell("b88")->getValue(),
                'horasRecreacion' => $sheet->getCell("b89")->getValue(),
                
                'estIndividual'      => $sheet->getCell("b91")->getValue(),
                'estGrupal'          => $sheet->getCell("b92")->getValue(),
                'realizarEjercicios' => $sheet->getCell("b93")->getValue(),
                'repasadores'        => $sheet->getCell("b94")->getValue(),
                
                'direcEstudiantil'   => $sheet->getCell("b96")->getValue(),
                'probSociales'       => $sheet->getCell("b97")->getValue(),
                'practProfesionales' => $sheet->getCell("b98")->getValue(),
            ];
            
            //HABITOS
            $data2 = [
                'fumas'       => $sheet->getCell("b100")->getValue(),
                'alcohol'     => $sheet->getCell("b101")->getValue(),
                'pracDeporte' => $sheet->getCell("b102")->getValue(),
            ];
            
            $deportes = '';
            for ($i = 103;$i <= 128;$i++){
                $filaA = 'A' . (string)$i;
                $filaB = 'B' . (string)$i;
                $valueA = $sheet->getCell($filaA)->getValue();
                $valueB = $sheet->getCell($filaB)->getValue();
                if ($valueA == 'Comentario adicional (deportes)'){
                    $deportes = $deportes . $valueB . ',';
                }else if ($valueB == 'X'){
                    $deportes = $deportes . $valueA . ',';
                }
                
            }
            $data2['deportes'] = $deportes;
            
            $data3 = ['practArtes' => $sheet->getCell("b129")->getValue(),];
            $artes = '';
            for ($i = 130;$i <= 139;$i++){
                $filaA = 'A' . (string)$i;
                $filaB = 'B' . (string)$i;
                $valueA = $sheet->getCell($filaA)->getValue();
                $valueB = $sheet->getCell($filaB)->getValue();
                if ($valueA == 'Comentario adicional (deportes)'){
                    $artes = $artes . $valueB . ',';
                }else if ($valueB == 'X'){
                    $artes = $artes . $valueA . ',';
                }
                
            }
            $data3['artes'] = $artes;
            
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
                'pregunta5'        => $sheet->getCell("b152")->getValue(),
                
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
        
        public function newProvincia(){
            $pro = new Provincia();
            $pro->nombre = "La habana";
            $pro->save();
        }
    }

