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
    <?php include "header.php";?>


    <!--Main Navigation Menu -->
    <?php include 'mainnaviation.php';?>

    <!--Main content Menu -->

    <div id="updateproduct">
        <forum>
            <table >
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity Instock</th>
                    <th&nbsp></th>
                    <th>&nbsp</th>
                </tr>
                <tr>
                    <td><input type="button" value="Upload Picture"/></td>
                    <td><input type="text"/></td>
                    <td><input type="text"/></td>
                    <td><input type="text"/></td>
                    <td><input type="radio" name="addremove" value="add"/>Add</br>
                        <input type="radio" name="addremove" value="remove"/>Remove</td>
                    <td><input type="submit"/></td>
                </tr>
            </table>
        </forum>
    </div>
    <!--footer -->
    <?php include 'footer.php';?>
</div>

</body>
</html>
