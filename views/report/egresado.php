

<?php
    /* @var $this \yii\web\View */
    /* @var $mymodel \app\models\ViaIngresoForm */
use app\models\db\Estudiante;
use app\models\db\egresadoDe;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;



?>



<?php
$form1 = ActiveForm::begin();

$egresadoData = app\models\db\EgresadoDe::find()->all();
$listaEgresado = \yii\helpers\BaseArrayHelper::map($egresadoData, 'id', 'lugar');
$cursoData = app\models\db\Curso::find()->all();
$listaCursos = \yii\helpers\BaseArrayHelper::map($cursoData, 'id', 'curso');
        $cantEstudiante=0;


?>

<div class="p-2" style="width: 300px " >
    <?= $form1->field($mymodel, 'cursoid')->dropdownList($listaCursos,
        ['prompt'=>'Seleccione',
        'options'=>[$seleccionCurso=>['selected'=>true]]]);
    ?>
</div>


<div class="p-2" style="width: 300px ">
    <?= $form1->field($mymodel, 'egresoid')->dropdownList($listaEgresado,[
            'prompt'=>'Seleccione',
            'options'=>[$seleccionEgresado=>['selected'=>true]]]);
    ?>
</div>

<div class="form-group ">
        <?=  Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
</div>
<?php $form1 = ActiveForm::end();?>



<div class="row">
    <div class="col">Estudiantes por lugar de egreso seleccionado :</div>
</div>

<div class="row">
    <div class="col">Nombre y apellidos</div>
</div>
<div id="feedback">
    <?php if ($seleccionEgresado != "" && $seleccionCurso != "")
    {
        //echo $seleccionEgresado;
        $estudiante = Estudiante::find()->where(['id_egresado' => $seleccionEgresado, 'id_curso' =>$seleccionCurso])->orderBy("carne")->all();
        $cantEstudiante=Estudiante::find()->where(['id_egresado' => $seleccionEgresado, 'id_curso' =>$seleccionCurso])->count();
     foreach($estudiante as $est) { ?>
    <div class="col"><?php echo $est->nombre?></div>


    <?php

    }  ?><hr>
    <?php }
    else if(($seleccionEgresado == "" && $seleccionCurso != "") || ($seleccionEgresado != "" && $seleccionCurso == "") )
    { //echo "Es nulo";
       echo '<script>alert("Debe seleccionar ambos campos")</script>';
        }?>

    <div class="col-lg-offset-10 col-lg-11">
        Total de estudiantes :<?php echo $cantEstudiante; ?>
    </div>

</div>





</html>