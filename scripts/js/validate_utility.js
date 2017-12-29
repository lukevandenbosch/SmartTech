function Message(var1) {
    alert("Hello " + var1);
}

function validateFields()
{
    //set validation flag
    var status =true;

    //get fields which are to be validated.
    var price =document.getElementById('price').value;
    var quantity =document.getElementById('quantity').value;
    var name =document.getElementById('name').value;

    //reseting fields that contained validation message.
    document.getElementById('pricevalmsg').innerHTML = "";
    document.getElementById('qtyvalmsg').innerHTML ="";
    document.getElementById('namevalmsg').innerHTML ="";

    //building regex validation string
    var regexprice =/^[0-9]+([.][0-9][0-9])?$/; //Float point number for price.
    var regexqty =/^0$|^[1-9][0-9]*$/; //positive integer for quantity

    //Validate Blank fields
    isProductNameBlank = blankFieldValidator(name,"Product Name");
    isPriceBlank = blankFieldValidator(price,"Price");
    isQuantityBlank =  blankFieldValidator(quantity,"Quantity");

    //Validating Numeric format.
    isPriceFormatInvalid = numericFieldValidator(price,"Price",regexprice);
    IsQuanityFormatInvalid = numericFieldValidator(quantity,"Quantity",regexqty);


    //Check if all validation pass
    if(isPriceBlank == false || IsQuanityFormatInvalid ==false || isPriceFormatInvalid ==false ||  IsQuanityFormatInvalid ==false  || isProductNameBlank ==false)
    {
        //output a single message if validation fails
        alert("Validation Failed. There were some issues with your submission. Please review the message beside each field.");
        status =false;
    }

    //returning the status of validation. False will stop the form from being submitted while true will allow it to be submitted.
    return status;
}


function blankFieldValidator(field,fieldName) {

   if (field.length == 0 || field=="" ) {


       //build message for failed validation.
       var msg =  "Field '" + fieldName + "' cannot be left empty.";
       // alert(msg);

       //field out which field is being process.
        if(fieldName=="Price")
        {
            //output the validation result in beside the price textbox.
             document.getElementById('pricevalmsg').innerHTML = msg;


        }else if(fieldName=="Quantity")
        {
            //output the validation result in beside the Quantity textbox.
            document.getElementById('qtyvalmsg').innerHTML = msg;

        }else
        {
            //output the validation result in beside the name textbox.
            document.getElementById('namevalmsg').innerHTML = msg;
        }
        return false;
    }
    return true;
}

function numericFieldValidator(fieldValue, fieldName, regex) {

    //check the value is a number.
    if (isNaN(fieldValue) ) {

        //build message for failed validation.
        var msg = "Field '" + fieldName + "' must be a positive number.";
       // alert(msg);

        //field out which field is being process.
        if(fieldName=="Price")
        {
            //output the validation result in beside the price textbox.
            document.getElementById('pricevalmsg').innerHTML = msg;

        }else if(fieldName=="Quantity") {

            //output the validation result in beside the quantity textbox.
            document.getElementById('qtyvalmsg').innerHTML = msg;

        }
        return false;

        }else if (!regex.test(fieldValue))
    {

        //build message for failed validation for regex.
        var msg = "An Invalid value of '" + fieldValue + "' was provided for field '" + fieldName + "' . Please ensure the '" + fieldName + "' has a positive value."

       // alert(msg);

        //field out which field is being process.
        if(fieldName=="Price")
        {
            //output the validation result in beside the price textbox.
            document.getElementById('pricevalmsg').innerHTML = msg;

        }else if(fieldName=="Quantity") {

            //output the validation result in beside the quantity textbox.
            document.getElementById('qtyvalmsg').innerHTML = msg;

        }
        return false;
    }
    return true
}

function subsription() {

    //retrieving value from textbox
     var email =document.getElementById('footer-email').value.toUpperCase();
     alert(email);

     //regex validation
    //var regex =/^[A-Za-z0-9]+([.][A-Za-z0-9]+)?@[A-Za-z0-9]{2,3}$/;
    var regex =/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,}$/


    if (email.length == 0 || email=="" ) {

        alert("No email address was provided. Please enter a valid email address ");

       return false;

    } else if (!regex.test(email)) {

        alert("Could not valid email address. Please enter a valid email address ");

        return false;

    } else {

        alert("Your email '" + email + "' was verified. Thank you for subscribing to Inventory Alert.You will be notified on arrival of new stocks and will also receive alerts with the Inventory is low.");
        ;
    }
    return true;
}