<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use yii\web\Controller;

use yii\web\UploadedFile;


class UploadController extends Controller
{

    public function actionExcel()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->archivo = UploadedFile::getInstance($model, 'archivo');
            $curso = $model->curso;
            if (!$model->upload()) {
                print "error";
            }
            $data = $model->readExcel();
            $model->deleteExcel();
            $model->inputExcelDB($data,$curso);
            
        }

        return $this->render('excel', ['file' => $model]);

    }
}


