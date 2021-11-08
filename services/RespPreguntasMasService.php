<?php
    
    
    namespace app\services;
    
    
    use app\models\db\RespPreguntasMas;

    class RespPreguntasMasService{
        static function create($respuesta){
            $found = self::get($respuesta);
            if (!isset($found)){
                $pro = new RespPreguntasMas();
                $pro->respuesta = $respuesta;
                $pro->save();
                return self::get($respuesta)['id'];
            }
            return $found['id'];
        }
    
        static function get($respuesta){
            $pro = RespPreguntasMas::findOne(['respuesta'=> $respuesta]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = RespPreguntasMas::findOne($id);
            $pro->delete();
        }
    }