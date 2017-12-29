<?php

//Include database access class
include "inc/MySQLConnection.php";



/* used to turn on error displays for debugging only
        echo ini_get('display_errors');

        if (!ini_get('display_errors')) {
            ini_set('display_errors', '1');
        }
        echo ini_get('display_errors');
        */

if ($_SERVER['REQUEST_METHOD'] == 'GET') //to check if there was a post.

{
    //get the product if for the product to be deleted.
    $id = $_GET['id'];


    //Database Access
    $connection = new MySQLConnection("default");  //Peter Database


    //Opening the db Connection
    $state = $connection->OpenConnection();


    if ($state) //if connection is successful proceed with getting the informatin from the form and writing to the db.
    {
        $image = array();
        try {

            //retrieve and save the image path from table before the record is deleted.
            //If the record is deleted the image will be be deleted from the file system.

            $query = "SELECT ImagePath FROM products WHERE  id =$id";
            $image = $connection->Select_Query($query);


        } catch (Exception $e) {
        }

        $query = "DELETE FROM products WHERE  id =$id";
        $rowsaffected = $connection->ExecuteUpdateInsertDelete($query);


        /*
         * //check if the record was deleted. If the varaible is empty/null it means that the record was not deleted.
         * any other result( such as 1,2 etc)  mean that the records was succesfully deleted from the table.
         */

        if (!empty($rowsaffected)) {


            // Since the record was deleted, then we proceed with deleting the associated image from the file system.

            try {


                //check  if the  image variable containting the image path has a value. That value could only be a imagepath.
                if ($image) {
                    foreach ($image as $img) {


                        //skip placeholder image. This image should never be deleted.
                        if ($img->ImagePath != 'images/placeholder.jpg') {

                            //build command to rm the image by adding the image path the rm shell command.
                            $cmd = "rm " . $img->ImagePath;
                            //echo "$cmd";
                            shell_exec($cmd);
                        }
                    }

                }


            }  /* Catch possible errors that could occur while trying to delete the file.
                * This might include insufficient permission or cases where the file does not exist.
                */
            catch (Exception $e) {
                // It is customary to write errors to a long file. but this is not required in this project.
            }

        } else {
            // if the record could not be deleted for any reason. Do nothing to this section.
            // The below section will handle failure and success and provide the appropriate error message .

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
    <link rel="stylesheet" type="text/css" href="scripts/css/theme.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <style></style>
</head>
<body>

<div class="container">

    <!--This section  contains the header page which is included using the PHP function. -->

    <section id="header">
        <?php include "header.php"; ?>
    </section>

    <!--This section contains the main navigation links which is included using the PHP function. -->

    <section id="mainnavigation">
        <?php include 'mainnaviation.php'; ?>
    </section>


    <!--Main This section contains the main content for the page. Menu -->

    <section id="main-content">


        <hr>
        <h2>Product Deletion</h2>
        <hr>
        <?php


            //This  section checks if the page was submitted by a GET.
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                //this variable contains the results of the delete query. If may be null/empty or contains an integer values indicating how much record was deleted.
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

    <!--Main This section contains the footer content for the page. -->

<section id="footer">
    <?php include 'footer.php'; ?>
</section>
</div>

</body>
</html>
