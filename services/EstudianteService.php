<?php
    
    
    namespace app\services;
    use app\models\db\Estudiante;
    
    class EstudianteService{
        static function createEstudiante($data){
            $found = self::get($data['nombre']);
            if(!isset($found)){
                $est = new Estudiante();
                $est->carnet = $data['carnet'];
                $est->nombre = $data['nombre'];
                $est->id_municipio = $data['idMunicipio'];
                $est->id_egresado = $data['idEgresado'];
                $est->id_ingreso = $data['idIngreso'];
                $est->nota_matematica = $data['matematica'];
                $est->nota_espannol = $data['español'];
                $est->nota_historia = $data['historia'];
                $est->id_dato_militar = $data['datosMil'];
                $est->id_integracion_politica = $data['orgPolitica'];
                $est->indice_academico = $data['indiceAca'];
                $est->id_experiencia_direccion = $data['expDireccion'];
                $est->becado = $data['becado'];
                $est->cantidad_hijos = $data['cantHijos'];
                $est->estado_civil = $data['estadoCivil'];
                $est->id_convivencia = $data['idConvivencia'];
                $est->id_dependencia_economica = $data['idDependenciaEconomica'];
                $est->id_sector_ocupacional_padre = $data['idSectorOcupacionalPadre'];
                $est->id_sector_ocupacional_madre = $data['idSectorOcupacionalMadre'];
                $est->id_nivel_escolaridad_padre = $data['idNivelEscolarPadre'];
                $est->id_nivel_escolaridad_madre = $data['idNivelEscolarMadre'];
                $est->informar_familia =  $data['informarFamilia'];
                $est->carerra_opcion = $data['numOpcCarrera'];
                $est->contacto_email = $data['contactoEmail'];
                $est->contacto_telefono =  $data['contactoTele'];
                $est->save(false);
                return true;
            }
            return false;
        }
        
        static function get($nombre){
            $est = Estudiante::findOne(['nombre'=> $nombre]);
            if(isset($est)){
                return $est->getAttributes();
            }else return null;
            
            
        }
        
    }