<?php

namespace app\controllers;

use app\models\db\EgresadoDe;
use app\models\UploadForm;

use app\models\ViaIngresoForm;
use Yii;
use yii\web\Controller;
use yii\filters\AccessController;
use yii\web\UploadedFile;
use app\models\EgresadoForm;
use app\models\EgresadoNotasForm;
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
    
    public function  actionIngreso(){
        $model = new ViaIngresoForm();
        if($model->load(Yii::$app->request->post())){
            return this.$this->render('viaIngreso',['model' => $model]);
        }
        return $this->render('viaIngreso',['model'=> $model]);
    }






}
