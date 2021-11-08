<?php
    
    
    namespace app\services;
    
    
    use app\models\db\EstudianteDeporteArte;
    
    class EstudianteDeporteArteService{
        static function create($idEstudiante, $idDeporteArte){
            $found = self::get($idEstudiante,$idDeporteArte);
            if (!isset($found)){
                $pro = new EstudianteDeporteArte();
                $pro->id_estudiante = $idEstudiante;
                $pro->id_deporte_arte = $idDeporteArte;
                $pro->save();
                return true;
            }
            return false;
        }
        
        static function get($idEstudiante,$idDeporteArte){
            $pro = EstudianteDeporteArte::findOne(['id_estudiante'   => $idEstudiante,
                                                   'id_deporte_arte' => $idDeporteArte]);
            if (isset($pro)){
                return $pro->getAttributes();
            }else return null;
            
        }
        
        static function delete($idEstudiante){
            $pro = EstudianteDeporteArte::findOne($idEstudiante);
            $pro->delete();
        }
    }