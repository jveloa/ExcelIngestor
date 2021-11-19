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
$listaCurso = \yii\helpers\BaseArrayHelper::map($cursoData, 'id', 'curso')

?>

<div class="row">
    <div class="col">Estudiantes por curso sin computadora</div>
</div>

<div class="p-2" style="width: 300px " >
    <?= $form1->field($mymodel, 'cursoid')->dropdownList($listaCurso,
        ['prompt'=>'Seleccione',
        'options'=>[$seleccionEgresado=>['selected'=>true]]]);
    ?>
</div>

<div class="form-group ">
    <?=  Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
</div>
<?php $form1 = ActiveForm::end();?>



<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'id'=>'gv',

    'columns' => [

        array(
            'label'=>'Nombre y apellidos',
            'attribute'=>'nombre',


        ),


    ],
]);?>



