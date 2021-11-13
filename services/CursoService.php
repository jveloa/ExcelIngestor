<?php
    
    
    namespace app\services;
    
    
    use app\models\db\Curso;

    class CursoService{
        static function create($curso){
            $found = self::get($curso);
            if (!isset($found)){
                $pro = new Curso();
                $pro->curso = $curso;
                $pro->save();
                return self::get($curso)['id'];
            }
            return $found['id'];
        }
    
        static function get($curso){
            $pro = Curso::findOne(['curso'=> $curso]);
            if(isset($pro)){
                return $pro->getAttributes();
            }else return null;
        }
    
        static function delete($id){
            $pro = Curso::findOne($id);
            $pro->delete();
        }
    }