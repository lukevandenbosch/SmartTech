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
    <link rel="stylesheet" type="text/css" href="theme.css">

</head>
<body>

<div class="container">
<?php include "header.php";?>


<!--Main Navigation Menu -->
<?php include 'mainnaviation.php';?>

<!--Main content Menu -->



    <table class="ItemTable">

        <?php

        $connection = new MySQLConnection("default");  //Peter Database

        //Opening the db Connection
        $state = $connection->OpenConnection();
        //print_r($state);


        $categories = array('Laptop','Printers','Desktop','External','Flash Drives','HeadPhone','Monitor','Projectors','Speakers','Tablets');
        $query = "SELECT * FROM products ";
        $rows = $connection->Select_Query($query);


        //Filter and Create headings per category
        foreach($categories as $category)
        {
            print '<tr><td colspan="3"><div class="categoryheadingbackground"><a id="'.str_replace(" ","",$category).'">'.$category.'</a></div></td></tr>';
            $rowbyCateogry = array();


            //create array with records that belong to a specific category
           foreach ($rows as $row)
            {
                if($row->Category==$category)
                {
                    $rowbyCateogry[] = $row;
                }
            }

        foreach ($rowbyCateogry as $row)
        {
            setlocale(LC_MONETARY, 'en_US');
            $image = strlen(trim($row->ImagePath))==0 ? "images/placeholder.jpg":$row->ImagePath;
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
                            .'<a href="'.$image.'">Large</a> | <a  href="deleteproduct.php?id='.$row->Id.'"><span style="color:#f4a024;">Removed Products</span> </a>'
                        .'</p></td>';
             print '</tr>';

        }
        }
        ?>
</table>

<!--footer -->
<?php include 'footer.php';?>
</div>

</body>
</html>
