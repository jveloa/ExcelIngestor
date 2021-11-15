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
    <div class="col">Listado de estudiantes por :</div>
</div>
<?php
$form1 = ActiveForm::begin();
$cursoData = app\models\db\Curso::find()->all();
$listaCursos = \yii\helpers\BaseArrayHelper::map($cursoData, 'id', 'curso')
?>
<div class="p-2" style="width: 300px " >
    <?= $form1->field($mymodel, 'cursoid')->dropdownList($listaCursos,
        ['prompt'=>'Seleccione',
            'options'=>[$seleccionCurso=>['selected'=>true]]]);
    ?>
</div>
<div class="row">
    <div class="col-3">
        <?= $form1->field($mymodel,'indiceChk')->checkbox([
            'label' => Yii::t('app', 'Índice académico '),

            'onchange'=>'this.form.submit()']);
        ?>
    </div>

</div>


<div class="row">
    <div class="col-3">
        <?= $form1->field($mymodel,'notasChk')->checkbox([
            'label' => Yii::t('app', 'Notas de pruebas de ingreso'),

            'onchange'=>'this.form.submit()']);

        ?>
    </div>


</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'pager'=>[
            'firstPageLabel'=>'Primera',
            'lastPageLabel'=>'Última'
],
    'id'=>'gv',

    'columns' => [
        'nombre',
        array(
                'label'=>'Índice',
                'attribute'=>'Índice',
                'visible'=>$mymodel->indiceChk,

        ),
        array(
            'label'=>'Matemática',
            'attribute'=>'matemática',
            'visible'=> $mymodel->notasChk,

        ),
        array(
            'label'=>'Español',
            'attribute'=>'español',
            'visible'=> $mymodel->notasChk,

        ),
        array(
            'label'=>'Historia',
            'attribute'=>'historia',
            'visible'=> $mymodel->notasChk,

        ),


    ],
]);?>




<?php $form1 = ActiveForm::end();?>

