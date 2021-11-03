<?php
    
    
    namespace app\services;
    
    
    use app\models\db\SectorOcupacional;

    class SectorOcupacionalService{
        static function create($sectorOcupacional){
            $found = self::get($sectorOcupacional);
            if(!isset($found)){
                $pro = new SectorOcupacional();
                $pro->sector_ocupacional = $sectorOcupacional;
                $pro->save();
                return self::get($sectorOcupacional)['id'];
            }
            return $found['id'];
        }
    
        static function get($sectorOcupacional){
            $pro = SectorOcupacional::findOne(['sector_ocupacional'=> $sectorOcupacional]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = SectorOcupacional::findOne($id);
            $pro->delete();
        }
    }