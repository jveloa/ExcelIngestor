<?php

namespace app\controllers;

use app\models\db\EgresadoDe;
use app\models\EgresadoNotasForm;
use app\models\EstudianteIndiceForm;
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
            return $this->render('egresado', ['seleccionEgresado' => $valorRespuesta, 'mymodel' => $model]);
        }


        return $this->render('egresado', ['seleccionEgresado' => "", 'mymodel' => $model]);

    }

    public function actionVia_ingreso()
    {
        $model = new ViaIngresoForm();
        if ($model->load(Yii::$app->request->post())) {
            return $this->render('via_ingreso', ['model' => $model]);
        }
        return $this->render('via_ingreso', ['model' => $model]);
    }

    public function actionEgresadonotas()
    {
        $model1 = new EgresadoNotasForm;


        if ($model1->load(Yii::$app->request->post())) {
            $valorRespuesta = $model1->egresoid;
            if ($valorRespuesta == "") {
                //Cuando no hay seleccion
                $sql = "SELECT 'Indice Academico' as Tipo, Max(indice_academico) as Maximo, Min(indice_academico) as Minimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matematica' as Tipo, Max(nota_matematica) as Maximo, Min(nota_matematica) as Minimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Espanol' as Tipo, Max(nota_espannol) as Maximo, Min(nota_espannol) as Minimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Maximo, Min(nota_historia) as Minimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,

                ]);
            } else {
                //condicion si hay seleccion
                $sql = "SELECT 'Indice Academico' as Tipo, Max(indice_academico) as Maximo, Min(indice_academico) as Minimo, round(Avg(indice_academico),2) as Promedio FROM estudiante where id_egresado=:id_egresado union SELECT 'Matematica' as Tipo, Max(nota_matematica) as Maximo, Min(nota_matematica) as Minimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante where id_egresado=:id_egresado union SELECT 'Espanol' as Tipo, Max(nota_espannol) as Maximo, Min(nota_espannol) as Minimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante where id_egresado=:id_egresado union SELECT 'Historia' as Tipo, Max(nota_historia) as Maximo, Min(nota_historia) as Minimo, round(Avg(nota_historia),2) as Promedio FROM estudiante where id_egresado=:id_egresado";


                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,
                    'params' => [':id_egresado' => $valorRespuesta],

                ]);
            }

            return $this->render('egresadonotas', ['seleccionEgresado' => $valorRespuesta, 'dataProvider' => $dataProvider, 'mymodel' => $model1]);
        }
        $sql = "SELECT 'Indice Academico' as Tipo, Max(indice_academico) as Maximo, Min(indice_academico) as Minimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matematica' as Tipo, Max(nota_matematica) as Maximo, Min(nota_matematica) as Minimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Espanol' as Tipo, Max(nota_espannol) as Maximo, Min(nota_espannol) as Minimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Maximo, Min(nota_historia) as Minimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,

        ]);
        return $this->render('egresadonotas', ['seleccionEgresado' => '', 'dataProvider' => $dataProvider, 'mymodel' => $model1]);
//cuando no hay variable de post
    }

    public function actionEstudiante_indice()
    {
        $valorRespuesta;
        $condicion;
        $model = new EstudianteIndiceForm;

        if ($model->load(Yii::$app->request->post())) {
            //$valorRespuesta = $model->indiceChk;
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
                $model->indiceText="";
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
            $condicion="";
            $sql="SELECT nombre AS Nombre,indice_academico AS Índice,nota_matematica AS Matemática,nota_espannol AS Español,nota_historia AS Historia FROM estudiante";

            if($model->indiceText!='')
                $condicion = " where indice_academico >= ".$model->indiceText;


                if ( $model->matematicaText!=''){
                    if (!(strpos($condicion,'where'>0)))
                        $condicion = " where nota_matematica >= ".$model->matematicaText;
                    else
                        $condicion= $condicion. "and nota_matematica >=".$model->matematicaText;

                }
                if ($model->espanolText!=''){
                    $condicion="";
                    if (!(strpos($condicion,'where'>0)))
                        $condicion = " where nota_espannol >= ".$model->espanolText;
                    else
                        $condicion= $condicion. "and nota_espannol >=".$model->espanolText;

                }
                if ($model->historiaText!=''){
                    $condicion="";
                    if (!(strpos($condicion,'where'>0)))
                        $condicion = " where nota_espannol >= ".$model->historiaText;
                    else
                        $condicion= $condicion. "and nota_espannol >=".$model->historiaText;

                }






            $sql=$sql.$condicion;



            $dataProvider = new SqlDataProvider([
                'sql' => $sql,

            ]);


            return $this->render('estudiante_indice', ['condicion'=>$condicion,'sql'=>$sql,'dataProvider' => $dataProvider,'seleccionEgresado' => $valorRespuesta, 'mymodel' => $model]);
        }
        $condicion="";
        $valorRespuesta[]=true;
        $valorRespuesta[]=true;
        $valorRespuesta[]=true;
        $valorRespuesta[]=true;
        $valorRespuesta[]=true;

        $sql="SELECT nombre AS Nombre,indice_academico AS Índice,nota_matematica AS Matemática,nota_espannol AS Español,nota_historia AS Historia FROM estudiante";


        $dataProvider = new SqlDataProvider([
            'sql' => $sql,

        ]);
        return $this->render('estudiante_indice', ['condicion'=>$condicion,'sql'=>$sql,'dataProvider' => $dataProvider,'seleccionEgresado' =>$valorRespuesta, 'mymodel' => $model]);

    }
    public function actionEstudiantes_notas_indice(){


        //$valorRespuesta;
        $condicion;
        $model = new EstudiantesNotasIndiceForm();

        if ($model->load(Yii::$app->request->post())) {
            $condicion="";
            $sql="SELECT nombre AS Nombre ";


            if($model->indiceChk!=1)
                $condicion = " ,indice_academico AS Índice FROM estudiante";
            if ($model->notasChk!=1)
               $condicion = " ,nota_matematica AS Matemática,nota_espannol AS Español,nota_historia AS Historia FROM estudiante ";

            $sql=$sql.$condicion;



            $dataProvider = new SqlDataProvider([
                'sql' => $sql,

            ]);
            return $this->render('estudiantes_notas_indice', [
                'dataProvider' => $dataProvider,
                //'seleccionEgresado' =>$valorRespuesta,
                'mymodel' => $model
            ]);






        }
        $sql="SELECT nombre AS Nombre,indice_academico AS Índice,nota_matematica AS Matemática,nota_espannol AS Español,nota_historia AS Historia FROM estudiante";


        $dataProvider = new SqlDataProvider([
            'sql' => $sql,

        ]);

        return $this->render('estudiantes_notas_indice', [
            'dataProvider' => $dataProvider,
            //'seleccionEgresado' =>$valorRespuesta,
            'mymodel' => $model
        ]);


    }

}
