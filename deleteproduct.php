<?php

//Include database class
include "inc/MySQLConnection.php";




echo ini_get('display_errors');

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
echo ini_get('display_errors');





if ($_SERVER['REQUEST_METHOD'] == 'GET') //to check if there was a post.

    {
     $id = $_GET['id'];

    //Database Access

     $connection = new MySQLConnection("default");  //Peter Database

    //Opening the db Connection
    $state = $connection->OpenConnection();


    if($state) //if connection is succesfull proceed with getting the informatin from the form and writing to the db.
    {

        $query = "DELETE FROM products WHERE  id =$id";
        $rowsaffected = $connection->ExecuteUpdateInsertDelete($query);

      if (!empty($rowsaffected))
        {
            //Testing
            //echo "$rowsaffected record was successfully added!";
        }else
      {
          // echo "Inset Failed!";
      }
    }



}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Smart Tech Supplies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="theme.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <style></style>
</head>
<body>

<div class="container">

    <section id="header">
        <?php include "header.php"; ?>
    </section>

    <!--Main Navigation Menu -->
    <section id="mainnavigation">
        <?php include 'mainnaviation.php'; ?>
    </section>

    <!--Main content Menu -->
    <section id="main-content">
        <!--Main content Menu -->

        <hr>
        <h2>Product Deletion</h2>
        <hr>
        <?php


            if ($_SERVER['REQUEST_METHOD'] == 'GET') //to check if there was a post.
            {
                if($rowsaffected) {
                    echo "<p class =\"success\">The Product id <strong>$id</strong> was succesfully deleted. $rowsaffected record added. </p>";

                }else
                {
                    echo "<p class =\"error\">Deleting Product  with id <strong>$id</strong> failed. </p>";
                }

                echo "<hr><br/><a href=\"viewproducts.php\"> <strong>Back to Products</strong></a><br/>";
            }


        ?>

    </section>


<section id="footer">
    <?php include 'footer.php'; ?>
</section>
</div>

</body>
</html>
