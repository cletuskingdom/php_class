<?php
    require_once("./dbConnection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $percent = test_input($_POST["percent"]);
        $main_price = test_input($_POST["main_price"]);
        $quantity = test_input($_POST["quantity"]);
        $description = test_input($_POST["description"]);
        $specifications = test_input($_POST["specifications"]);
        $slashed_price = $main_price - (($percent / 100) * $main_price);

        try {
            $sql = "INSERT INTO products (name, percent, main_price, quantity, description, specifications, slashed_price) 
                    VALUES (:name, :percent, :main_price, :quantity, :description, :specifications, :slashed_price)";

            // Prepare the SQL statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':percent', $percent);
            $stmt->bindParam(':main_price', $main_price);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':specifications', $specifications);
            $stmt->bindParam(':slashed_price', $slashed_price);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data.";
            }
        } catch (\Throwable $th) {
            echo "Error: " . $th->getMessage();
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
