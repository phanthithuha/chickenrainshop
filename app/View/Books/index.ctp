
<!-- new book -->
<div class="panel panel-info">
	<h4 class="panel-heading" style="margin-top: 0px;">
		<i class="glyphicon glyphicon-bookmark"></i> Sách mới
		<?php echo $this->Html->link('(Xem tất cả->)','/sach-moi', array('class'=>"more")); ?>
	</h4>
	<?php echo $this->element('book', array('books'=>$books)); ?>
					
</div>
<div class="panel panel-info">
	<h4 class="panel-heading" style="margin-top:0px">
		<i class="glyphicon glyphicon-fire"></i> Sách bán chạy
		<a class="more" href="">(Xem tất cả->)</a>
	</h4><br>
	<div class="container-fluid">
	<div class="row">
		<div class="content col col-lg-3"">
			<div class="book-thumnail thumnail">
				<img src="http://placehold.it/140x200" alt="">
				<div class="caption book-info">
					<h4>Chuyện cổ tích dành cho người lớn</h4>
					<a class="author" href="">Nguyễn Nhật Ánh</a>
					<p class="price">Giá: 100,000đ</p>
				</div>
			</div>
		</div>
		<div class="content col col-lg-3">
			<div class="book-thumnail thumnail">
				<img src="http://placehold.it/140x200" alt="">
				<div class="caption book-info">
					<h4>Chuyện cổ tích dành cho người lớn</h4>
					<a class="author" href="">Nguyễn Nhật Ánh</a>
					<p class="price">Giá: 100,000đ</p>
				</div>
			</div>
		</div>
		<div class="content col col-lg-3">
			<div class="book-thumnail thumnail">
				<img src="http://placehold.it/140x200" alt="">
				<div class="caption book-info">
					<h4>Chuyện cổ tích dành cho người lớn</h4>
					<a class="author" href="">Nguyễn Nhật Ánh</a>
					<p class="price">Giá: 100,000đ</p>
				</div>
			</div>
		</div>
		<div class="content col col-lg-3">
			<div class="book-thumnail thumnail">
				<img src="http://placehold.it/140x200" alt="">
				<div class="caption book-info">
					<h4>Chuyện cổ tích dành cho người lớn</h4>
					<a class="author" href="">Nguyễn Nhật Ánh</a>
					<p class="price">Giá: 100,000đ</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end row 2 -->
	</div>
	</div>
	<!-- end panel 2 -->