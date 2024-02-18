<?php if(Yii::$app->user->identity->user_role == 'Manager'){ ?>
<div class="row justify-content-center">
    <div class="card col-lg-6 p-5" style="border-radius:20px">
        <h2>Project List - All Projects</h2>

        <table class="table ">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            
            </tr>
        </thead>
            <tbody>
                <?php
                $count = 1;
                foreach($project as $u){ ?>
                <tr>
                <th scope="row"><?= $count++?>.</th>
                <td><strong><?= $u->title ?></strong></td>
                <td><?= $u->description ?></td>
                
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
</div>
<?php } ?>