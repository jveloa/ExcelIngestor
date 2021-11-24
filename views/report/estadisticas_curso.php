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

$cursoData = app\models\db\Curso::find()->all();
$listaCursos = \yii\helpers\BaseArrayHelper::map($cursoData, 'id', 'curso')

?>

<div class="row">
    <div class="col">Datos de ingreso por :</div>
</div>

<div class="p-2" style="width: 300px " >
    <?= $form1->field($mymodel, 'cursoid')->dropdownList($listaCursos,
        ['prompt'=>'Seleccione',
        'onchange'=>'this.form.submit()',
        'options'=>[$seleccionCurso=>['selected'=>true]]]);
    ?>
</div>


<?php $form1 = ActiveForm::end();?>


<?php if ($seleccionCurso > 0) {?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'id'=>'gv',

    'columns' => [
        'tipo',
        'máximo',
        'mínimo',
        'promedio',

    ],
]);}?>


