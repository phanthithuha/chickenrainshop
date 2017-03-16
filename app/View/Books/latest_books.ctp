<!-- new element -->
<div class="panel panel-info">
	<h4 class="panel-heading" style="margin-top: 0px;">
		<i class="glyphicon glyphicon-th"></i>
		Sách mới:
		<small class="pull-right">Sắp xếp theo: 
			<?php 
			echo $this->Paginator->sort('title', 'tên');
			?> . 
			<?php
			echo $this->Paginator->sort('created', 'cũ/mới');
			?>
		</small>
	</h4>
	<?php echo $this->element('book', array('books'=>$books)); ?>
</div> <!--end element-->
	<!-- pagination -->
	<?php echo $this->element('pagination'); ?>

	<!--end pagination-->