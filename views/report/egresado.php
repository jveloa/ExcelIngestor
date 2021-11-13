

<?php

use app\models\db\Estudiante;
use app\models\db\egresadoDe;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;



?>



<?php
$form1 = ActiveForm::begin();

$egresadoData = app\models\db\EgresadoDe::find()->all();
$listaEgresado = \yii\helpers\BaseArrayHelper::map($egresadoData, 'id', 'lugar')

?>
<div class="p-2">
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
<div id="feedback">
    <?php if ($seleccionEgresado != "")
    {
        //echo $seleccionEgresado;
        $estudiante = Estudiante::find()->where(['id_egresado' => $seleccionEgresado])->orderBy("carne")->all();
        $cantEstudiante=Estudiante::find()->where(['id_egresado' => $seleccionEgresado])->count();
    }
    else
    { //echo "Es nulo";
        $estudiante=Estudiante::find()->orderBy("carne")->all();
        $cantEstudiante=Estudiante::find()->count();}?>
    <?php foreach($estudiante as $est) { ?>
        <div class="col"><?php echo $est->nombre?></div>


        <?php

    }  ?><hr>
    <div class="col-lg-offset-10 col-lg-11">
        Total de estudiantes <?php echo $cantEstudiante; ?>
    </div>

</div>





</html>