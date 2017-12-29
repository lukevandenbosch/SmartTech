<?php include "inc/MySQLConnection.php";



/* used to turn on error displays for debugging only
        echo ini_get('display_errors');

        if (!ini_get('display_errors')) {
            ini_set('display_errors', '1');
        }
        echo ini_get('display_errors');
        */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Smart Tech Supplies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="scripts/css/theme.css">

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




    <table class="ItemTable">

        <?php

        //Connect to the database by calling the DataAcess Class.
        $connection = new MySQLConnection("default");

        //Opening the db Connection
        $state = $connection->OpenConnection();

        //print_r($state);


        //Creating an array with a list of category. These are the same categories that are stored within the drop down box on the add product page.
         $categories = array('Laptop','Printers','Desktop','External','Flash Drives','HeadPhone','Monitor','Projectors','Speakers','Tablets');

        //get the list of product from the product table.
        $query = "SELECT * FROM products ";
        $rows = $connection->Select_Query($query);


        //Filter and Create headings per category
        foreach($categories as $category)
        {

            //Dynamically creating  category header (using <td> NOT <th>) rows within the table.
            print '<tr><td colspan="3"><div class="categoryheadingbackground"><a id="'.str_replace(" ","",$category).'">'.$category.'</a></div></td></tr>';

            //Create an array that will stored all products that belong to a particular category.
            $rowbyCateogry = array();


            //create array with records that belong to a specific category
           foreach ($rows as $row)
            {
                if($row->Category==$category)
                {
                    $rowbyCateogry[] = $row;
                }
            }


         //for all products that belong do a particular category create table rows with the appropriate fields.
        foreach ($rowbyCateogry as $row)
        {
            //set the format for the price.
            setlocale(LC_MONETARY, 'en_US');

            //checking if the image path is empty. If so, use the default placeholder iamge.
            $image = strlen(trim($row->ImagePath))==0 ? "images/placeholder.jpg":$row->ImagePath;

            //output product info in table.
             print '<tr>';
                print '
                        <td><img src="'.$image.'" class="picture1"   alt="'.$row->Name.'"></td>
                        <td class="td-align-right"><p class="nopadding">                        
                            Product Id:<br/>
                            Product:<br/>
                            Price:<br/>
                            Quantity Instock:<br/>
                            &nbsp;<br/>
                         </p></td>'
                        .'<td class="td-align-left"><p class="nopadding">'
                             .$row->Id.'<br/>'
                             .$row->Name.'<br/>'
                             .money_format('%(#10n',$row->Price).'<br/>'
                             .$row->Qty.'<br/>'
                            .'<a href="'.$image.'">Large</a> | <a  href="deleteproduct.php?id='.$row->Id.'"><span style="color:#f4a024;">Removed Products</span> </a>' // use the product id to create a delete link for removing products.
                        .'</p></td>';
             print '</tr>';

        }
        }
        ?>
</table>
    </section>

<!--footer -->
<?php include 'footer.php';?>
</div>

</body>
</html>
