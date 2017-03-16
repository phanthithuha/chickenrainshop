<?php echo $this->Form->create('Book', array('action'=>'get_keyword','novalidate'=>true)); ?>
<?php if (isset($keyword)): ?>
	<?php echo $this->Form->input('keyword', array('value'=>$keyword, 'error'=>false,'label'=>'', 'placeholder'=>'Gõ vào từ khóa để tìm kiếm...')); ?>
<?php else: ?>
	<?php echo $this->Form->input('keyword', array('error'=>false,'label'=>'', 'placeholder'=>'Gõ vào từ khóa để tìm kiếm...')); ?>
<?php endif ?>

<?php echo $this->Form->end('Search'); ?>

<?php if (isset($errors)): ?>
	<?php foreach ($errors as $error): ?>
		<?php echo $error[0]; ?>
	<?php endforeach ?>
<?php endif ?>
<!-- hien thi ket qua tim kiem -->
<?php if ($notFound == false &&isset($results)): ?>
	Kết quả tìm kiếm của từ khóa <strong><?php echo $keyword; ?></strong><br><br>
	<?php echo $this->element('book', array('books'=>$results)); ?>
	<?php echo $this->element('pagination', array('object'=>'quyển sách')); ?>
<?php elseif($notFound): ?>
	Không tìm thấy cuốn sách này!
<?php endif ?>
<!-- end -->