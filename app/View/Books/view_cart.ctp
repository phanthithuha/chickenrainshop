<div class="container-fluid">
<!-- new element -->
<div class="panel">
	<h4 class="panel-heading">
		<i class="glyphicon glyphicon-shopping-cart"></i>
		Giỏ hàng của bạn
	</h4>
	<div class="row">
		<!-- cart -->
		<div class="">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sách</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>
							<a href="#">Bí mật tư duy triệu phú</a>
						</td>
						<td class="row">
							<form class="form-inline">
								<input type="text" name="" value="1" class="col col-lg-2">
								<button type="submit" class="btn btn-link">Cập nhật</button>
							</form>
						</td>
						<td>30,000đ</td>
						<td><a href="#"><i class="glyphicon glyphicon-remove"></i></a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>
							<a href="#">Tác nhân thu hút</a>
						</td>
						<td class="row">
							<form class="form-inline">
								<input type="text" name="" value="1" class="col col-lg-2">
								<button type="submit" class="btn btn-link">Cập nhật</button>
							</form>
						</td>
						<td>30,000đ</td>
						<td><a href="#"><i class="glyphicon glyphicon-remove"></i></a></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2"><strong>Tổng cộng</strong></td>
						<td colspan="2"><strong>60,000đ</strong></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2"><strong>Đã giảm<small>(Coupon: CakePHP - Giảm 10%)</small></strong></td>
						<td colspan="2"><strong>6,000đ</strong></td>
					</tr>
					<tr class="success">
						<td></td>
						<td colspan="2"><h4><strong>Giá phải trả</strong></h4></td>
						<td colspan="2"><h4><span class="label label-danger">54,000đ</span></h4></td>
					</tr>
				</tbody>
			</table>
		</div>
		<button type="submit" class="col col-lg-3 btn btn-default empty">Làm rỗng giỏ hàng</button>
	</div>
</div> <!-- end element -->
<!-- coupon -->
<div class="panel panel-success col col-lg-4">
	<h4 class="panel-heading">
		<i class="glyphicon glyphicon-barcode"></i>
		Mã giảm giá
	</h4>
	<form class="form-inline">
		<input type="text" class="col col-lg-5" placeholder="Nhập mã giảm giá (coupon)">
		<button type="submit" class="col col-lg-2 btn btn-primary">Nhập</button>
	</form>
	<br/>
	<ul>
	<h4>Ghi chú:</h4>
		<li>Mỗi mã giảm giá có mức giảm giá khác nhau và chỉ dùng trong khoảng thời gian quy định.</li>
		<li>Chỉ dùng một mã giảm giá khi thanh toán đơn hàng</li>
		<li>Số tiền giảm giá được tính dựa trên<strong>số phần trăm giảm giá * tổng giá trị</strong> của đơn hàng.</li>
	</ul>
</div>
<!-- end coupon -->
<!-- customer info -->
<div class="panel panel-info col col-lg-7 col-offset-1" style="float:right;">
	<h4 class="panel-heading">
		<i class="glyphicon glyphicon-user"></i>
		Thanh toán đơn hàng
	</h4>
	<form class="form-horizontal">
		<div class="row">
			<label for="inputEmail" class="col col-lg-2 control-label">Tên</label>
			<div class="col col-lg-10">
				<input type="text" name="" id="inputEmail" placeholder="Nhập tên" >
			</div>
		</div>
		<div class="row">
			<label for="inputEmail" class="col col-lg-2 control-label">Email</label>
			<div class="col col-lg-10">
				<input type="text" name="" id="inputEmail" placeholder="Nhập email" >
			</div>
		</div>
		<div class="row">
			<label for="inputEmail" class="col col-lg-2 control-label">Địa chỉ</label>
			<div class="col col-lg-10">
				<input type="text" name="" id="inputEmail" placeholder="Nhập địa chỉ" >
			</div>
		</div>
		<div class="row">
			<label for="inputEmail" class="col col-lg-2 control-label">Phone</label>
			<div class="col col-lg-10">
				<input type="text" name="" id="inputEmail" placeholder="Nhập số điện thoại" >
			</div>
		</div>
		<div class="row">
			<div class="col col-lg-10 col-offset-2">
				<button type="submit" class="btn btn-primary pull-right">Thực hiện thanh toán</button>
			</div>
		</div>
	</form>
	
</div>
</div>