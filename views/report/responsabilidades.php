<?php
    
    use app\models\db\Curso;
    use app\models\db\Estudiante;
    use yii\helpers\BaseArrayHelper;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    
    /* @var $this \yii\web\View */
    /* @var $model \app\models\ResponsabilidadesForm */
    /* @var $lista BaseArrayHelper */
    
    $listaCursos = Curso::find()->all();
    $listaMap    = BaseArrayHelper::map($listaCursos, 'id', 'curso');
    
    $form1 = ActiveForm::begin();
?>
<div class="p-2 col-sm-12 col-md-12 col-xl-6">
    <?= $form1->field($model, 'idResponsabilidades')->dropdownList($lista, [
        'prompt'  => 'Seleccione',
        'options' => [$model->idResponsabilidades => ['selected' => true]]
    ]);
    
    ?>
    
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
        <div class="col ">Estudiantes por nivel de interés selecionado :</div>
    </div>
    
    <?php
        if ($model->idResponsabilidades != "" and $model->idCurso != ""){
            //echo $seleccionEgresado;
            $estudiante     = Estudiante::find()->where(['id_interes_apoyar_orga' => $model->idResponsabilidades])
                ->andWhere(['id_curso' => $model->idCurso])->orderBy("carne")->all();
            $cantEstudiante = Estudiante::find()->where(['id_interes_apoyar_orga' => $model->idResponsabilidades])
                ->count();
        }else{ //echo "Es nulo";
            $estudiante     = Estudiante::find()->where(['id_curso' => $model->idCurso])->orderBy("carne")->all();
            $cantEstudiante = Estudiante::find()->where(['id_curso' => $model->idCurso])->count();
        } ?>

    <div class="table table-striped">
        <table>
            <thead>
            <tr>
                <th scope="col">Nombre y Apellidos</th>
                <th scope="col">Organizaciones que pertenece</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
                foreach ($estudiante as $est){ ?>
                    <tr>
                        <td><?php
                                echo $est->nombre ?> </td>
                        <td><?php
                                echo strval($est->integracionPolitica->getAttribute('integracion')) ?> </td>
                    </tr>
                    <?php
                } ?>
            </tbody>
        </table>
    </div>

    <hr>
    <div class="col-lg-offset-10 col-lg-11">
        Total de estudiantes <?php
            echo $cantEstudiante; ?>
    </div>

</div>


</html>
