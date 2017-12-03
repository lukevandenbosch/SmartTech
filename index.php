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
        <img src ="appliances.jpg" alt="template"  style="display: block;margin: auto;width: 40%;"/>
    </section>


<!--footer -->
<?php include 'footer.php';?>
</div>

</body>
</html>

