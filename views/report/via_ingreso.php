<?php
    
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

<div class="p-2 col-sm-12 col-md-12 col-xl-6">
    <?= $form1->field($model, 'cursoid')->dropdownList($listaCursos,
        ['prompt'=>'Seleccione',
            'options'=>[$model->cursoid=>['selected'=>true]]]);
    ?>
    
    
    <?= $form1->field($model, 'idIngreso')->dropdownList($listaIngresos, [
        'prompt' => 'Seleccione', 'options' => [$model->idIngreso => ['selected' => true]]
    ]); ?>


    <div class="form-group ">
        <?= Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
    </div>
    
    <?php $form1 = ActiveForm::end(); ?>
</div>


<div id="feedback" >
    <div class="row">
        <div class="col">Estudiantes por vía de ingreso seleccionado :</div>
    </div>


    <div class="table-responsive table table-striped">
        <table class="col-xl-6">
            <thead>
            <tr>
                <th scope="col">Nombre y Apellidos</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach ($model->getEstudiantes() as $est){ ?>
                <tr>
                    <td><?php echo $est->nombre ?> </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="col-lg-offset-10 col-lg-11">
        Total de estudiantes <?php echo $model->getCantEstudiantes(); ?>
    </div>
</div>

</div>


</html>
