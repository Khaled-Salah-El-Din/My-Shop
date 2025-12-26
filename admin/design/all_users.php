<table class="table table-hover table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">E-mail</th>
            <th scope="col">Gender</th>
            <th scope="col">Permissions</th>
            <th scope="col">controls</th>
        </tr>
    </thead>
    <tbody>

<?php

$users = new Database("users");

foreach ($users->selectAll() as $user) {

?>           

    <tr>
        <th scope="row"><?= $user['id'] ?></th>
        <td><?= $user['username'] ?></td>
        <td><?= $user['password'] ?></td>
        <td><?= $user['email'] ?></td>
        <td>

<?php 

$gender_id = $user['gender'];

$genders = new Database("gender");
$gender = $genders->query("SELECT name FROM gender WHERE id = :id", ["id"=>$gender_id])[0];

echo $gender['name'];

?>

        </td>
        <td>
            
<?php 

$pr_id = $user['pr'];

$prs = new Database("pr");
$pr = $prs->query("SELECT name FROM pr WHERE id = :id", ["id"=>$pr_id])[0];

echo $pr['name'];

?>

        </td>
        <td><a href="?action=edit&id=<?= $user['id'] ?>"><button class="btn btn-primary">Edit</button></a>
        <a href="fun/delete_user.php?id=<?= $user['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
    </tr>

<?php

}
 
?>
    </tbody>
</table>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form to add a new user</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form>
                <div class="form-group">
                    <label for="username" style="font-weight: bold;"> Username :</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password" style="font-weight: bold;"> Password :</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="email" style="font-weight: bold;"> E-mail :</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="gender" style="font-weight: bold;"> Gender :</label>
                    <select class="form-control" id="gender" name="gender">

<?php

foreach ($genders->selectAll() as $gender) {

?>

                        <option value="<?= $gender['id'] ?>"><?= $gender['name'] ?></option>

<?php

}

?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="permissions" style="font-weight: bold;"> Permissions :</label>
                    <select class="form-control" id="pr" name="pr">

<?php

foreach ($prs->selectAll() as $pr) {

?>

                        <option value="<?= $pr['id'] ?>"><?= $pr['name'] ?></option>

<?php

}

?>
                    </select>
                </div>

                <input type="submit" value="Add new user" class="form-control btn btn-success">
     
            </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>

    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-success" href="#addModal" data-toggle="modal">Add new user</a></li><br><br>