<div class="panel panel-default">
	<h4 class="panel-heading" style="margin-top:0px">
		<i class="glyphicon glyphicon-search"></i> Tìm kiếm
	</h4>
	<?php echo $this->Form->create('Book', array('action'=>'get_keyword','novalidate'=>true, "class"=>"form")); ?>
		<?php if (isset($keyword)): ?>
	<?php echo $this->Form->input('keyword', array('value'=>$keyword, 'error'=>false,'label'=>'', 'placeholder'=>'tên sách, tên tác giả,..', "class"=>'col-lg-9', 'div'=>false, 'style'=>'height: 33px; margin-left: 10px;')); ?>
	<?php else: ?>
		<?php echo $this->Form->input('keyword', array('error'=>false,'label'=>'', 'placeholder'=>'tên sách, tên tác giả,..', "class"=>'col-lg-9', 'div'=>false)); ?>
	<?php endif ?>
			<?php echo $this->form->button('Tìm', array('type'=>'submit', 'class'=>'col-lg-2 btn btn-info')); ?>
			<?php echo $this->Form->end(); ?>
	<br></br>
</div>
<div class="panel panel-info">
	<?php echo $this->element('error'); ?>
	<!-- hien thi ket qua tim kiem -->
	<?php if ($notFound == false &&isset($results)): ?>
	<h4 class="panel-heading" style="margin-top:0px">
		<i class="glyphicon glyphicon-th"></i> Kết quả tìm kiếm: <?php echo h($keyword); ?>
	</h4>		
	<?php $this->Paginator->options(array('url'=>$this->passedArgs)); ?>
	<?php echo $this->element('book', array('books'=>$results)); ?>
		
	<?php elseif($notFound): ?>
		Không tìm thấy cuốn sách này!
	<?php endif ?>
<!-- end -->
	
	</div>
<!-- pagination -->
<?php if ($notFound == false &&isset($results)): ?>
	<?php echo $this->element('pagination'); ?>
<?php endif ?>
 <!--end pagination-->