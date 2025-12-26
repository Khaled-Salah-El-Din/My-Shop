<?php

require_once "Database.php";

$allowed_ext = ['jpg' , 'png' , 'jpeg' , 'gif'];

$imgs = [];

for ($i=0; $i < count($_FILES['image']['name']); $i++) { 
    $img_name = $_FILES['image']['name'][$i];
    $img_size = $_FILES['image']['size'][$i];
    $img_tmp = $_FILES['image']['tmp_name'][$i];
    $img_num = $i + 1;
    $img_ext = pathinfo($img_name , PATHINFO_EXTENSION);

    if ( !in_array($img_ext , $allowed_ext) ) {
        echo "wrong file extension for image number $img_num";
        exit();
    }

    if ($img_size > 3000000 ) {
        echo "Image number $img_num is too large";
        exit();
    }

    $new_img_name = time() . rand(1 , 150000) . $img_name;

    array_push($imgs, $new_img_name);

    move_uploaded_file($img_tmp , "../img/$new_img_name");
}

$name = $_POST['name'];
$cat = $_POST['category'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$count = $_POST['count'];
$description = $_POST['description'];

$imgs_str = implode(", ", $imgs);

$products = new Database("products");
$products->insert(
    ["name"=>$name,
           "cat"=>$cat, 
           "brand"=>$brand, 
           "price"=>$price,
           "image"=>$imgs_str,
           "count"=>$count,
           "description"=>$description]
);

header("location:../products.php");
exit;