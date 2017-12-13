<?php

#include "inc\DbConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') //to check if there was a post.
{


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
            <hr>
            <div id="updateproduct">
                <form  id="addform" name="addform" method="POST" action="addproduct.php">
                    <table>
                        <tr>
                            <td class="headertext">Name</td>
                            <td class="td-element"><input type="text" name="name" placeholder="eg. MacBook Pro"/></td>
                        </tr>
                        <tr>
                            <td class="headertext">Category</td>
                            <td class="td-element"><input type="text" name="category" placeholder="eg. Laptop"/></td>
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
                            <td class="td-element"><input type="button" value="Upload Picture"/><br/>
                            <td class="td-element"><input type="text" name="imagepath" placeholder=""/>
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
