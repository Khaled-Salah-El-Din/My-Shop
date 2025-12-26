<?php

    $id = $_GET['id'];

    $products = new Database("products");

    $pro = $products->select("id", $id)[0];

?>

<form method="POST" action="fun/do_edit_pro.php?id=<?= $id ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" style="font-weight: bold;"> Product name :</label>
                    <input type="text" class="form-control" name="name" value="<?= $pro['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="price" style="font-weight: bold;"> Price :</label>
                    <input type="number" class="form-control" name="price" value="<?= $pro['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="count" style="font-weight: bold;"> Count :</label>
                    <input type="text" class="form-control" name="count" value="<?= $pro['count'] ?>">
                </div>
                <div class="form-group">
                    <label for="description" style="font-weight: bold;"> Description :</label>
                    <textarea class="form-control" name="description" style="height:150px;" ><?= $pro['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="image" style="font-weight: bold;"> Image :</label>
                    <input type="file" class="form-control-file" name="image">

<?php 

$imgs = explode(', ', $pro['image']);

for ($i = 0; $i < count($imgs); $i++) { 

?>

                    <img src="img/<?= $imgs[$i] ?>" style="width:300px;height:300px">

<?php

}

?>

                </div>
                <div class="form-group">
                    <label for="category" style="font-weight: bold;"> Category :</label>
                    <select class="form-control" name="category">

<?php

$categories = new Database("category");

foreach ($categories->selectAll() as $cat) {

?>

                    <option value="<?= $cat['id'] ?>"
                
<?php

if ($pro['cat'] === $cat['id']) {
    echo "selected";
}

?>

                    ><?= $cat['name'] ?></option>

<?php
    
}

?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="brand" style="font-weight: bold;"> Brand :</label>
                    <select class="form-control" name="brand">
<?php

$brands = new Database("brand");

foreach ($brands->selectAll() as $brand) {
    
?>

                    <option value="<?= $brand['id'] ?>" 
<?php

if ($pro['brand'] === $brand['id']) {
    echo "selected";
}

?>
            
                    ><?= $brand['name'] ?></option>

<?php

}

?>
                    </select>
                </div>

                <input type="submit" value="Update product" class="form-control btn btn-success">

</form>