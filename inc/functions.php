<?php

function header()
{
  return "my header";
}
function footer()
{
     echo "<p>Copyright &copy; 1999-" . date("Y") . " SmartTech.com</p>";
}
function navigation()
{
    return "my navigation";
}

footer();
