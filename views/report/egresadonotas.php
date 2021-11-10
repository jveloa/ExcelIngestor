<?php
use app\models\db\Estudiante;
use app\models\db\egresadoDe;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

?>
<?php
$form1 = ActiveForm::begin();

$egresadoData = app\models\db\EgresadoDe::find()->all();
$listaEgresado = \yii\helpers\BaseArrayHelper::map($egresadoData, 'id', 'lugar')

?>
<div class="p-2" style="width: 300px " >
    <?= $form1->field($mymodel, 'egresoid')->dropdownList($listaEgresado,['prompt'=>'Seleccione','options'=>[$seleccionEgresado=>['selected'=>true]]]);
    ?>
</div>

<div class="form-group ">
    <?=  Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
</div>
<?php $form1 = ActiveForm::end();?>

<div class="row">
    <div class="col">  Datos de ingreso por lugar de egreso seleccionado:</div>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
     'id'=>'gv',

    'columns' => [
        'tipo',
        'maximo',
        'minimo',
        'promedio',

    ],
]);?>

