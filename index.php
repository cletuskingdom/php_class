<?php
    require_once("./dbConnection.php");

    $stmt = $pdo->prepare("SELECT * FROM products");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultw = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$title?></title>
    </head>

    <body>
        <p>
            Hello <b><?=$username?></b>,
        </p>
        <form action="./submit_to_db.php" method="POST">
            <input name="name" type="text" placeholder="Enter your name">
            <input name="percent" type="number" placeholder="Enter the percent E.g. 10">
            <input name="main_price" type="number" placeholder="Enter the price">
            <input name="quantity" type="number" placeholder="Enter the quanity">
            <textarea name="description" id="" cols="30" rows="10" placeholder="Enter the Description"></textarea>
            <textarea name="specifications" id="" cols="30" rows="10" placeholder="Enter the specifications"></textarea>
            
            <button type="submit">Submit</button>
        </form>

        <hr>
        <h1>List of Products</h1>
        <table>
            <th>
                <tr>Title</tr>
                <tr>Price</tr>
                <tr>Description</tr>
                <tr>Action</tr>
            </th>
            <?php
                foreach($resultw as $product){
                    ?>
                        <tr>
                            <th><?=$product['name']?></th>
                            <th><?=$product['slashed_price']?></th>
                            <th><?=$product['description']?></th>
                            <th><a href="edit.php/<?=$product['id']?>">Edit</a></th>
                            
                        </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>