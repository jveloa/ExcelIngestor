<?php
    
    
    namespace app\services;
    
    
    use app\models\db\DependenciaEconomica;

    class DependenciaEconService{
        static function create($dependencia){
            if(!isset($dependencia)){
                $dependencia = "No respondío";
            }
            $found = self::get($dependencia);
            if(!isset($found)){
                $pro = new DependenciaEconomica();
                $pro->dependencia_economica = $dependencia;
                $pro->save();
                return self::get($dependencia)['id'];
            }
            return $found['id'];
        }
    
        static function get($dependencia){
            $pro = DependenciaEconomica::findOne(['dependencia_economica'=> $dependencia]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
    
        }
    
        static function delete($id){
            $pro = DependenciaEconomica::findOne($id);
            $pro->delete();
        }
    }