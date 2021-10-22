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
            $model->file = UploadedFile::getInstance($model, 'file');
            if (!$model->upload()) {
                print "error";
            }
            $model->readExcel();
            $model->deleteExcel();
        }

        return $this->render('excel', ['file' => $model]);

    }
}


