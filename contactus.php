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
<table>
    <tr>
    <th>
    <h2>Store Manager:</h2>
    <h3>Luke Vanden Bosch</h3>
    <h3>70 The Pond Road</h3>
    <h3>North York Toronto</h3>
    <h3>Canada</h3>
    <h3>647-555-5555</h3>
    <h3>luke@smarttech.com</h3>
    </th>
    <th>
    <h2>Human Resources:</h2>
    <h3>Peter Robinson</h3>
    <h3>71 The Pond Road</h3>
    <h3>North York Toronto</h3>
    <h3>Canada</h3>
    <h3>647-554-4444</h3>
    <h3>peter@smarttech.com</h3>
    </th>
    </tr>
</table>
    <fieldset>
        <legend><h3>Drop us an Email</h3></legend>

<form action="contactus.php" method="post">

    <table border ="0">
        <tr>
            <td class="headertext">Name</td>
            <td class="td-element"> <input type="text" name="name" placeholder=" Eg. John Doe"></td>
        </tr>
        <tr>
            <td class="headertext">E-mail</td>
            <td class="td-element"> <input type="text" name="email" placeholder=" Eg. email@example.com"></td>
        </tr>
        <tr>
            <td class="headertext">Message:</td>
            <td class="td-element"> <textarea rows="4" cols="10" placeholder=" Type your message here."></textarea></td>
        </tr>
        <tr>
            <td class="headertext"></td>
            <td ><input type="submit" value="Send"></td>
        </tr>
    </table>
</form
    </fieldset>
</div>
<footer>
<?php include 'footer.php';?>
</footer>
</body>
</html>

