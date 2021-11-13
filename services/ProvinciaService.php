<?php
    
    
    namespace app\services;
    
    use app\models\db\Provincia;
    
    class ProvinciaService{
        static function create($provinvia){
            if(!isset($provinvia)){
                $provinvia = "No respondío";
            }
            $found = self::get($provinvia);
            if(!isset($found)){
                $pro = new Provincia();
                $pro->nombre = $provinvia;
                $pro->save();
                return self::get($provinvia)['id'];
            }
            return $found['id'];
        }
        
        static function get($provincia){
            $pro = Provincia::findOne(['nombre' => $provincia]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
           
        }
        
        static function delete($id){
            $pro = Provincia::findOne($id);
            $pro->delete();
        }
    }