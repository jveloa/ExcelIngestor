<?php
    
    
    namespace app\services;
    
    
    use app\models\db\IntegracionPolitica;

    class IntegracionPoliticaService{
        static function create($integracionPolitica){
            if(!isset($integracionPolitica)){
                $integracionPolitica = "No respondío";
            }
            $found = self::get($integracionPolitica);
            if(!isset($found)){
                $pro = new IntegracionPolitica();
                $pro->integracion = $integracionPolitica;
                $pro->save();
                return self::get($integracionPolitica)['id'];
            }
            return $found['id'];
        }
    
        static function get($integracionPolitica){
            $pro = IntegracionPolitica::findOne(['integracion'=> $integracionPolitica]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = IntegracionPolitica::findOne($id);
            $pro->delete();
        }
        
    }