    <?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /** @var yii\web\View $this */
    /** @var app\models\Project $model */
    /** @var ActiveForm $form */
    ?>
    <div class="row justify-content-center">
    <div class="card col-8">
        <div class="site-projects p-2">
            <div class="card-title"><h3>Add a new Project</h3></div>

            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'title') ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>
            
                <div class="form-group p-2">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-outline-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            
        </div><!-- site-projects -->
        <div class=" p-2">
            <h3>Project List -</h3>
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach($project as $p){ ?>
                        <tr>
                            <td ><?= $count++?>.</td>
                            <td><strong><?= $p->title ?></strong></td>
                            <td class="word-wrap" style="word-wrap: break-word;"><?php echo $p->description ?></td>
                            <td><button class="btn btn-outline-dark"  data-bs-toggle="modal" data-bs-target="#exampleModal<?= $p->id?>" data-id="<?= $p->id?>">Edit</button></td>
                            <td><a href="/site/delete-project?id=<?= $p->id ?>" class="btn btn-outline-danger">Delete</a></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <!-- Button trigger modal -->


<!-- Modal -->
<?php foreach($project as $p){ ?>

<div class="modal fade" id="exampleModal<?= $p->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Project Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php $editform = ActiveForm::begin([
            'action' => ['site/edit-project', 'id' => $p->id],
            'options' => ['class' => 'editform']
            ]) ?>
        <?= $editform->field($model, 'title')->textInput(['class' => 'editTitle form-control', 'value' => $p->title]) ?>
        <?= $editform->field($model, 'description')->textarea(['rows' => 4, 'class' => 'form-control','value'=>$p->description]) ?>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <?= Html::submitButton('Save',['class'=>'btn btn-secondary editButton'])?>
        <?php $editform = ActiveForm::end() ?>
      </div>
    </div>
  </div>
</div>
<?php }?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $('.btn-outline-danger').on('click',function(e){
            e.preventDefault()
            var del = $(this).attr('href');
            response = confirm('Do you want to delete this project?');
            if(response){
                window.location.href = del;
            }
            
        })
  
      
    </script>