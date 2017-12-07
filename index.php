<?php

//echo "This is our Main Page";

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Smart Tech Supplies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="theme.css">
    <style></style>
</head>
<body>

<div class="container">
    <header>
        <?php include "header.php";?>
    </header>

<!--Main Navigation Menu -->
    <section id="main-nav">
        <?php include 'mainnaviation.php';?>
    </section>
<!--Main content Menu -->

    <section id="main-content">
        <iframe  height="480" src="https://www.youtube.com/embed/3Wf-aehKbuk" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        <hr>
        <h2>Product Category</h2>
        <hr>

        <table id="actual-table">
            <tr>
                <td>
                    <p>
                        <a href="" class="aligncenter" aria-hidden="true">
                        <img src="images/categories/desktop.jpg" alt="Desktop"   width="500" height="300">
                            <header>Desktop PCS</header>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a>
                            <img src="images/categories/external-hdd.jpg" alt="External HDD"    width="500" height="300">
                            <header>External Storage Devices</header>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="#" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/flash-drive.jpg" alt="Flash Drive"    width="500" height="300">
                            <header>Flash Drives</header>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="#" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/headphones.jpg" alt="HeadPhones"   width="500" height="300">
                            <header>Head Phones</header>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="#" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/monitor.jpg" alt="Monitors"    width="500" height="300">
                            <header>Monitors</header>
                        </a>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <a href="#" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/printer.jpg" alt="Printers"    width="500" height="300">
                            <header>Printers</header>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                            <a href="#" aria-hidden="true" class="aligncenter">
                            <img src="images/categories/projector.jpg" alt="Projector"  width="500" height="300">
                            <span>Projectors</span>
                            </a>

                    </p>
                </td>
                <td>
                    <p>
                        <a href="#" class="aligncenter" aria-hidden="true">
                            <img src="images/categories/speakers.jpg" alt="Speaker"   width="500" height="300">
                            <header>Speakers</header>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="#" class="aligncenter" >
                            <img src="images/categories/tablet.jpg" alt="Tablets"    width="500" height="300">
                            <header>Tablets</header>
                        </a>
                    </p>
                </td>
                <td>
                    <p>
                        <a href="#" class="aligncenter">
                            <img src="images/categories/Laptop.jpg" alt="Laptops"   width="500" height="300">
                            <header>Laptops</header>
                        </a>
                    </p>
                </td>
            </tr>
        </table>
        <!--
        <div class="w3-content w3-section">
            <img class="mySlides" src="images/pc1.jpg" style="width:540px" alt="1">
            <img class="mySlides" src="images/pc2.jpg" style="width:540px" alt="2">
            <img class="mySlides" src="images/printer1.jpg" style="width:540px" alt="3">
            <img class="mySlides" src="images/appliances.jpg" style="width:540px" alt="4">
        </div>
        -->
    </section>


<!--footer -->
<?php include 'footer.php';?>
</div>

</body>
</html>

