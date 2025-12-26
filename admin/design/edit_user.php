<?php

    $id = $_GET['id'];

    $users = new Database("users");

    $user = $users->select("id", $id)[0];

?>

<form method="POST" action="fun/do_edit_user.php?id=<?= $id ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username" style="font-weight: bold;"> Username :</label>
                    <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="password" style="font-weight: bold;"> Password :</label>
                    <input type="number" class="form-control" name="password" value="<?= $user['password'] ?>">
                </div>
                <div class="form-group">
                    <label for="email" style="font-weight: bold;"> E-mail :</label>
                    <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="gender" style="font-weight: bold;"> Gender :</label>
                    <select class="form-control" name="gender">

<?php

$genders = new Database("gender");

foreach ($genders->selectAll() as $gender) {

?>

                    <option value="<?= $gender['id'] ?>"

<?php

if ($user['gender'] === $gender['id']) {
    echo "selected";
}

?>

                    ><?= $gender['name'] ?></option>

<?php
    
}

?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="permissions" style="font-weight: bold;"> Permissions :</label>
                    <select class="form-control" name="pr">

<?php

$prs = new Database("pr");

foreach ($prs->selectAll() as $pr) {

?>

                    <option value="<?= $pr['id'] ?>"

<?php

if ($user['pr'] === $pr['id']) {
    echo "selected";
}

?>

                    ><?= $pr['name'] ?></option>

<?php

}

?>

                    </select>
                </div>
                <input type="submit" value="Update user" class="form-control btn btn-success">
</form>