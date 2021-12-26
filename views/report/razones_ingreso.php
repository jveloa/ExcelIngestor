<?php
    
    /* @var  $model \app\models\RazonesIngresoForm */
    
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    $form1 = ActiveForm::begin();
?>

<div class="p-2 col-sm-12 col-md-12 col-xl-6">
    
    <?= $form1->field($model, 'idCurso')->dropdownList($model->getCursos(),
                                                       ['prompt' => 'Seleccione',
                                                        'options' => [$model->idCurso => ['selected' => true]]]); ?>
    
    <div class="form-group ">
        <?= Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php
        $form1 = ActiveForm::end();
    ?>
</div>

<div id="feedback">
    <div class="row">
        <div class="col">Porcientos por razones de ingreso a la carrera :</div>
    </div>
    
    
    <div class="table-responsive table table-striped">
        <table class="col-xl-6 col-sm-12">
            <thead>
            <tr>
                <th scope="col">Porque me gusta</th>
                <th scope="col">Para tener un título universitario</th>
                <th scope="col">Por complacer a mis padres</th>
                <th scope="col">Para prepararme para el futuro</th>
                <th scope="col">Porque se asemeja a la carrera que me gusta</th>
                <th scope="col">Para ser alguien en la vida</th>
                <th scope="col">Otras razones</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
                $lista = $model->getProcientosRazones();
                for ($i = 1;$i < count($lista) + 1;$i++){ ?>
                    
                    <td> <?php echo round($lista[strval($i)], 2) . '%' ?> </td>
                
                <?php } ?>
            
            </tbody>
        </table>
    </div>
    <hr>
</div>

