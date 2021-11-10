<?php

namespace app\controllers;

use app\models\db\EgresadoDe;
use app\models\EgresadoNotasForm;
use app\models\UploadForm;

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

        if ($model->load(Yii::$app->request->post())){
            $valorRespuesta = $model->egresoid;
            return $this->render('egresado', ['seleccionEgresado'=>$valorRespuesta, 'mymodel'=> $model]);
        }


        return $this->render('egresado', ['seleccionEgresado'=>"", 'mymodel'=> $model]);

    }

    public function actionEgresadonotas()
    {
        $model1 = new EgresadoNotasForm;


        if ($model1->load(Yii::$app->request->post())){
            $valorRespuesta = $model1->egresoid;
            if ($valorRespuesta == "")
            {
                //Cuando no hay seleccion
                $sql = "SELECT 'Indice Academico' as Tipo, Max(indice_academico) as Maximo, Min(indice_academico) as Minimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matematica' as Tipo, Max(nota_matematica) as Maximo, Min(nota_matematica) as Minimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Espanol' as Tipo, Max(nota_espannol) as Maximo, Min(nota_espannol) as Minimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Maximo, Min(nota_historia) as Minimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,

                ]);
            }
            else{
                //condicion si hay seleccion
                $sql = "SELECT 'Indice Academico' as Tipo, Max(indice_academico) as Maximo, Min(indice_academico) as Minimo, round(Avg(indice_academico),2) as Promedio FROM estudiante where id_egresado=:id_egresado union SELECT 'Matematica' as Tipo, Max(nota_matematica) as Maximo, Min(nota_matematica) as Minimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante where id_egresado=:id_egresado union SELECT 'Espanol' as Tipo, Max(nota_espannol) as Maximo, Min(nota_espannol) as Minimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante where id_egresado=:id_egresado union SELECT 'Historia' as Tipo, Max(nota_historia) as Maximo, Min(nota_historia) as Minimo, round(Avg(nota_historia),2) as Promedio FROM estudiante where id_egresado=:id_egresado";


                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,
                    'params' => [':id_egresado' => $valorRespuesta],

                ]);
            }

            return $this->render('egresadonotas', ['seleccionEgresado'=>$valorRespuesta, 'dataProvider'=> $dataProvider, 'mymodel'=> $model1]);
        }
        $sql = "SELECT 'Indice Academico' as Tipo, Max(indice_academico) as Maximo, Min(indice_academico) as Minimo, round(Avg(indice_academico),2) as Promedio FROM estudiante union SELECT 'Matematica' as Tipo, Max(nota_matematica) as Maximo, Min(nota_matematica) as Minimo, round(Avg(nota_matematica),2) as Promedio FROM estudiante union SELECT 'Espanol' as Tipo, Max(nota_espannol) as Maximo, Min(nota_espannol) as Minimo, round(Avg(nota_espannol),2) as Promedio FROM estudiante union SELECT 'Historia' as Tipo, Max(nota_historia) as Maximo, Min(nota_historia) as Minimo, round(Avg(nota_historia),2) as Promedio FROM estudiante";

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,

        ]);
        return $this->render('egresadonotas', ['seleccionEgresado'=>'','dataProvider'=> $dataProvider, 'mymodel'=> $model1]);
//cuando no hay variable de post
    }






}
