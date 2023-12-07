<div class="well">
<h2><?php echo __('Cliente'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('nombre'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['CLIENTE']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('rif'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['DESCRIPCION']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('direccion'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['DIRECCION']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>

