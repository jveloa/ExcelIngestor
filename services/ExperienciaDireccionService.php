<?php
    
    
    namespace app\services;
    
    
    use app\models\db\ExperienciaDireccion;

    class ExperienciaDireccionService{
        static function create($experiencia){
            if(!isset($experiencia)){
                $experiencia = "No respondío";
            }
            $found = self::get($experiencia);
            if(!isset($found)){
                $pro = new ExperienciaDireccion();
                $pro->organizacion = $experiencia;
                $pro->save();
                return self::get($experiencia)['id'];
            }
            return $found['id'];
        }
    
        static function get($experiencia){
            $pro = ExperienciaDireccion::findOne(['organizacion' => $experiencia]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = ExperienciaDireccion::findOne($id);
            $pro->delete();
        }
    }