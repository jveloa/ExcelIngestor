<?php
    
    
    namespace app\services;
    
    
    use app\models\db\Arte;

    class ArteService{
        static function create($arte){
            $found = self::get($arte);
            if (!isset($found)){
                $pro = new Arte();
                $pro->arte = $arte;
                $pro->save();
                return self::get($arte)['id'];
            }
            return $found['id'];
        }
    
        static function get($arte){
            $pro = Arte::findOne(['arte'=> $arte]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = Arte::findOne($id);
            $pro->delete();
        }
    }