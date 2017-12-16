<?php

//Include database class
include "inc/MySQLConnection.php";
$uploaddir = 'images/';


/*
echo ini_get('display_errors');

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
echo ini_get('display_errors');

*/



if ($_SERVER['REQUEST_METHOD'] == 'POST') //to check if there was a post.
{
     //Instaniate Class
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);
    $validextensions = array("JPEG", "JPG", "PNG","GIF");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = strtoupper(end($temporary));




    //Handing Image Upload

    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $validextensions)) {

        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } else {

            if (file_exists("images/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            } else {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                    echo "File is valid, and was successfully uploaded.\n";


                    //Database Access;





                } else {
                    echo "Possible file upload attack!\n";
                }
            }
        }
    }else
    {
        echo "<p class =\"error\">Invalid file. </p>";
        return;

    }


    //Database Access

     $connection = new MySQLConnection("default");  //Peter Database
    //$connection = new MySQLConnection("peter");  //Peter Database
    //$connection = new MySQLConnection("luke");  //Peter Database

    //Opening the db Connection
    $state = $connection->OpenConnection();


    if($state) //if connection is succesfull proceed with getting the informatin from the form and writing to the db.
    {

        //get post values from form.
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $imagepath =$uploadfile;


        $query = "INSERT INTO products(Name,Category,Price,Qty,ImagePath) values('$name','$category',$price,$quantity,'$imagepath')";
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
        <section id="addform">
            <hr>
            <h2>Adding New Products</h2>

            <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST') //to check if there was a post.
            {
                if($rowsaffected) {
                    echo "<p class =\"success\">The product was succesfully inserted. $rowsaffected record added. </p>";
                }else
                {
                    echo "<p class =\"error\">Adding product failed. </p>";
                }
            }
            ?>
            <hr>
            <div id="updateproduct">
                <form  id="addform" name="addform" method="POST" action="addproduct.php"  enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td class="headertext">Name</td>
                            <td class="td-element"><input type="text" name="name" placeholder="eg. MacBook Pro"/> <span class="required">*</span></td>
                        </tr>
                        <tr>
                            <td class="headertext">Category</td>
                            <td class="td-element"><select name="category">
                                    <option value="Laptop">Laptop</option>
                                    <option value="Desktop">Desktop</option>
                                    <option value="External">External Storage</option>
                                    <option value="Flash Drives">Flash Drives</option>
                                    <option value="HeadPhone">Headphone</option>
                                    <option value="Monitor">Monitor</option>
                                    <option value="Printers">Printers</option>
                                    <option value="Projectors">Projectors</option>
                                    <option value="Speakers">Speakers</option>
                                    <option value="Tablets">Tablets</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="headertext">Price</td>
                            <td class="td-element"><input type="text" name="price" placeholder="eg. 1999"/> <span class="required">*</span></td>
                        </tr>
                        <tr>
                            <td class="headertext">Quantity Instock</td>
                            <td class="td-element"><input type="text" name="quantity" placeholder="eg. 25"/> <span class="required">*</span> </td>
                        </tr>
                        <tr>
                            <td class="headertext">Picture</td>
                            <td class="td-element"><input type="file" value="Upload Picture" name="file"/> <br/>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <hr>
                                <input type="submit" value="Add Product"/></td>

                        </tr>
                    </table>
                </form>
            </div>
        </section>

    </section>


<section id="footer">
    <?php include 'footer.php'; ?>
</section>
</div>

</body>
</html>
