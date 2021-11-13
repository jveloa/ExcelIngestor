<?php
    
    
    namespace app\services;
    
    
    use app\models\db\DatoMilitar;

    class DatoMilitarService{
        static function create($datoMilitar){
            if(!isset($datoMilitar)){
                $datoMilitar = "No respondío";
            }
            $found = self::get($datoMilitar);
            if (!isset($found)){
                $pro = new DatoMilitar();
                $pro->situacion_militar = $datoMilitar;
                $pro->save();
                return self::get($datoMilitar)['id'];
            }
            return $found['id'];
        }
    
        static function get($datoMilitar){
            $pro = DatoMilitar::findOne(['situacion_militar' => $datoMilitar]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
    
        }
    
        static function delete($id){
            $pro = DatoMilitar::findOne($id);
            $pro->delete();
        }
    }