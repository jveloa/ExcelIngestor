<?php
    
    
    namespace app\services;
    use app\models\db\Ingreso;

    class IngresoService{
        static function create($ingreso){
            if(!isset($ingreso)){
                $ingreso = "No respondío";
            }
            $found = self::get($ingreso);
            if (!isset($found)){
                $pro = new Ingreso();
                $pro->via_ingreso = $ingreso;
                $pro->save();
                return self::get($ingreso)['id'];
            }
            return $found['id'];
        }
        
        static function get($ingreso){
            $pro = Ingreso::findOne(['via_ingreso'=> $ingreso]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
        
        static function delete($id){
            $pro = Ingreso::findOne($id);
            $pro->delete();
        }
    }