<?php
    
    
    namespace app\services;
    
    
    use app\models\db\EstudianteArte;

    class EstudianteArteService{
        static function create($idEstudiante, $idArte){
            $found = self::get($idEstudiante, $idArte);
            if (!isset($found)){
                $pro                = new EstudianteArte();
                $pro->id_estudiante = $idEstudiante;
                $pro->id_arte    = $idArte;
                $pro->save(false);
                return true;
            }
            return false;
        }
    
        static function get($idEstudiante, $idArte){
            $pro = EstudianteArte::findOne([
                'id_estudiante'   => $idEstudiante,
                'id_arte' => $idArte
            ]);
            if (isset($pro)){
                return $pro->getAttributes();
            }else return null;
        
        }
    
        static function delete($idArte){
            $pro = EstudianteArte::findOne($idArte);
            $pro->delete();
        }
    }