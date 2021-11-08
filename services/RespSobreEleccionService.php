<?php
    
    
    namespace app\services;
    
    
    use app\models\db\RespSobreEleccion;

    class RespSobreEleccionService{
        static function create($respuesta){
            $found = self::get($respuesta);
            if (!isset($found)){
                $pro = new RespSobreEleccion();
                $pro->respuesta = $respuesta;
                $pro->save();
                return self::get($respuesta)['id'];
            }
            return $found['id'];
        }
    
        static function get($respuesta){
            $pro = RespSobreEleccion::findOne(['respuesta'=> $respuesta]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = RespSobreEleccion::findOne($id);
            $pro->delete();
        }
    }