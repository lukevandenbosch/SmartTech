<?php

//Include database class
include "inc/MySQLConnection.php";
$uploadBaseDirecotry = 'images/';


/* used to turn on error displays for debugging only
        echo ini_get('display_errors');

        if (!ini_get('display_errors')) {
            ini_set('display_errors', '1');
        }
        echo ini_get('display_errors');
        */


/* Check if there was a page post before retrieve form values and processing page.*/

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    //Determine the full path where the to be uploaded will reside ( will be saved)
    $fileToUpload = $uploadBaseDirecotry . basename($_FILES['file']['name']);

    //Create a link of valid file extension. This prevent  not pictures(exe, pdf,doc etc) from being uploaded.
    $validFileExtensions = array("JPEG", "JPG", "PNG","GIF");

    //using the explode function to split the file name seperating the name from the  extension.
    $fileNameArray = explode(".", $_FILES["file"]["name"]);

    // using the end function to get the last element in the array which is the extension and then converting the extension to upper case for standardization.
    $fileExtension = strtoupper(end($fileNameArray));


    //this will be used for setting flag  to indicate when there is issue with any of the form fields. In the server validation section.
    $isEntryValid=true;

    //this will be store a list of messages to be error message for the server side validation. if there are any.
    $validationMessage="";


    /* The below section handles the processing of the image to be uploaded. */


    //Checking if a file is present in the file array of the submitted form.
    if(strlen(trim($_FILES["file"]["name"]))== 0)
    {

        //if no image is provided used the place holder image.
        $validationMessage =  $validationMessage."<li class=\"warn\"> Warning: since no image is was provided, the default placeholder file will be used.</li>";
        $fileToUpload = "images/placeholder.jpg";
    }


    //this condition ensures that only the specified file extensions are accepted.
    else  if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($fileExtension, $validFileExtensions)) {


        //The file might an issue with the file itself.
        if ($_FILES["file"]["error"] > 0) {

           $validationMessage =  $validationMessage. "$file". "There was an  issue with the image file  Error Code: " . $_FILES["file"]["error"] ;

        } else {


            //Check the the file to be uploaded does not already exist. This is to ensure that there are not duplicated images.
            if (file_exists("images/" . $_FILES["file"]["name"])) {

                /*
                /* if the that will be uploaded already exists. The default placeholder file will be used.
                *  add a validation messaage.
                *  Set the IsEntryValidation false to true. This is to ensure  that a file name that already exist does not prevent a product from being added.
                */
                $isEntryValid=true;
                $file = $_FILES['file']['name'];
                $validationMessage =  $validationMessage."<li class=\"warn\"> Warning: file <strong>'$file'</strong> already exists. the default placeholder file will be used.</li>";
                $fileToUpload = "images/placeholder.jpg";

            } else {

                //The move_uploaded_file is used to upload image the images directory using the full file path stored in 'FileToUpload'
                if (move_uploaded_file($_FILES['file']['tmp_name'], $fileToUpload)) {

                    //this mean the file was successfully uploaded. There output the appropriate message.
                    $validationMessage = $validationMessage . "<li class=\"success\">The file was succesfully uploaded to: <strong>'$fileToUpload'</strong></li>";

                } else {

                    //this mean the file was not uploaded. Therefore set the invalid flag output the appropriate message.
                    $isEntryValid=false;
                    $validationMessage = $validationMessage . "<li class=\"error\">The file failed to uploaded to: <strong>'$fileToUpload'</strong></li>";
                }
            }
        }
    }else
    {
        //If the file is invalid for any other reason.
        $isEntryValid=false;
        $file = $_FILES['file']['name'];
        $validationMessage = $validationMessage . "<li class=\"error\">field: <strong>'$file'</strong> is file. Possible the file has an unsupported file extension.</li>";
       // return;

    }

    /* End  image processing section. */



    /* Server Side Validation of form fields. */


    //get post values from form.
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $imagepath =$fileToUpload; // image path is stored in this location.

    //generic validation looping through all post variables and check if the varables have  any content or empty.
    foreach($_POST as $field=>$value) {
        if (strlen(trim($_POST[$field])) == 0) {
            $isEntryValid = false;
            $fieldname = strtoupper($field);
            $validationMessage = $validationMessage . "<li class=\"error\">field: <strong>'$fieldname'</strong> is required and cannot be empty</li>";

        }
    }

    //validating numeric form fields both price and quantity. ensuring that the data is numeric
    if (!is_numeric($price)) {

        $isEntryValid = false;
        $validationMessage =$validationMessage. "<li class=\"error\">field: <strong>PRICE</strong> must be a numeric value</li>";


    }
    if (!is_numeric($quantity)) {

        $isEntryValid = false;
        $validationMessage =$validationMessage. "<li class=\"error\">field: <strong>QUANTITY</strong> must be a numeric value</li>";


    }

    if($price < 0)
    {
        $isEntryValid = false;
        $validationMessage =$validationMessage. "<li class=\"error\">field: <strong>PRICE</strong> must be a positive number.</li>";
    }
    if($quantity < 0)
    {
        $isEntryValid = false;
        $validationMessage =$validationMessage. "<li class=\"error\">field: <strong>QUANTITY</strong> must be a postive number.</li>";
    }

    //Database Access

    $connection = new MySQLConnection("default");

    //Opening the db Connection
    $state = $connection->OpenConnection();

    if($state) //if connection was successfull, then proceed with getting the information from the form and writing to the db.
    {

        //If all form field pass the validation, then proceed with adding the entry to the database.

        if($isEntryValid==true) {

            //build insert query
            $query = "INSERT INTO products(Name,Category,Price,Qty,ImagePath) values('$name','$category',$price,$quantity,'$imagepath')";

            //result result of query processing
            $rowsaffected = $connection->ExecuteUpdateInsertDelete($query);

            //check whether or not record was inserted.  This is handled in  form section further down.
            if (!empty($rowsaffected)) {

                //echo "$rowsaffected record was successfully added!";
            } else {
                // echo "Inset Failed!";
            }
        }
    }



}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Smart Tech Supplies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="scripts/css/theme.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <style></style>
    <script src="scripts/js/validate_utility.js"></script>
</head>
<body>

<div class="container">

    <!--This section  contains the header page which is included using the PHP function. -->
    <section id="header">
        <?php include "header.php"; ?>
    </section>


    <!--This section contains the main navigation links which is included using the PHP function. -->
    <section id="mainnavigation">
        <?php include 'mainnaviation.php'; ?>
    </section>


    <!--Main This section contains the main content for the page. Menu -->
    <section id="main-content">
        <!--Main content Menu -->
        <section id="section-addform">
            <hr>
            <h2>Adding New Products</h2>


            <?php

            /* PHP scripts for  display the appropirate message to end user per the result of processing. */

            //This  checks if the page was submitted by a POST.
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if($isEntryValid==true) {


                    //this variable contains the results of the insert query. If may be null/empty or contains an integer values indicating how much record was inserted. Should allways be one(1).

                    if ($rowsaffected) {
                        echo "<p class =\"success\">The product was succesfully inserted. $rowsaffected record added. </p>";

                        if(strlen($validationMessage) > 0)
                        {
                            echo "<h3>Validation Summary</h3><ul class =\"error\">$validationMessage</ul>";
                        }
                    } else {
                        echo "<p class =\"error\">Adding product failed. </p>";
                    }
                }else{
                    echo "<h3>Validation Summary</h3><ul class =\"error\">$validationMessage</ul>";
                }
            }
            ?>
            <hr>
            <div id="updateproduct">
                <form  id="addform" name="addform" method="POST" action="addproduct.php"  enctype="multipart/form-data" onsubmit="return validateFields()">
                    <table>
                        <tr>
                            <td class="headertext">Name</td>
                            <td class="td-element"><input type="text" name="name" id="name"  placeholder="eg. MacBook Pro"/> <span class="required">*</span><span  class="error" id="namevalmsg"></span></td>
                        </tr>
                        <tr>
                            <td class="headertext">Category</td>
                            <td class="td-element"><select name="category">
                                    <option value="Laptop">Laptop</option>
                                    <option value="Desktop">Desktop</option>
                                    <option value="External">External Storage</option>
                                    <option value="Flash Drives">Flash Drives</option>
                                    <option value="HeadPhone">Headphone</option>
                                    <option value="Monitor">Monitor</option>
                                    <option value="Printers">Printers</option>
                                    <option value="Projectors">Projectors</option>
                                    <option value="Speakers">Speakers</option>
                                    <option value="Tablets">Tablets</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="headertext">Price</td>
                            <td class="td-element"><input type="text" name="price" id="price" placeholder="eg. 1999"/> <span class="required">*</span> <span  class="error" id="pricevalmsg"></span></td>
                        </tr>
                        <tr>
                            <td class="headertext">Quantity Instock</td>
                            <td class="td-element"><input type="text" name="quantity" id="quantity" placeholder="eg. 25"/> <span class="required">*</span> <span  class="error" id="qtyvalmsg"></span></td>
                        </tr>
                        <tr>
                            <td class="headertext">Picture</td>
                            <td class="td-element"><input type="file"  name="file"/> <br/>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <hr>
                                <input type="submit" value="Add Product"/></td>

                        </tr>
                    </table>
                </form>
            </div>
        </section>

    </section>


    <!--Main This section contains the footer content for the page. -->

    <section id="footer">
    <?php include 'footer.php'; ?>
</section>
</div>

</body>
</html>
