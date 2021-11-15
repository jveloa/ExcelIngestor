<?php

namespace app\controllers;

use app\models\db\EgresadoDe;
use app\models\EgresadoNotasForm;
use app\models\EstadisticasCursoForm;
use app\models\EstudianteIndiceForm;
use app\models\EstudiantesCursoIndiceNotasForm;
use app\models\EstudiantesNotasIndiceForm;
use app\models\UploadForm;

use app\models\ViaIngresoForm;
use Yii;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\filters\AccessController;
use yii\web\UploadedFile;
use app\models\EgresadoForm;

use app\models\EgresadoDeSearch;

class ReportController extends Controller
{

    public function actionEgresado()
    {
        $model = new EgresadoForm;


        if ($model->load(Yii::$app->request->post())) {
            $valorRespuesta = $model->egresoid;
            $valorCurso= $model->cursoid;
            return $this->render('egresado',
                    ['seleccionCurso' => $valorCurso,
                    'seleccionEgresado' => $valorRespuesta,
                    'mymodel' => $model,
                    ]);
        }


        return $this->render('egresado',
                 ['seleccionCurso' =>"",
                'seleccionEgresado' => "",
                'mymodel' => $model,
                ]);

    }

    public function actionVia_ingreso()
    {
        $model = new ViaIngresoForm();
        if ($model->load(Yii::$app->request->post())) {
            $valorCurso= $model->cursoid;
            return $this->render('via_ingreso', ['seleccionCurso' => $valorCurso,'model' => $model]);
        }
        return $this->render('via_ingreso', ['seleccionCurso' => "",'model' => $model]);
    }

    public function actionEgresadonotas()
    {
        $model1 = new EgresadoNotasForm;



        if ($model1->load(Yii::$app->request->post())) {
            $valorRespuesta = $model1->egresoid;
            $valorCurso= $model1->cursoid;

            if ($valorRespuesta == "") {
                //Cuando no hay seleccion
                $sql = "SELECT 'Índice Académico' as Tipo, Max(indice_academico) as Máximo, Min(indice_academico) as Mínimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matemática' as Tipo, Max(nota_matematica) as Máximo, Min(nota_matematica) as Mínimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Español' as Tipo, Max(nota_espannol) as Máximo, Min(nota_espannol) as Mínimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Máximo, Min(nota_historia) as Mínimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,

                ]);
            } else {
                //condicion si hay seleccion
                $sql = "SELECT 'Índice Académico' as Tipo, Max(indice_academico) as Máximo, Min(indice_academico) as Mínimo, round(Avg(indice_academico),2) as Promedio FROM estudiante where id_egresado=:id_egresado and id_curso=:cursoid union SELECT 'Matemática' as Tipo, Max(nota_matematica) as Máximo, Min(nota_matematica) as Mínimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante where id_egresado=:id_egresado and id_curso=:cursoid union SELECT 'Español' as Tipo, Max(nota_espannol) as Máximo, Min(nota_espannol) as Mínimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante where id_egresado=:id_egresado and id_curso=:cursoid union SELECT 'Historia' as Tipo, Max(nota_historia) as Máximo, Min(nota_historia) as Mínimo, round(Avg(nota_historia),2) as Promedio FROM estudiante where id_egresado=:id_egresado and id_curso=:cursoid";


                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,
                    'params' => [':id_egresado' => $valorRespuesta,
                                 ':cursoid' => $valorCurso ],

                ]);
            }

            return $this->render('egresadonotas',
                ['seleccionCurso' =>$valorCurso,
                    'seleccionEgresado' => $valorRespuesta,
                    'dataProvider' => $dataProvider,
                    'mymodel' => $model1]);
        }
        $sql = "SELECT 'Índice Académico' as Tipo, Max(indice_academico) as Máximo, Min(indice_academico) as Mínimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matemática' as Tipo, Max(nota_matematica) as Máximo, Min(nota_matematica) as Mínimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Español' as Tipo, Max(nota_espannol) as Máximo, Min(nota_espannol) as Mínimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Máximo, Min(nota_historia) as Mínimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,

        ]);
        return $this->render('egresadonotas',
            ['seleccionCurso' =>"",
                'seleccionEgresado' => '',
                'dataProvider' => $dataProvider,
                'mymodel' => $model1]);
//cuando no hay variable de post
    }

    public function actionEstudiante_indice()
    {
        $valorRespuesta;

        $model = new EstudianteIndiceForm;

        if ($model->load(Yii::$app->request->post())) {
            //$valorRespuesta = $model->indiceChk;
            $valorCurso= $model->cursoid;
            if($model->indiceChk!=1)
                $valorRespuesta[]=true;
            else
                $valorRespuesta[]=false;

            if($model->habilitarChk!=1)
            {
                $valorRespuesta[]=true;
                $valorRespuesta[]=true;
                $valorRespuesta[]=true;
                $valorRespuesta[]=true;
               // $model->indiceText="";
                $model->espanolText="";
                $model->matematicaText="";
                $model->historiaText="";
                $model->espanolChk='';
                $model->matematicaChk='';
                $model->historiaChk='';

            }else
            {


                if($model->espanolChk!=1){
                    $valorRespuesta[]=true;
                    $model->espanolText="";
                }
                else
                $valorRespuesta[]=false;

                if($model->matematicaChk!=1){
                    $valorRespuesta[]=true;
                    $model->matematicaText="";
                }
                else
                $valorRespuesta[]=false;

                if($model->historiaChk!=1){
                    $valorRespuesta[]=true;
                    $model->historiaText="";
                }
                else
                $valorRespuesta[]=false;

            $valorRespuesta[]=false;

            }

            $sql="SELECT nombre AS Nombre,indice_academico AS Índice,nota_matematica AS Matemática,nota_espannol AS Español,nota_historia AS Historia FROM estudiante";

            if($model->indiceText!='')
                $sql = $sql." where indice_academico >= ".$model->indiceText;


                if ( $model->matematicaText!=''){
                    if (!(strpos($sql,'where')))
                        $sql = $sql." where nota_matematica >= ".$model->matematicaText;
                    else
                        $sql= $sql." and nota_matematica >=".$model->matematicaText;

                }
                if ($model->espanolText!=''){

                    if (!(strpos($sql,'where')))
                        $sql = $sql." where nota_espannol >= ".$model->espanolText;
                    else
                        $sql= $sql." and nota_espannol >=".$model->espanolText;

                }
                if ($model->historiaText!=''){

                    if (!(strpos($sql,'where')))
                        $sql = $sql." where nota_historia >= ".$model->historiaText;
                    else
                        $sql= $sql." and nota_historia >=".$model->historiaText;

                }


            $dataProvider = new SqlDataProvider([
                'sql' => $sql,

            ]);


            return $this->render('estudiante_indice',
                ['sql'=>$sql,
                    'seleccionCurso' =>"",
                    'dataProvider' => $dataProvider,
                    'seleccionEgresado' => $valorRespuesta,
                    'mymodel' => $model]);
        }

        $valorRespuesta[]=true;
        $valorRespuesta[]=true;
        $valorRespuesta[]=true;
        $valorRespuesta[]=true;
        $valorRespuesta[]=true;

        $sql="SELECT nombre AS Nombre,indice_academico AS Índice,nota_matematica AS Matemática,nota_espannol AS Español,nota_historia AS Historia FROM estudiante";


        $dataProvider = new SqlDataProvider([
            'sql' => $sql,

        ]);
        return $this->render('estudiante_indice',
            ['sql'=>$sql,
                'seleccionCurso' =>"",
                'dataProvider' => $dataProvider,
                'seleccionEgresado' =>$valorRespuesta,
                'mymodel' => $model]);

    }
    public function actionEstudiantes_notas_indice(){
        $model = new EstudiantesNotasIndiceForm();

        if ($model->load(Yii::$app->request->post())) {
            $valorCurso= $model->cursoid;
            $sql="SELECT nombre AS Nombre";

            if($model->indiceChk==1)
                $sql= $sql." ,indice_academico AS Índice";
            if ($model->notasChk==1)
                $sql=$sql." ,nota_matematica AS matemática,nota_espannol AS Español,nota_historia AS Historia";

            $sql= $sql." FROM estudiante";





            $dataProvider = new SqlDataProvider([
                'sql' => $sql,

            ]);
            return $this->render('estudiantes_notas_indice', [
                'seleccionCurso' =>"",
                'dataProvider' => $dataProvider,
                'mymodel' => $model
            ]);

        }
        $sql="SELECT nombre AS Nombre,indice_academico AS Índice,nota_matematica AS Matemática,nota_espannol AS Español,nota_historia AS Historia FROM estudiante";
        $model->indiceChk=1;
        $model->notasChk=1;


        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'pagination'=>array('pageSize'=>10),

        ]);

        return $this->render('estudiantes_notas_indice', [
            'dataProvider' => $dataProvider,
            'seleccionCurso' =>"",
            'mymodel' => $model
        ]);


    }

    public function actionEstadisticas_curso()
    {
        $model1 = new EstadisticasCursoForm();


        if ($model1->load(Yii::$app->request->post())) {
            $valorRespuesta = $model1->cursoid;
            if ($valorRespuesta == "") {
                //Cuando no hay seleccion
                $sql = "SELECT 'Índice Académico' as Tipo, Max(indice_academico) as Máximo, Min(indice_academico) as Mínimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matemática' as Tipo, Max(nota_matematica) as Máximo, Min(nota_matematica) as Mínimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Español' as Tipo, Max(nota_espannol) as Máximo, Min(nota_espannol) as Mínimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Máximo, Min(nota_historia) as Mínimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,

                ]);
            } else {
                //condicion si hay seleccion
                $sql = "SELECT 'Índice Académico' as Tipo, Max(indice_academico) as Máximo, Min(indice_academico) as Mínimo, round(Avg(indice_academico),2) as Promedio FROM estudiante where id_curso=:cursoid union SELECT 'Matemática' as Tipo, Max(nota_matematica) as Máximo, Min(nota_matematica) as Mínimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante where id_curso=:cursoid union SELECT 'Español' as Tipo, Max(nota_espannol) as Máximo, Min(nota_espannol) as Mínimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante where id_curso=:cursoid union SELECT 'Historia' as Tipo, Max(nota_historia) as Máximo, Min(nota_historia) as Mínimo, round(Avg(nota_historia),2) as Promedio FROM estudiante where id_curso=:cursoid";


                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,
                    'params' => [':cursoid' => $valorRespuesta],

                ]);
            }

            return $this->render('estadisticas_curso',
                ['seleccionEgresado' => $valorRespuesta,
                    'dataProvider' => $dataProvider,
                    'mymodel' => $model1]);
        }
        $sql = "SELECT 'Índice Académico' as Tipo, Max(indice_academico) as Máximo, Min(indice_academico) as Mínimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matemática' as Tipo, Max(nota_matematica) as Máximo, Min(nota_matematica) as Mínimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Español' as Tipo, Max(nota_espannol) as Máximo, Min(nota_espannol) as Mínimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Máximo, Min(nota_historia) as Mínimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,

        ]);
        return $this->render('estadisticas_curso',
            ['seleccionEgresado' => '',
                'dataProvider' => $dataProvider,
                'mymodel' => $model1]);
//cuando no hay variable de post
    }



}
