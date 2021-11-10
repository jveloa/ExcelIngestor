<?php
    
    
    namespace app\services;


    use app\models\db\EstudianteDeporte;

    class EstudianteDeporteService{
        static function create($idEstudiante, $idDeporte){
            $found = self::get($idEstudiante, $idDeporte);
            if (!isset($found)){
                $pro                = new EstudianteDeporte();
                $pro->id_estudiante = $idEstudiante;
                $pro->id_deporte    = $idDeporte;
                $pro->save(false);
                return true;
            }
            return false;
        }
    
        static function get($idEstudiante, $idDeporte){
            $pro = EstudianteDeporte::findOne([
                'id_estudiante'   => $idEstudiante,
                'id_deporte' => $idDeporte
            ]);
            if (isset($pro)){
                return $pro->getAttributes();
            }else return null;
        
        }
    
        static function delete($idEstudiante){
            $pro = EstudianteDeporte::findOne($idEstudiante);
            $pro->delete();
        }
    }