<?php
    
    
    namespace app\services;
    
    
    use app\models\db\NivelEscolaridad;

    class NivelEscolaridadService{
        static function create($nivelEscolaridad){
            $found = self::get($nivelEscolaridad);
            if(!isset($found)){
                $pro = new NivelEscolaridad();
                $pro->nivel_escolaridad = $nivelEscolaridad;
                $pro->save();
                return self::get($nivelEscolaridad)['id'];
            }
            return $found['id'];
        }
    
        static function get($nivelEscolaridad){
            $pro = NivelEscolaridad::findOne(['nivel_escolaridad'=> $nivelEscolaridad]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = NivelEscolaridad::findOne($id);
            $pro->delete();
        }
    }