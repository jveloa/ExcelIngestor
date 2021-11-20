<?php
    /* @var $this yii\web\View */
    /* @var $model \app\models\UploadForm */
    
    
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    
    
    $model = new app\models\UploadForm();
    
    $form = ActiveForm::begin([
        'id' => 'upload',
        'options' => ['enctype' => 'multipart/form-data'],
    ])
?>

<div class="form-group flex-column col-xl-6 ">
    <div class="">
        <?= $form->field($model, 'curso')->textInput() ?>
        <?= $form->field($model, 'archivo',)->fileInput() ?>
        <?= Html::submitButton('Enviar', [
            'class' => 'btn btn-primary',
            'name'  => 'send-button'
        ]) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

<div>

</div>



