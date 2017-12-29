function Message(var1) {
    alert("Hello " + var1);
}

function validateFields()
{

    //fields to be validated.
    var price =document.getElementById('price').value;
    var quantity =document.getElementById('quantity').value;


    //Regex validation string
    var regexprice =/^[0-9]+([.][0-9][0-9])?$/;
    var regexqty =/^[0-9]{1,1}|([1-9]|[0-9]){1,}$/;

    //Validate Blanks
    blankFieldValidator(price,"Price");
    blankFieldValidator(quantity,"Quantity");


    //Validator Numeric format.
    numericFieldValidator(price,"Price",regexprice);
    numericFieldValidator(quantity,"Quantity",regexprice);

    return false;
}


function blankFieldValidator(field,fieldName) {

   if (field.length == 0 || field=="" ) {
        alert("Field '" + fieldName + "' cannot be left empty. Please provide a value.");
        return false;
    }
}

function numericFieldValidator(fieldValue, fieldName, regex) {

    if (isNaN(fieldValue) ) {

        alert("Field '" + fieldName + "' must be a positive number.");
        return false;

    }else if (!regex.test(fieldValue))
    {
        alert("An Invalid value of '" + fieldValue + "' was provided for field '" + fieldName + "' . Please ensure the '" + fieldName + "' has a positive value.");
        return false;
    }
    return true
}

function subsription() {

    //retrieving value from textbox
     var email =document.getElementById('footer-email').value;

     //regex validation
    var regex =/^[A-Za-z0-9]+([.][A-Za-z0-9]+)?@[A-Za-z0-9]{2,3}$/;

    if (email.length == 0 || email=="" ) {
        alert("No email address was provided. Please enter a valid email address ");
       return false;
    } else if (regex.test(email)) {
        alert("Could not valid email address. Please enter a valid email address ");
        return false;

    } else {

        alert("Your email '" + email + "' was verified. Thank you for subscribing to Inventory Alert.You will be notified on arrival of new stocks and will also receive alerts with the Inventory is low.");
        ;
    }
}