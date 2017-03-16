<div class="categories index">
	<h2><?php echo __('Các Danh Mục Sách');?></h2>
	<p>
		<?php 
			echo $this->Paginator->sort('name', 'Xếp theo thứ tự ngược lại');
		?>
	</p>
	<?php
		foreach ($categories as $category):
	?>
	<?php
		echo h($category['Category']['name']);?><br>
		<?php endforeach; ?>
	<br>
		<?php echo $this->element('pagination', array('object'=>'danh mục')); ?>

</div>