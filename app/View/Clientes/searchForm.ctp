<!DOCTYPE html>
<html>

<head>
<?php echo $this->Html->script(array('addtocart3.js'), array('inline' => false)); ?>
    <title>How to Load data using jQuery AJAX in Select2 – CakePHP 4</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    <div class="container" style="margin-top: 40px;">
        <div class="panel panel-primary">
            <div class="panel-heading">CakePHP 4 Load Data using jQuery AJAX in Select2</div>
            <div class="panel-body">
                <p>
                    <label>Select Country</label>
                </p>
                 <select DESCRIPCION="dd_cliente" id="dd_cliente" class="form-group">
                    <option value='0'>-- Select Client --</option>
                </select>
            </div>
        </div>
    </div>

   

</body>

</html>
