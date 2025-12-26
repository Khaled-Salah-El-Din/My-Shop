<?php

require_once "Database.php";

$products = new Database("products");

$name = $_POST['name'];
$cat = $_POST['category'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$count = $_POST['count'];
$descr = $_POST['description'];
$id = $_GET['id'];

$allowed_ext = ['jpg' , 'png' , 'jpeg' , 'gif'];

if ($_FILES['image']['error'] === 0) {

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmp = $_FILES['image']['tmp_name'];

    $img_ext = pathinfo($img_name , PATHINFO_EXTENSION);

    if ( !in_array($img_ext , $allowed_ext) ) {
        echo "wrong file extension";
        exit();
    }

    if ($img_size > 3000000 ) {
        echo "file is too large";
        exit();
    }

    $new_img_name = time() . rand(1 , 150000) . $img_name ;

    move_uploaded_file($img_tmp , "../images/$new_img_name");

    $products->update(["name"=>$name, 
                             "cat"=>$cat,
                             "brand"=>$brand,
                             "price"=>$price,
                             "image"=>$new_img_name,
                             "count"=>$count,
                             "description"=>$descr],
                             "id", $id);

} else {
    $products->update(["name"=>$name, 
                             "cat"=>$cat,
                             "brand"=>$brand,
                             "price"=>$price,
                             "count"=>$count,
                             "description"=>$descr],
                             "id", $id);

}

header("location:../products.php");
exit;