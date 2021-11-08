<?php
    
    
    namespace app\services;
    
    
    use app\models\db\DeporteArte;

    class DeporteArteService{
        static function create($deporteArte){
            $found = self::get($deporteArte);
            if (!isset($found)){
                $pro = new DeporteArte();
                $pro->deporte_arte = $deporteArte;
                $pro->save();
                return self::get($deporteArte)['id'];
            }
            return $found['id'];
        }
    
        static function get($deporteArte){
            $pro = DeporteArte::findOne(['deporte_arte'=> $deporteArte]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = DeporteArte::findOne($id);
            $pro->delete();
        }
    }