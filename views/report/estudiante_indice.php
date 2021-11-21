<?php
use app\models\db\Estudiante;
use app\models\db\egresadoDe;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use \yii\bootstrap4\ToggleButtonGroup;

?>

<div class="row">
    <div class="col">Estudiantes por índice y notas de ingreso :</div>
</div>

<?php
$form1 = ActiveForm::begin();

$cursoData = app\models\db\Curso::find()->all();
$listaCursos = \yii\helpers\BaseArrayHelper::map($cursoData, 'id', 'curso')

?>

<div class="p-2" style="width: 300px " >
    <?= $form1->field($mymodel, 'cursoid')->dropdownList($listaCursos,
        ['prompt'=>'Seleccione',
             'onchange'=>'this.form.submit()',
            'options'=>[$seleccionCurso=>['selected'=>true]]]);
    ?>
</div>

<div class="row">
<div class="col-3">
<?= $form1->field($mymodel,'indiceChk')->checkbox([
    'label' => Yii::t('app', 'Índice académico >='),
    'disabled'=>$seleccionEgresado[5],
        'onchange'=>'this.form.submit()']);
        ?>
</div>

<div class="col-3 ">

<?= $form1->field($mymodel,'indiceText')->textInput([
        'disabled' =>$seleccionEgresado[0]])->label(false)?>

</div>
</div>


<div class="col-12">
    <div class="row">
        <div>
    <?= $form1->field($mymodel,'habilitarChk')->checkbox([
        'label' => Yii::t('app', 'Notas de examen de ingreso'),
        'disabled'=>$seleccionEgresado[5],
        'onchange'=>'this.form.submit()']);
    ?>
        </div>
    </div>

<div class="row">
    <div class="col-3">
        <?= $form1->field($mymodel,'espanolChk')->checkbox([
            'label' => Yii::t('app', 'Nota de Español >='),
            'disabled'=>$seleccionEgresado[4],
            'onchange'=>'this.form.submit()']);
        ?>
    </div>

    <div class="col-3 ">

        <?= $form1->field($mymodel,'espanolText')->textInput(['disabled' =>$seleccionEgresado[1]])->label(false)?>

    </div>
</div>

<div class="row">
    <div class="col-3">
        <?= $form1->field($mymodel,'matematicaChk')->checkbox([
            'label' => Yii::t('app', 'Nota de Matemática >='),
            'disabled'=>$seleccionEgresado[4],
            'onchange'=>'this.form.submit()']);
        ?>
    </div>

    <div class="col-3 ">

        <?= $form1->field($mymodel,'matematicaText')->textInput(['disabled' =>$seleccionEgresado[2]])->label(false)?>

    </div>
</div>

<div class="row">
    <div class="col-3">
        <?= $form1->field($mymodel,'historiaChk')->checkbox([
            'label' => Yii::t('app', 'Nota de Historia >='),
            'disabled'=>$seleccionEgresado[4],
            'onchange'=>'this.form.submit()']);

        ?>
    </div>

    <div class="col-3 ">

        <?= $form1->field($mymodel,'historiaText')->textInput(['disabled' =>$seleccionEgresado[3]])->label(false)?>

    </div>
</div>
</div>



<div class="form-group ">
    <?=  Html::submitButton('Seleccionar', ['class' => 'btn btn-primary','disabled'=>$seleccionEgresado[5]]) ?>
</div>


<?php if (!$seleccionEgresado[5]) {?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'id'=>'gv',

    'columns' => [
        array(
            'label'=>'Nombre y apellidos',
            'attribute'=>'nombre',


        ),
        array(
            'label'=>'Índice académico',
            'attribute'=>'Índice',


        ),


        'matemática',
        'español',
        'historia',

    ],
]);}?>




<?php $form1 = ActiveForm::end();?>



