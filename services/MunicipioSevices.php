<?php
    
    
    namespace app\services;
    
    
    use app\models\db\Municipio;

    class MunicipioSevices{
        static function create($municipio,$id_provincia){
            $found = self::get($municipio);
            if(!isset($found)){
                $mun = new Municipio();
                $mun->nombre = $municipio;
                $mun->id_provincia = $id_provincia;
                $mun->save();
                return self::get($municipio)['id'];
            }
            return $found['id'];
        }
    
        static function get($municipio){
            $mun = Municipio::findOne(['nombre'=>$municipio]);
            if(isset($mun)){
                return $mun->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $mun = Municipio::findOne($id);
            $mun->delete();
        }
    }