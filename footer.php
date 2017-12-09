<?php

$var ='<div  id="footer-widgets" ><div class="container"><div class="inner-wrapper"><div class="footer-active-1 footer-widget-area">
        <footer class="container-fluid text-center">
            <form class="form-inline">Subscribe to hot deals:
                <input type="email" class="form-control" size="50" placeholder="Email Address">
                <button type="button" class="btn btn-danger">Subscribe now</button>
             </form>
                 <br/>
         </footer>
    </div>
    </div>
    </div>';
$var =$var."<p style=\"text-align:center\" class=\"copyright\"'>Smart Tech Copyright &copy; " . date("Y") . " SmartTech.com</p>";

echo $var;
?>