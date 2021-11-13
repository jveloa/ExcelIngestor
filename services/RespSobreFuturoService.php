<?php
    
    
    namespace app\services;
    
    
    use app\models\db\RespSobreFuturo;

    class RespSobreFuturoService{
        static function create($respuesta){
            if(!isset($respuesta)){
                $respuesta = "No respondío";
            }
            $found = self::get($respuesta);
            if (!isset($found)){
                $pro = new RespSobreFuturo();
                $pro->respuesta = $respuesta;
                $pro->save();
                return self::get($respuesta)['id'];
            }
            return $found['id'];
        }
    
        static function get($respuesta){
            $pro = RespSobreFuturo::findOne(['respuesta'=> $respuesta]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = RespSobreFuturo::findOne($id);
            $pro->delete();
        }
    }