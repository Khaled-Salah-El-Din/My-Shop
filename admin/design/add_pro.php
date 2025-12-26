<form method="POST" action="fun/do_add_pro.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" style="font-weight: bold;"> Product name :</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price" style="font-weight: bold;"> Price :</label>
                    <input type="number" class="form-control" name="price"  required>
                </div>
                <div class="form-group">
                    <label for="count" style="font-weight: bold;"> Count :</label>
                    <input type="text" class="form-control" name="count" required>
                </div>
                <div class="form-group">
                    <label for="description" style="font-weight: bold;"> Description :</label>
                    <textarea class="form-control" name="description" style="height:150px;" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image" style="font-weight: bold;"> Image :</label>
                    <input type="file" class="form-control-file" name="image[]" multiple required>
                </div>

                <div class="form-group">
                    <label for="category" style="font-weight: bold;"> Category :</label>
                    <select class="form-control" name="category">

<?php

$categories = new Database("category");
$query = $categories->query("SELECT * FROM category ORDER BY name");

foreach ($query as $category) {

?>

                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

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
$query = $brands->query("SELECT * FROM brand ORDER BY name");

foreach ($query as $brand) {

?>

                    <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>

<?php

}

?>

                    </select>
                </div>

                <input type="submit" value="Add Product" class="form-control btn btn-success">
               
            </form>