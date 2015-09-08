<?php
    if( !defined('RESTRICTED') ) exit('No direct script access allowed!');
    if (isset($_POST['submit'])) {
        if (login($_POST['username'], $_POST['password'])) {
            redirectPage("index.php?p=home");
        }
    }
?>
<div id="login_page">
    <div class="panel panel-signin">
        <div class="panel-body">
            <h4 class="text-center mb5">Log In</h4>
            <form action="" method="post">
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div><!-- input-group -->
                
                <div class="clearfix">            
                    <div class="pull-right">
                        <button name="submit" type="submit" class="btn btn-success">Sign In <i class="fa fa-angle-right ml5"></i></button>
                    </div>
                </div>                      
            </form>
        </div>
    </div>
</div>