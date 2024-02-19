<?php if(Yii::$app->user->identity->user_role == 'Admin'){ ?>
<div class="row justify-content-center">
    <div class="card col-lg-6 p-5" style="border-radius:20px">
        <h2>Users List - All Users</h2>

        <table class="table ">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            </tr>
        </thead>
            <tbody>
                <?php
                $count = 1;
                foreach($user as $u){ ?>
                <tr>
                <th scope="row"><?= $count++?>.</th>
                <td><?= $u->username ?><?php if($u->id == Yii::$app->user->id){ echo '(You)';} ?></td>
                <td><?= $u->email ?></td>
                <td><?= $u->user_role ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
</div>
<?php }else{?>
<h3>Error Page not Accessible (Login as Admin to continue)</h3>
<?php }?>