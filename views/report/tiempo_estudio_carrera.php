<?php
    
    /* @var  $model \app\models\TiempoEstudioCarreraForm */
   
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
        <div class="col">Porcientos por tiempo desde que decidió estudiar la carrera :</div>
    </div>
    
    
    <div class="table-responsive table table-striped">
        <table class="col-xl-6 col-sm-12">
            <thead>
            <tr>
                <th scope="col">Desde Pequeño</th>
                <th scope="col">Hace más de 2 años</th>
                <th scope="col">Hace un año (aproximadamente)</th>
                <th scope="col">Desde que analicé las opciones posibles</th>
                <th scope="col">Desde que me la otorgaron</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
                $lista = $model->getPorcientosTiempoEstudio();
                for ($i = 1;$i < count($lista) + 1;$i++){ ?>
                    
                    <td> <?php echo round($lista[strval($i)], 2) . '%' ?> </td>
                
                <?php } ?>
            
            </tbody>
        </table>
    </div>
    <hr>
</div>

