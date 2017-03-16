<?php //pr($this->Session->read('cart')); ?>

<div class="panel panel-info">
	<h4 class="panel-heading" style="margin-top: 0px;">
		<i class="glyphicon glyphicon-bookmark"></i> Chi tiết
	</h4>
	<div class="row">
		<div class="col-lg-3">
			<div class="thumnail">
				<?php echo $this->html->image($book['Book']['image'], array('width'=>'187px','height'=>'180px', "padding-right"=>'5px' )); ?>
			</div>
		</div>
		<div class="col-lg-9">
			<div>
				<h4><?php echo h($book['Book']['title']); ?></h4>
				<p>Tác giả:
					<?php if (!empty($book['Writer'])): ?>
					<?php foreach ($book['Writer'] as $writer): ?>
						<?php echo $this->html->link($writer['name'], '/tac-gia/'.$writer['slug']); ?>
					<?php endforeach; ?>
				<?php else: ?>
					Đang cập nhật
				<?php endif; ?>
				</p>
				<p>
					Nhận xét:
					<?php echo $this->html->link($book['Book']['comment_count'].' nhận xét ', '#nhanxet'); ?>
				</p>
				<p>
					Giá bìa: 
				<?php echo $this->Number->currency($book['Book']['sale_price'], ' VNĐ', array('places'=>0, 'wholePosition'=>'after'));?></p>
				<p>
					Giá bán: 
					<span class="label label-danger">
						<?php echo $this->Number->currency($book['Book']['sale_price'], ' VNĐ', array('places'=>0, 'wholePosition'=>'after'));?></span>	</p>
					
					<?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart"></i> Thêm vào giỏ', '/books/add_to_cart/'.$book['Book']['id'], array('class'=>'btn btn-info', 'escape'=>false)); ?>
					<br><br>
			</div>
		</div>

	</div>
</div>



<!-- hien thi sach lien quan -->
<div class="panel panel-success">
	<h4 class="panel-heading" style="margin-top: 0px">
		<i class="glyphicon glyphicon-list-alt">
		</i>
		 Sách liên quan
	</h4>
	<?php echo $this->element('book', array('books'=>$related_books)); ?>
</div>
<!-- gởi comment -->
	<div class="panel panel-default">
		<h4 class="panel-heading" style="margin-top: 0px">
			<i class="glyphicon glyphicon-comment"></i> Nhận xét
		</h4>
		<div class="row">
			<div class="col-lg-10" style="margin-left:10px;">
				<?php if (!empty($comments)): ?>
					<?php foreach ($comments as $comment): ?>
						<p>
						<strong><?php echo $comment['User']['username']; ?>: </strong>
						<?php echo $comment['Comment']['content']; ?>
						</p>
					<?php endforeach ?>
				<?php else: ?>
					<p>Chưa có nhận xét nào!</p>
				<?php endif ?>
				--------------------------------------------------------------
				<h4>Gửi nhận xét</h4>
				<?php echo $this->element('error'); ?>
				<?php echo $this->Session->flash(); ?>
					<?php echo $this->Form->create('Comment', array('action'=>'add', 'novalidate'=>true)); ?>
					<?php 
						echo $this->Form->input('user_id', array('required'=>false, 'label'=>'','type'=>'hidden', 'value'=>1));
						echo $this->Form->input('book_id', array('required'=>false, 'label'=>'','type'=>'hidden','value'=>$book['Book']['id']));
						echo $this->Form->input('content', array('label'=>'','rows'=>"5", 'class'=>"col-lg-12"));
					 ?>
					<?php echo $this->Form->button('Gửi',array('type'=>"submit", 'class'=>"pull-right btn btn-primary col-lg-3")); ?>
					<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
<!-- end gởi comment -->

