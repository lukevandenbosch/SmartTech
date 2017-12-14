<?php

//phpinfo();

echo ini_get('display_errors');

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
echo ini_get('display_errors');


include "inc/DbConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') //to check if there was a post.
{

   // load the values into variables: host, username, passwd, database
    /*
  $host="db-mysql.zenit";
  $db_user="uli705_173a20";
  $db_password="csHE3669";
  $database="uli705_173a20";
    */

    $host="50.62.177.37";
    $port="3306";
    $db_user="senecauli";
    $db_password="P@ssw0rd";
    $database="smarttech";

    // Connect to database server.
    $con = mysqli_connect($host,$db_user,$db_password,$database,$port);

        // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else
    {
        echo 'Connected successfully';

        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $imagepath ="images/asus1.jpg"; // $_POST['imagepath'];

        foreach($_POST  as $key => $value)
        {
             echo "$key -> $value";
        }

        $query = "INSERT INTO products(Name,Category,Price,Qty,ImagePath) values('$name','$category',$price,$quantity,'$imagepath')";

        print "<br/>";
        print $query;


        $rowsaffected=mysqli_query($con,$query);

        print "Rows Affected: $rowsaffected";

        if ( !empty($rowsaffected))
        {
            echo "Added this record successfully!";

        }else
        {
            echo "Inset Failed!";

        }

    }



    /*getting the picture
    if(isset($_FILES["file"]["type"]))
    {
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);

        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $validextensions)) {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
            }
            else
            {
                if (file_exists("images/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                }
                else
                {
                    $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                    $targetPath = "images/".$_FILES['file']['name']; // Target path where file is to be stored
                    move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

                    foreach($_FILES as $key=>$val){
                        // Here $val is also array like ["Hello World 1 A","Hello World 1 B"], and so on
                        // And $key is index of $array array (ie,. 0, 1, ....)
                        echo "key $key";

                        foreach($val as $k=>$v){
                            // $v is string. "Hello World 1 A", "Hello World 1 B", ......
                            // And $k is $val array index (0, 1, ....)
                            echo "value:$v . <br />";
                        }
                    }


                    echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                    echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
                    echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
                    echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                    echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
                }
            }
        }
        else
        {
            echo "<span id='invalid'>***Invalid file Size or Type***<span>";
        }
    }
*/


/*
$name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $imagepath = $_POST['imagepath'];

    foreach($_POST  as $key => $value)
    {
        echo "$key -> $value";
    }

    //Validation



    $query = "INSERT INTO products(Name,Cateogry,Price,Qty,ImagePath) values('$name','$category',$price',$quantity,'$imagepath')";

    print "<br/>";
    print $query;

    $database = new DbConnection('zenit.senecac.on.ca', 'uli705_173a29', 'crtw9356', 'uli705_173a29');

    print "<br/>";
    print $database;

   $var = $database->OpenConnection();

    print "<br/>";
    print "$var";

    $rslt = $database->ExecuteUpdateInsertDelete();

    print "$var";
    echo "$rslt inserted Succesfull";
*/
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
                            <td class="td-element"><input type="text" name="name" placeholder="eg. MacBook Pro"/></td>
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
                            <td class="td-element"><input type="text" name="price" placeholder="eg. 1999"/></td>
                        </tr>
                        <tr>
                            <td class="headertext">Quantity Instock</td>
                            <td class="td-element"><input type="text" name="quantity" placeholder="eg. 25"/></td>
                        </tr>
                        <tr>
                            <td class="headertext">Picture</td>
                            <td class="td-element"><input type="file" value="Upload Picture"/><br/>
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
