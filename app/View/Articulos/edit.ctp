

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->create('Articulo', array('type' => 'file', 'novalidate' => 'novalidate' )); ?>
                <fieldset>
                    <legend><?php echo __('Edit Articulo'); ?></legend>
                <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('foto', array('type' => 'file', 'label' => 'Foto', 'id' => 'foto', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true' ));
                    echo $this->Form->input('foto_dir', array('type' => 'hidden'));
                     echo $this->Form->input('ARTICULO', array('class' => 'form-control', 'label' => 'Nombre de ARTICULO', 'placeholder' => 'Escriba el Nombre de ARTICULO aqui...'));
            echo $this->Form->input('DESCRIPCION', array('class' => 'form-control', 'label' => 'Nombre de DESCRIPCION', 'placeholder' => 'Escriba el Nombre de DESCRIPCION aqui...'));
     

            
            echo $this->Form->input('MARCA', array('class' => 'form-control', 'label' => 'Nombre de MARCA', 'placeholder' => 'Escriba el Nombre de MARCA aqui...'));
            echo $this->Form->input('UNIDAD', array('class' => 'form-control', 'label' => 'Nombre de UNIDAD', 'placeholder' => 'Escriba el Nombre de UNIDAD aqui...'));
            echo $this->Form->input('CATEGORIA', array('class' => 'form-control', 'label' => 'Nombre de CATEGORIA', 'placeholder' => 'Escriba el Nombre de CATEGORIA aqui...'));
            echo $this->Form->input('STOCKMINIMO', array('class' => 'form-control', 'label' => 'Nombre de STOCKMINIMO', 'placeholder' => 'Escriba el Nombre de STOCKMINIMO aqui...'));
            echo $this->Form->input('REPOSICION', array('class' => 'form-control', 'label' => 'Nombre de REPOSICION', 'placeholder' => 'Escriba el Nombre de REPOSICION aqui...'));
            echo $this->Form->input('IVA', array('class' => 'form-control', 'label' => 'Nombre de IVA', 'placeholder' => 'Escriba el Nombre de IVA aqui...'));
           
            echo $this->Form->input('CIF', array('class' => 'form-control', 'label' => 'Nombre de CIF', 'placeholder' => 'Escriba el Nombre de CIF aqui...'));
            echo $this->Form->input('TIPO', array('class' => 'form-control', 'label' => 'Nombre de TIPO', 'placeholder' => 'Escriba el Nombre de TIPO aqui...'));
            echo $this->Form->input('GARANTIA', array('class' => 'form-control', 'label' => 'Nombre de GARANTIA', 'placeholder' => 'Escriba el Nombre de GARANTIA aqui...'));
            echo $this->Form->input('DESCUENTO', array('class' => 'form-control', 'label' => 'Nombre de DESCUENTO', 'placeholder' => 'Escriba el Nombre de DESCUENTO aqui...'));
            echo $this->Form->input('USUARIO', array('class' => 'form-control', 'label' => 'Nombre de USUARIO', 'placeholder' => 'Escriba el Nombre de USUARIO aqui...'));
           
            echo $this->Form->input('EMPAQUE', array('class' => 'form-control', 'label' => 'Nombre de EMPAQUE', 'placeholder' => 'Escriba el Nombre de EMPAQUE aqui...'));
            echo $this->Form->input('EAN', array('class' => 'form-control', 'label' => 'Nombre de EAN', 'placeholder' => 'Escriba el Nombre de EAN aqui...'));
            echo $this->Form->input('GRUPO', array('class' => 'form-control', 'label' => 'Nombre de GRUPO', 'placeholder' => 'Escriba el Nombre de GRUPO aqui...'));
            echo $this->Form->input('CBM', array('class' => 'form-control', 'label' => 'Nombre de CBM', 'placeholder' => 'Escriba el Nombre de CBM aqui...'));
            echo $this->Form->input('VENTA', array('class' => 'form-control', 'label' => 'Nombre de VENTA', 'placeholder' => 'Escriba el Nombre de VENTA aqui...'));
            echo $this->Form->input('CIFM', array('class' => 'form-control', 'label' => 'Nombre de CIFM', 'placeholder' => 'Escriba el Nombre de CIFM aqui...'));
            echo $this->Form->input('MODELO', array('class' => 'form-control', 'label' => 'Nombre de MODELO', 'placeholder' => 'Escriba el Nombre de MODELO aqui...'));
           
            echo $this->Form->input('NROUNICO', array('class' => 'form-control', 'label' => 'Nombre de NROUNICO', 'placeholder' => 'Escriba el Nombre de NROUNICO aqui...'));
            echo $this->Form->input('PUNTOS', array('class' => 'form-control', 'label' => 'Nombre de PUNTOS', 'placeholder' => 'Escriba el Nombre de PUNTOS aqui...'));
            echo $this->Form->input('UBICACION', array('class' => 'form-control', 'label' => 'Nombre de UBICACION', 'placeholder' => 'Escriba el Nombre de UBICACION aqui...'));
            echo $this->Form->input('SUBGRUPO', array('class' => 'form-control', 'label' => 'Nombre de SUBGRUPO', 'placeholder' => 'Escriba el Nombre de SUBGRUPO aqui...'));
            echo $this->Form->input('EQUIVALENTE', array('class' => 'form-control', 'label' => 'Nombre de EQUIVALENTE', 'placeholder' => 'Escriba el Nombre de EQUIVALENTE aqui...'));
            echo $this->Form->input('NROPARTES', array('class' => 'form-control', 'label' => 'Nombre de NROPARTES', 'placeholder' => 'Escriba el Nombre de NROPARTES aqui...'));
            echo $this->Form->input('APOYO', array('class' => 'form-control', 'label' => 'Nombre de APOYO', 'placeholder' => 'Escriba el Nombre de APOYO aqui...'));

                   
                ?>
                </fieldset>
                <p>
                    <?php echo $this->Form->end(array('label' => 'Editar Articulo', 'class' =>'btn btn-success')); ?>
                </p>

            
        </div>
    </div>
</div>
