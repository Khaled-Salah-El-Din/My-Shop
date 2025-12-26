<table class="table table-hover table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">image</th>
            <th scope="col">category</th>
            <th scope="col">brand</th>
            <th scope="col">count</th>
            <th scope="col">description</th>
            <th scope="col">views</th>
            <th scope="col">controls</th>
        </tr>
    </thead>
    <tbody>

<?php

$products = new Database("products");

foreach ($products->selectAll() as $pro) {

?>                   

    <tr>
        <th scope="row"><?= $pro['id'] ?></th>
        <td><?= $pro['name'] ?></td>
        <td>$<?= $pro['price'] ?></td>
        <td>
<?php 

$imgs = explode(', ', $pro['image']);

for ($i = 0; $i < count($imgs); $i++) {

?>

        <img src="img/<?= $imgs[$i] ?>" style="width:50px;height:50px">

<?php

}

?>
        </td>
        <td><?php $cat_id = $pro['cat'];
        $categories = new Database("category");
        $cat = $categories->select("id", $cat_id)[0];
        echo $cat['name'];
        
        ?></td>
        <td><?php $brand_id = $pro['brand'];
        $brands = new Database("brand");
        $brand = $brands->select("id", $brand_id)[0];
        echo $brand['name'];
        
        ?></td>
        <td><?= $pro['count'] ?></td>
        <td><?= $pro['description'] ?></td>
        <td><?= $pro['views'] ?></td>
        <td><a href="?action=edit&id=<?= $pro['id'] ?>"><button class="btn btn-primary">Edit</button></a>
        <a href="fun/delete_pro.php?id=<?= $pro['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
    </tr>

<?php

}

?>
    </tbody>
</table>        

<a href="?action=add"><button class="btn btn-success">Add product</button></a>