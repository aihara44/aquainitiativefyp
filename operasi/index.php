<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    include ("../connection.php");

    $msg = "";

     if(isset($_SESSION["operasi"])){
        $msg='<div id="login-alert" class="alert alert-success col-sm-12">Assalamualaikum <b>'.$_SESSION["operasi"].'</b>!</div>';
    }
    
    
?>
<?php include ("header2.php"); ?>
<body>
        <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="col-md-12">
                <?php include ("leftmenu.php"); ?>
            </div>
            </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="col-md-12">
              <?php echo $msg; ?>
              </div>
          </div>
        </div>
</body>
        <script>
            $(document).ready(function(){
                $("#btn_username").click(function(e){
                    if($("#username").val() == ''){
                        $("#username").css("border-color","#DA1908");
                        $("#username").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_username').unbind('submit').submit();
                    }
                });
                
                $("#btn_password").click(function(e){
                    if($("#password").val() == ''){
                        $("#password").css("border-color","#DA1908");
                        $("#password").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_password').unbind('submit').submit();
                    }
                });
            });
      </script>
