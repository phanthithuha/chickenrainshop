<?php echo $this->Session->flash('cart'); ?>
<?php if ($this->Session->check('cart')): ?>
	<?php $cart = $this->Session->read('cart');?>
	<ul>
	<?php foreach ($cart as $book): ?>
		<li><?php echo $this->html->link($book['title'],'/'.$book['slug']); ?> (<?php echo $this->Number->currency($book['sale_price'], 'VND', array('places' =>0, 'wholePosition'=>'after')); ?>)
		</li>
		<?php endforeach ?>
	</ul>
<!-- <ul> -->
	<?php $total = $this->Session->read('payment.total'); ?>
	<p>
		<button class="pull-right btn btn-default" style=" margin-bottom: 10px;margin-right: 26px;">Tổng: <?php echo $this->Number->currency($total, 'VND', array('places' =>0, 'wholePosition'=>'after')); ?></button>
	</p>
<!-- </ul> -->
<?php echo $this->Html->link('Xem/Cập nhật giỏ hàng','/gio-hang', array('class'=>"btn btn-primary", 'style'=>"margin-bottom: 10px;margin-left: 23px;/* margin-right: 44px; */width: 83%;")); ?>
<?php else: ?>
	Giỏ hàng đang rỗng!
<?php endif ?>