<!DOCTYPE html>
<html>
    <head>
  


             <meta charset="utf-8">
                      <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <title>Incio de Sessión App Pedido</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <meta name="description" content="">
                            <meta name="author" content="">
                            <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                            <?php 
                            echo $this->Html->meta('icon');
                       //     echo $this->Html->css('bootstrap.min.css');
                            echo $this->Html->css('/css/style2'); 
                            ?>
                     
                      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                      <!--[if lt IE 9]>
                      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                      <![endif]-->
                       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                      <!-- Bootstrap 3.3.6 -->
                      
                      <!-- Font Awesome -->

                      <!-- Ionicons -->
                      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
                      <!-- Theme style -->

                      <!-- iCheck -->
                      <style>
                    img {
                        border-radius: 8px; position:relative; bottom:-100px;
                       position:relative; right:6%; width: 300px;;
                      
                    } 
                    div.polaroid {
                      width: 100%;

                    }


        </style>
  </head>



   <body> 
        <div class="polaroid">

 
 

 
 <TABLE width= 100% align="left">
  <TR>
 <!--<TD  align="right"> <?= $this->Html->image('login.png'); ?>
    
 </TD>-->
    <TD ROWSPAN=2 align="center"><p> <h1>Inicio de Sesión</h1>
            
    <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?> </p>
      <div class="error"><span>+</span></div>
          
       
               O puedes conectarte a:
                <br>
                     <div class="connect">
                    <a class="facebook" style="font-size:40px;color:white" href="https://m.facebook.com/meruqve/"></a>
               <a class="twitter" href=""></a>
                  <a  class="fa fa-instagram" style="font-size:40px;color:white" href="https://instagram.com/meruqve?igshid=NjIwNzIyMDk2Mg=="> </a>
            </div>
        </div></TD>
       <!-- <td><?= $this->Html->image('logo control fiscal.png'); ?></td>-->
  
  </TR>
 
  
</TABLE>
        
      </p>    

              
                
<?php echo $this->Html->script('/js/jquery.min.js'); ?>
<!-- Bootstrap 3.3.6 -->
<?php echo $this->Html->script('/js/supersized.min.js'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('/js/supersized-init.min.js'); ?>
<?php echo $this->Html->script('/js/scripts.min.js'); ?>
<!-- Bootstrap 3.3.6 -->
<?php echo $this->Html->script('/js/bootstrap.min.js'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('/js/icheck.min.js'); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '100%' // optional
    });
  });
</script>

    </body>

</html>

