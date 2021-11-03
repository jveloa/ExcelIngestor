<?php
    
    
    namespace app\services;
    
    
    use app\models\db\Convivencia;

    class ConvivenciaService{
        static function create($convivencia){
            $found = self::get($convivencia);
            if(!isset($found)){
                $pro = new Convivencia();
                $pro->convivencia = $convivencia;
                $pro->save();
                return self::get($convivencia)['id'];
            }
            return $found['id'];
        }
    
        static function get($convivencia){
            $pro = Convivencia::findOne(['convivencia'=> $convivencia]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
    
        }
    
        static function delete($id){
            $pro = Convivencia::findOne($id);
            $pro->delete();
        }
    }