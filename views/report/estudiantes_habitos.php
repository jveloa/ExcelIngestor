<?php
    
    use app\models\db\Curso;
    use app\models\db\Estudiante;
    use yii\helpers\BaseArrayHelper;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    
    /* @var $this \yii\web\View */
    /* @var $model \app\models\EstudiantesHabitosForm */
    
    
    $listaCursos = Curso::find()->all();
    $listaMap    = BaseArrayHelper::map($listaCursos, 'id', 'curso');
    
    $form1 = ActiveForm::begin();
?>
<div class="p-2 col-sm-12 col-md-12 col-xl-6">
    <?= $form1->field($model, 'estudiante')->textInput();?>
    
    <?= $form1->field($model, 'idCurso')->dropdownList($listaMap, [
        'prompt'  => 'Seleccione',
        'options' => [$model->idCurso => ['selected' => true]]
    ]); ?>
    
    
    <div class="form-group ">
        <?= Html::submitButton('Seleccionar', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php
        $form1 = ActiveForm::end();
    ?>
</div>

<div id="feedback">
    <div class="row ">
        <div class="col ">Estudiantes por habitos :</div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre y Apellidos</th>
                <th scope="col">Hábitos</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach ($model->getEstudiantes() as $est){ ?>
                    <tr>
                        <td><?php echo $est->nombre ?> </td>
                        <td class="text-left"> <?php echo $model->getHabitos($est->carne)?> </td>
                    </tr>
                    <?php
                } ?>
            </tbody>
        </table>
    </div>
    
    <hr>
    <div class="col-lg-offset-10 col-lg-11">
        Total de estudiantes
        
    </div>

</div>


</html>

