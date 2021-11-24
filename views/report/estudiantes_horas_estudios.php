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
    <div class="col">Por ciento de horas dedicadas al estudio por :</div>
</div>

<div class="p-2" style="width: 300px " >
    <?= $form1->field($mymodel, 'cursoid')->dropdownList($listaCurso,
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

        array(
            'label'=>'Horas semanales dedicadas al estudio',
            'attribute'=>'tipo',

        ),

        array(
            'label'=>'%',
            'attribute'=>'ciento',

        ),



    ],
]);}?>





