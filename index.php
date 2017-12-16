<?php include "inc/MySQLConnection.php"; ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Smart Tech Supplies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="theme.css">
    <style></style>
</head>
<body>

<div class="container">

    <section id="header">
        <?php include "header.php";?>
    </section>

<!--Main Navigation Menu -->
    <section id="mainnavigation">
        <?php include 'mainnaviation.php';?>
    </section>

<!--Main content Menu -->
    <section id="main-content">
        <iframe title ="Video Player" height="480" src="https://www.youtube.com/embed/3Wf-aehKbuk?mute=1;autoplay=1"  allowfullscreen></iframe>
        <audio autoplay>
            <source src="sound/Calm-ocean-sounds-calming-seas.mp3" type="audio/mpeg">
        </audio>
        <hr>
        <h2>Product Category</h2>
        <hr>

        <?php

        /* used to turn on error displays for debugging only
        echo ini_get('display_errors');

        if (!ini_get('display_errors')) {
            ini_set('display_errors', '1');
        }
        echo ini_get('display_errors');
        */

        $connection = new MySQLConnection("default");  //Peter Database

        //Opening the db Connection
        $state = $connection->OpenConnection();
        //print_r($state);


        $categories = array('Laptop','Printers','Desktop','External','Flash Drives','HeadPhone','Monitor','Projectors','Speakers','Tablets');
        $query = "SELECT sum(Qty) as Available,Category  FROM products group by Category; ";
        $rows = $connection->Select_Query($query);
        $available = array();
        if($rows)
        {

        $categories = array('Laptop','Printers','Desktop','External','Flash Drives','HeadPhone','Monitor','Projectors','Speakers','Tablets');

        //Determing the number of products in stock per category
        foreach($categories as $category) {
            foreach ($rows as $row) {
                if($row->Category ==$category)
                    {
                        $available[$category] =$row->Available;
                    }
            }
        }
        }

        ?>

        <table id="actual-table">
            <tr>
                <td>
                    <p>
                        <a href="viewproducts.php#Desktop" class="aligncenter" aria-hidden="true">
                        <img src="images/categories/desktop.jpg" alt="Desktop"   width="500" height="300">
                            <div class ="categoryheadingbackground">Desktop PCS(<span class="available-products">
                                    <?php echo count($available)!=0  ? array_key_exists("Desktop",$available) ? $available["Desktop"] : "0": "0"; ?>
                                </span>)</div>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a>
                            <img src="images/categories/external-hdd.jpg" alt="External HDD"    width="500" height="300">
                            <div class ="categoryheadingbackground">External Storage Devices(<span class="available-products"><?php echo count($available)!=0  ?array_key_exists("External",$available) ? $available["External"] :"0": "0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="viewproducts.php#Flash Drives" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/flash-drive.jpg" alt="Flash Drive"    width="500" height="300">
                            <div class ="categoryheadingbackground">Flash Drives(<span class="available-products"><?php echo count($available)!=0   ?array_key_exists("Flash Drives",$available) ? $available["Flash Drives"]:"0": "0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="viewproducts.php#HeadPhone" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/headphones.jpg" alt="HeadPhones"   width="500" height="300">
                            <div class ="categoryheadingbackground">Head Phones(<span class="available-products"><?php echo count($available)!=0   ?array_key_exists("HeadPhone",$available) ?$available["HeadPhone"]:"0": "0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="viewproducts.php#Monitor" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/monitor.jpg" alt="Monitors"    width="500" height="300">
                            <div class ="categoryheadingbackground">Monitors(<span class="available-products"><?php echo count($available)!=0  ?array_key_exists("Monitor",$available) ? $available["Monitor"]: "0":"0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <a href="viewproducts.php#Printers" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/printer.jpg" alt="Printers"    width="500" height="300">
                            <div class ="categoryheadingbackground">Printers(<span class="available-products"><?php echo count($available)!=0  ?array_key_exists("Printers",$available) ? $available["Printers"]: "0":"0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                            <a href="viewproducts.php#Projectors" aria-hidden="true" class="aligncenter">
                            <img src="images/categories/projector.jpg" alt="Projector"  width="500" height="300">
                            <div class ="categoryheadingbackground">Projectors(<span class="available-products"><?php echo count($available)!=0    ?array_key_exists("Projectors",$available) ? $available["Projectors"]: "0": "0"; ?></span>)</div>
                            </a>

                    </p>
                </td>
                <td>
                    <p>
                        <a href="viewproducts.php#Speakers" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/speakers.jpg" alt="Speaker"   width="500" height="300">
                            <div class ="categoryheadingbackground">Speakers(<span class="available-products"><?php echo count($available)!=0    ?array_key_exists("Speakers",$available) ?  $available["Speakers"]: "0": "0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="viewproducts.php#Tablets" class="aligncenter" >
                            <img src="images/categories/tablet.jpg" alt="Tablets"    width="500" height="300">
                            <div class ="categoryheadingbackground">Tablets(<span class="available-products"><?php echo count($available)!=0   ?array_key_exists("Tablets",$available) ?  $available["Tablets"]: "0": "0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="viewproducts.php#Laptop" class="aligncenter">
                            <img src="images/categories/Laptop.jpg" alt="Laptops"   width="500" height="300">
                            <div class ="categoryheadingbackground">Laptops(<span class="available-products"><?php echo count($available)!=0  ?array_key_exists("Laptop",$available) ? $available["Laptop"]: "0":"0"; ?></span>)</div>
                        </a>
                    </p>
                </td>
            </tr>
        </table>

    </section>


    <section id="footer">
        <?php include 'footer.php';?>
    </section>
</div>
</body>
</html>

