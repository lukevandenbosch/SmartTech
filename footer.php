<?php

/*
 * This is the content for the footer.
 */
$var ='
<div  id="footer-widgets">
<div class="container">
    <div class="inner-wrapper">
        <div class="footer-widget-area">
            <footer class="text-center">
                <form id="formfooter" class="white-text">Subscribe Inventory Alert:
                    <input type="email" class="form-control" id="footer-email" size="50" placeholder="Email Address"/> 
                    <button type="button" class="" onclick="subsription()">Subscribe now</button>
                 </form>                                  
            </footer>           
        </div>        
    </div>
     <p style="text-align:center;" class="copyright">Smart Tech Copyright &copy; '. date("Y") . ' SmartTech.com</p>
</div>
</div>';
echo $var;
?>