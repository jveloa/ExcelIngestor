<?php
    use app\models\db\Curso;
    use app\models\db\Deporte;
    use yii\helpers\BaseArrayHelper;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /* @var $this \yii\web\View */
    /* @var $model \app\models\DeportesForm */
    
    $listaCursos = Curso::find()->all();
    $listaCursos = BaseArrayHelper::map($listaCursos, 'id', 'curso');
    
    
    $listaDeportes = Deporte::find()->all();
    $listaDeportes = BaseArrayHelper::map($listaDeportes, 'id', 'deporte');
    
    $form1 = ActiveForm::begin();
?>
<div class="p-2 col-sm-12 col-md-12 col-xl-6">
    <?= $form1->field($model, 'idCurso')->dropdownList($listaCursos, [
        'prompt'  => 'Seleccione',
        'options' => [$model->idCurso => ['selected' => true]]
    ]); ?>
    
    <?= $form1->field($model, 'idDeporte')->dropdownList($listaDeportes, [
        'prompt'  => 'Seleccione',
        'options' => [$model->idDeporte => ['selected' => true]]
    ]);
    
    ?>
    
   


    <div class="form-group ">
        <?= Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php
        $form1 = ActiveForm::end();
    ?>
</div>

<div id="feedback">
    
    <div class="row ">
        <div class="col ">Estudiantes que lo practican :</div>
    </div>

    <div class="table table-striped">
        <table class="col-xl-6">
            <thead>
            <tr>
                <th scope="col">Nombre y Apellidos</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($model->getEstudiantes() as $est){ ?>
                    <tr>
                        <td>
                            <?php
                                echo $est->nombre
                            ?>
                        </td>
                    </tr>
                    <?php
                } ?>
            </tbody>
        </table>
    </div>

    <hr>
    <div class="col-lg-offset-10 col-lg-11">
        Total de estudiantes <?php
            echo $model->getCantEstudiantes(); ?>
    </div>

</div>


</html>

