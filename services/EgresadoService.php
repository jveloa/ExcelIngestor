<?php
    
    
    namespace app\services;
    
    
    use app\models\db\EgresadoDe;

    class EgresadoService{
        static function create($egresado){
            $found = self::get($egresado);
            if(!isset($found)){
                $pro = new EgresadoDe();
                $pro->lugar = $egresado;
                $pro->save();
                return self::get($egresado)['id'];
            }
            return $found['id'];
        }
    
        static function get($egresado){
            $pro = EgresadoDe::findOne(['lugar' => $egresado]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
    
        }
    
        static function delete($id){
            $pro = EgresadoDe::findOne($id);
            $pro->delete();
        }
    }