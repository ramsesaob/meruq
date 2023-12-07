<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', ':::Sistema de Pedido:::');
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
         <link rel="icon" href="../webroot/img/url.ico">

        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php 
            echo $this->Html->meta('icon');
            //echo $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no']);
            echo $this->fetch('meta');
            echo $this->Html->meta ( [`name` => `viewport`, `content` => `width=device-width,initial-scale=1`]);
            

            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css');
            echo $this->Html->css('ionicons.min.css');
            echo $this->Html->css('//fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic');
            echo $this->Html->css('CakeAdminLTE');
            echo $this->Html->css('timepicker/bootstrap-timepicker.css');
            echo $this->Html->css('timepicker/bootstrap-timepicker.min.css');
             

            echo $this->fetch('css');
            //echo $this->Html->script('libs/jquery-1.10.2.min');
            //echo $this->Html->script('libs/bootstrap.min');
        //  echo $this->Html->css(array('style.css' ,'bootstrap.min', 'bootstrap-theme.min', 'fileinput.min', 'jquery-ui.min'));
            echo $this->Html->script(array('jquery.min', 'bootstrap.min', 'fileinput.min', 'select2', 'https://code.jquery.com/jquery-3.6.0.min.js'));
            
            echo $this->fetch('script');
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".navar .menu").slimscroll({
                    height: "200px",
                    alwaysVisible: false,
                    size: "3px"
                }).css("width", "100%");

                var a = $('a[href]="<?php echo $this->request->webroot . $this->request->url ?>"]');
                if (!a.parent().hasClass('treeview')){
                    a.parent().addClass('active').parents('.treeview').addClass('active');
                }
                
                
            });
        </script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    
    <body class="skin-blue fixed">

      
                <section class="content">
                <br>
            <div id="msg"></div>
            <br>
            <br>
            <br>

            </a>

                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
                
                </section>
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->
            
        
        
        <?php
            echo $this->Html->script('jquery.min');
            echo $this->Html->script('bootstrap.min');
            echo $this->Html->script('CakeAdminLTE/app');
            echo $this->Html->script('plugins/timepicker/bootstrap-timepicker');
            echo $this->Html->script('plugins/timepicker/bootstrap-timepicker.min');

            
            echo $this->fetch('script');
        ?>
        
    </body>
<script type="text/javascript">
     $(document).ready(function(){
              $("#datepicker_img img").click(function(){
                     $("#datepicker").datepicker(
                    {
                           dateFormat: 'yy-mm-dd',
                           onSelect: function(dateText, inst){
                                 $('#select_date').val(dateText);
                                 $("#datepicker").datepicker("destroy");
                          }
                     }
                     );
               });
        });

  var basePath = "<?php echo Router::url('/'); ?>"
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>