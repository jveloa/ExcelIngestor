<?php
    
    use app\models\db\Estudiante;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    
    /* @var $this \yii\web\View */
    /* @var $model \app\models\ViaIngresoForm */
    $ingresoData  = app\models\db\Ingreso::find()->all();
    $listaIngresos = \yii\helpers\BaseArrayHelper::map($ingresoData , 'id', 'via_ingreso');
    $cursoData = app\models\db\Curso::find()->all();
    $listaCursos = \yii\helpers\BaseArrayHelper::map($cursoData, 'id', 'curso');
    
    $form1 = ActiveForm::begin();
   
?>
<div class="p-2" style="width: 300px " >
    <?= $form1->field($model, 'cursoid')->dropdownList($listaCursos,
        ['prompt'=>'Seleccione',
            'options'=>[$model->cursoid=>['selected'=>true]]]);
    ?>
</div>
<div class="p-2" style="width: 300px ">
    <?= $form1->field($model, 'idIngreso')->dropdownList($listaIngresos, [
        'prompt'  => 'Seleccione',
        'options' => [$model->idIngreso => ['selected' => true]]
    ]); ?>
</div>

<div class="form-group ">
    <?= Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
</div>
<?php $form1 = ActiveForm::end(); ?>



<div class="row">
    <div class="col">Estudiantes por vía de ingreso seleccionado :</div>
</div>


<div class="row">
    <div class="col">Nombre y apellidos</div>
</div>
<div id="feedback">
    
    <?php foreach ($model->getEstudiantes() as $est){ ?>
        <div class="col"><?php echo $est->nombre ?></div>



    <?php } ?>
    <hr>
    <div class="col-lg-offset-10 col-lg-11">
        Total de estudiantes <?php echo $model->getCantEstudiantes(); ?>
    </div>

</div>





</html>
