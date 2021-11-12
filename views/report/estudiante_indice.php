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
    'label' => Yii::t('app', 'Indice academico >='),

        'onchange'=>'this.form.submit()']);
        ?>
</div>

<div class="col-3 ">

<?= $form1->field($mymodel,'indiceText')->textInput(['disabled' =>$seleccionEgresado[0]])->label(false)?>

</div>
</div>


<div class="col-12">
    <?= $form1->field($mymodel,'habilitarChk')->checkbox([
        'label' => Yii::t('app', 'Notas de examen de ingreso'),

        'onchange'=>'this.form.submit()']);
    ?>

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
<?php  echo "la variable es";   ?>
<?php  echo $seleccionEgresado[0];   ?>
<?php  echo "la variable es";   ?>
<?php  echo $seleccionEgresado[1];   ?>
<?php  echo "la variable es";   ?>
<?php  echo $seleccionEgresado[2];   ?>
<?php  echo "la variable es";   ?>
<?php  echo $seleccionEgresado[3];   ?>
<?php  echo "la variable es:\n";   ?>
<?php  echo $seleccionEgresado[4];   ?>
<?php
echo $sql;

?>
<?php
echo $condicion;

?>


