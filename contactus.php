<!DOCTYPE html>
<html lang="en">
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
    <?php include 'header.php'; ?>
</section>

<section id="mainnavigation">
    <?php include 'mainnaviation.php'; ?>
</section>

<section id="conactform">
    <div class="container">
        <h1>Contact Us</h1>
        <hr>
        <table>
            <tr>
                <th><strong>Store Manager:</strong></th>
                <th><strong>Human Resources:</strong></th>
            </tr>
            <tr>
                <td>
                    <p class="address">
                        Luke Vanden Bosch<br/>
                        70 The Pond Road<br/>
                        North York Toronto<br/>
                        Canada<br/>
                        647-555-5555<br/>
                        luke@smarttech.com<br/>
                    </p>
                </td>

                <td>
                    <p class="address">
                        Peter Robinson<br/>
                        71 The Pond Road<br/>
                        North York Toronto<br/>
                        Canada<br/>
                        647-554-4444<br/>
                        peter@smarttech.com<br/>
                    </p>
                </td>
            </tr>
        </table>
        <fieldset>
            <legend><h3>Drop us an Email</h3></legend>

            <form action="contactus.php" method="post" >

                <table>
                    <tr>
                        <td class="headertext">Name</td>
                        <td class="td-element"><input type="text" name="name" placeholder=" Eg. John Doe"></td>
                    </tr>
                    <tr>
                        <td class="headertext">E-mail</td>
                        <td class="td-element"><input type="text" name="email" placeholder=" Eg. email@example.com">
                        </td>
                    </tr>
                    <tr>
                        <td class="headertext">Message:</td>
                        <td class="td-element"><textarea rows="4" cols="10" placeholder=" Type your message here."></textarea></td>
                    </tr>
                    <tr>
                        <td class="headertext"></td>
                        <td><input type="submit" value="Send"></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
</section>

<section id="footer">
    <?php include 'footer.php'; ?>
</section>
</div>
</body>
</html>

