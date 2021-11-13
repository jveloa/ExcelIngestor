<?php
    
    
    namespace app\services;
    
    
    use app\models\db\EstadoCivil;

    class EstadoCivilService{
        static function create($estado){
            if(!isset($estado)){
                $estado = "No respondío";
            }
            $found = self::get($estado);
            if(!isset($found)){
                $pro = new EstadoCivil();
                $pro->estado = $estado;
                $pro->save();
                return self::get($estado)['id'];
            }
            return $found['id'];
        }
    
        static function get($estado){
            $pro = EstadoCivil::findOne(['estado'=> $estado]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = EstadoCivil::findOne($id);
            $pro->delete();
        }
    }