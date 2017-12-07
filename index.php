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
        <iframe width="854" height="480" src="https://www.youtube.com/embed/3Wf-aehKbuk" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen style="width:100%"></iframe>
        <hr>
        <h2>Features Products</h2>
        <hr>
        <div class="w3-content w3-section">
            <img class="mySlides" src="images/pc1.jpg" style="width:540px" alt="1">
            <img class="mySlides" src="images/pc2.jpg" style="width:540px" alt="2">
            <img class="mySlides" src="images/printer1.jpg" style="width:540px" alt="3">
            <img class="mySlides" src="images/appliances.jpg" style="width:540px" alt="4">
        </div>
    </section>
    </section>


<!--footer -->
<?php include 'footer.php';?>
</div>
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
    }
</script>
</body>
</html>

