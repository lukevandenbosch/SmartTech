<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Tech Supplies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="theme.css">
    <style></style>
</head>
<html>
<body>
<div class="container"
<?php include 'header.php';?>
<?php include 'mainnaviation.php';?>
</div>

<div class="container">
<h1>Contact Us</h1><hr>
    <h2>Store Manager:</h2>
    <h3>Luke John Doe</h3>
    <h3>70 The Pond Road John Doe</h3>
    <h3>North York Toronto</h3>
    <h3>Canada</h3>
    <br/>
    <h3>Peter John Doe</h3>
    <h3>70 The Pond Road John Doe</h3>
    <h3>North York Toronto</h3>
    <h3>Canada</h3>


<form action="contactus.php" method="post">
    <h3 style="text-align: center">Drop us an Email</h3>
    <table border ="0">
        <tr>
            <td class="headertext">Name</td>
            <td class="td-element"> <input type="text" name="name"></td>
        </tr>
        <tr>
            <td class="headertext">E-mail</td>
            <td class="td-element"> <input type="text" name="email"></td>
        </tr>
        <tr>
            <td class="headertext">Message:</td>
            <td class="td-element"> <textarea rows="4" cols="10"></textarea></td>
        </tr>
        <tr>
            <td class="headertext"></td>
            <td ><input type="submit" value="Send"></td>
        </tr>
    </table>
</form
</div>
<footer>
<?php include 'footer.php';?>
</footer>
</body>
</html>

