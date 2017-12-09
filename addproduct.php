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
                <form>
                    <table>
                        <tr>
                            <td class="headertext">Name</td>
                            <td class="td-element"><input type="text" placeholder="eg. MacBook Pro"/></td>
                        </tr>
                        <tr>
                            <td class="headertext">Price</td>
                            <td class="td-element"><input type="text" placeholder="eg. 1999"/></td>
                        </tr>
                        <tr>
                            <td class="headertext">Quantity Instock</td>
                            <td class="td-element"><input type="text" placeholder="eg. 25"/></td>
                        </tr>
                        <tr>
                            <td class="headertext">Picture</td>
                            <td class="td-element"><input type="button" value="Upload Picture"/></td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <hr>
                                <input type="button" value="Add Product"/></td>

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
