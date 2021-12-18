<?php

/* @var  $model \app\models\FactoresCarreraForm */

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
        <div class="col">Porcientos por factores que influyeron en la selección de la carrera :</div>
    </div>


    <div class="table-responsive table table-striped">
        <table class="col-xl-6 col-sm-12">
            <thead>
            <tr>
                <th scope="col">Mi familia me lo sugirio</th>
                <th scope="col">Mi familia</th>
                <th scope="col">Mis amigos</th>
                <th scope="col">Mi desición personal</th>
                <th scope="col">Mis profesores de enseñansa media</th>
                <th scope="col">Mi vocación</th>
                <th scope="col">Influencia de campañas divulgativas</th>
                <th scope="col">Por seguir con mis amigos</th>
                <th scope="col">Porque no tenia oportunidad de escoger la carrera de prefiero</th>
                <th scope="col">Otros</th>
            </tr>
            </thead>

            <tbody>


            <?php $lista = $model->getPorcientosFactores();
            if (isset($lista)) {
                ?>

                <td>  <?php echo round($lista['1'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['2'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['3'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['4'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['5'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['6'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['7'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['8'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['9'] ,2) . '%'?>  </td>
                <td>  <?php echo round($lista['10'],2) . '%'?>  </td>


            <?php } ?>
            </tbody>

        </table>
    </div>
    <hr>
</div>
