<?php
    
    /* @var  $model \app\models\OpcionesDeCarreraForm */
    
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
        <div class="col">Porcientos por opción de selección de carrera :</div>
    </div>


    <div class="table-responsive table table-striped">
        <table class="col-xl-6 col-sm-12">
            <thead>
            <tr>
                <th scope="col">Opción 1</th>
                <th scope="col">Opción 2</th>
                <th scope="col">Opción 3</th>
                <th scope="col">Opción 4</th>
                <th scope="col">Opción 5</th>
                <th scope="col">Opción 6</th>
                <th scope="col">Opción 7</th>
                <th scope="col">Opción 8</th>
                <th scope="col">Opción 9</th>
                <th scope="col">Opción 10</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
                $lista = $model->getPorcientosOpciones();
                for ($i = 1;$i < count($lista) + 1;$i++){ ?>

                    <td> <?php echo round($lista[strval($i)], 2) . '%' ?> </td>
                
                <?php } ?>

            </tbody>
        </table>
    </div>
    <hr>
</div>
