<?php


use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;


$model = new app\models\UploadForm();

$form = ActiveForm::begin([
    'id' => 'upload',
    'options' => ['enctype' => 'multipart/form-data'],

])
?>

<div class="form-group ">
    <div class="p-2">
        <?= $form->field($model, 'file')->fileInput() ?>
    </div>

    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'send-button']) ?>
</div>
<?php ActiveForm::end() ?>

<div>

</div>



