<?php
    
    
    namespace app\services;
    
    
    use app\models\db\Deporte;

    class DeporteService{
        static function create($deporte){
            $found = self::get($deporte);
            if (!isset($found)){
                $pro = new Deporte();
                $pro->deporte = $deporte;
                $pro->save();
                return self::get($deporte)['id'];
            }
            return $found['id'];
        }
    
        static function get($deporte){
            $pro = Deporte::findOne(['deporte'=> $deporte]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = Deporte::findOne($id);
            $pro->delete();
        }
    }