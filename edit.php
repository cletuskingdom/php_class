<?php
    require_once("./dbConnection.php");
    // edit.php/43

    $url = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $product_id = end($parts);

    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=$product_id");
    $stmt->execute();
    $product_details = $stmt->fetchAll();
?>

<?php
    // edit.php?id=42

    // if (isset($_GET['id'])) {
    //     $id = $_GET['id'];
    //     // Now, $id contains the value passed in the "id" parameter in the URL
    //     echo "The ID is: " . $id;
    // } else {
    //     echo "ID not found in the URL.";
    // }
    // $id = $_GET['id'];
    // echo "Product ID: " . $id;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit </title>
    </head>

    <body>
        <?=$url?>
        <hr>
        <?php
            foreach($product_details as $data){
                ?>
                    <p>Name: <?=$data['name']?></p>
                    <p>Descriiption: <?=$data['description']?></p>
                <?php
            }
        ?>
    </body>
</html>