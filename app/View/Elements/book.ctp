	<div class="row" style="margin-left:15px;">
		<?php foreach($books as $book): ?>
		<div class="content col col-lg-3"  style="margin-top: 30px;">
			<div class="img-thumbnail" style="">
			<?php echo $this->html->link($this->Html->image($book['Book']['image'], array('width'=>'187px','height'=>'180px', "padding-right"=>'5px' )), '/'.$book['Book']['slug'], array('escape'=>false));?>
				<div class="caption book-info">
					<h4><?php echo $this->html->link($book['Book']['title'], '/'.$book['Book']['slug']);?></h4>
					<?php
						foreach ($book['Writer'] as $writer) {
							echo $this->Html->link($writer['name'],'/tac-gia/'.$writer['slug'],array('class'=>'author')).' ';
						}
					?>
					<p class="price">Giá: <?php echo $this->Number->currency($book['Book']['sale_price'], ' VNĐ', array('places'=>0, 'wholePosition'=>'after'));?></p>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div><br>
	<!-- end row -->	
	<!-- margin-bottom: 30px;padding-top: 10px; padding-left: 10px; padding-right: 10px; -->