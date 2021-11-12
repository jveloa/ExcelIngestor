<?php
use app\models\db\Estudiante;
use app\models\db\egresadoDe;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use \yii\bootstrap4\ToggleButtonGroup;

?>


<?php
$form1 = ActiveForm::begin();
?>
<div class="row">
    <div class="col-3">
        <?= $form1->field($mymodel,'indiceChk')->checkbox([
            'label' => Yii::t('app', 'Indice academico '),

            'onchange'=>'this.form.submit()']);
        ?>
    </div>

</div>


<div class="row">
    <div class="col-3">
        <?= $form1->field($mymodel,'indiceChk')->checkbox([
            'label' => Yii::t('app', 'Notas de pruebas de ingreso'),

            'onchange'=>'this.form.submit()']);
        ?>
    </div>


</div>


<div class="form-group ">
    <?=  Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'id'=>'gv',

    'columns' => [
        'nombre',
        'Índice',
        'matemática',
        'español',
        'historia',

    ],
]);?>




<?php $form1 = ActiveForm::end();?>

