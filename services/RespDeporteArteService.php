<?php
    
    
    namespace app\services;
    
    
    use app\models\db\RespDeporteArte;

    class RespDeporteArteService{
        static function create($respuesta){
            if(!isset($respuesta)){
                $respuesta = "No respondío";
            }
            $found = self::get($respuesta);
            if (!isset($found)){
                $pro = new RespDeporteArte();
                $pro->respuesta = $respuesta;
                $pro->save();
                return self::get($respuesta)['id'];
            }
            return $found['id'];
        }
    
        static function get($respuesta){
            $pro = RespDeporteArte::findOne(['respuesta'=> $respuesta]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = RespDeporteArte::findOne($id);
            $pro->delete();
        }
    }