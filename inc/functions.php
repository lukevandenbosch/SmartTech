<?php


function footer()
{
    $var ='
            <div  id="footer-widgets">
            <div class="container">
                <div class="inner-wrapper">
                    <div class="footer-widget-area">
                        <footer class="text-center">
                            <form class="white-text">Subscribe Inventory Alert:
                                <input type="email" class="form-control" size="50" placeholder="Email Address"/> 
                                <button type="button" class="">Subscribe now</button>
                             </form>                                  
                        </footer>           
                    </div>        
                </div>
                 <p style="text-align:center;" class="copyright">Smart Tech Copyright &copy; '. date("Y") . ' SmartTech.com</p>
                </div>
            </div>';
    return $var;
}
