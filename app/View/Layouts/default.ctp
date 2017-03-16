<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
	?>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
	<?php echo $this->Html->css('bootstrap'); ?>
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		

/************************************************************
*************************Footer******************************
*************************************************************/


	
	@import url(http://fonts.googleapis.com/css?family=Sniglet|Raleway:900);
	body{
	font-family: 'Sniglet', sans-serif;

}
.formgroup, .formgroup-active, .formgroup-error{
	background-repeat: no-repeat;
	background-position: right bottom;
	background-size: 10.5%;
	transition: background-image 0.7s;
	-webkit-transition: background-image 0.7s;
	-moz-transition: background-image 0.7s;
	-o-transition: background-image 0.7s;
	width: 566px;
	padding-top: 2px;
}

.formgroup{
	background-image: url('http://www.geertjanhendriks.nl/codepen/form/pixel.gif');	
}
.formgroup-active{
	background-image: url('http://www.geertjanhendriks.nl/codepen/form/octo.png');
}
.formgroup-error{
	background-image: url('http://www.geertjanhendriks.nl/codepen/form/octo-error.png');
	}
	#form{
	height: 100%;	
	background-color: #98d4f3;
	overflow: hidden;
	position: relative;
	
}
form{
	margin: 0 auto;
	width: 500px;
	padding-top: 40px;
	color: black;
	position: relative;
	
	}

.footer1 {
    background: #fff url("../images/footer/footer-bg.png") repeat scroll left top;
	padding-top: 40px;
	padding-right: 0;
	padding-bottom: 20px;
	padding-left: 0;	
	border-top-width: 2px;
	border-top-style: solid;
	border-top-color: #337ab7;
}



.title-widget {
	color: #898989;
	font-size: 20px;
	font-weight: 300;
	line-height: 1;
	position: relative;
	text-transform: uppercase;
	font-family: 'Sniglet', sans-serif;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 25px;
	margin-left: 0;
	padding-left: 28px;
}

.title-widget::before {
    background-color: #ea5644;
    content: "";
    height: 22px;
    left: 0px;
    position: absolute;
    top: -2px;
    width: 5px;
}



.widget_nav_menu ul {
    list-style: outside none none;
    padding-left: 0;
}

.widget_archive ul li {
    background-color: rgba(0, 0, 0, 0.3);
    content: "";
    height: 3px;
    left: 0;
    position: absolute;
    top: 7px;
    width: 3px;
}


.widget_nav_menu ul li {
    font-size: 13px;
    font-weight: 700;
    line-height: 20px;
	position: relative;
    text-transform: uppercase;
	border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    margin-bottom: 7px;
    padding-bottom: 7px;
	width:95%;
}



.title-median {
    color: #636363;
    font-size: 20px;
    line-height: 20px;
    margin: 0 0 15px;
    text-transform: uppercase;
	font-family: 'Sniglet', sans-serif;
}

/*.footerp p {font-family: 'Gudea', sans-serif; }*/


#social:hover {
    			-webkit-transform:scale(1.1); 
-moz-transform:scale(1.1); 
-o-transform:scale(1.1); 
			}
			#social {
				-webkit-transform:scale(0.8);
                /* Browser Variations: */
-moz-transform:scale(0.8);
-o-transform:scale(0.8); 
-webkit-transition-duration: 0.5s; 
-moz-transition-duration: 0.5s;
-o-transition-duration: 0.5s;
			}           
/* 
    Only Needed in Multi-Coloured Variation 
                                               */
			.social-fb:hover {
				color: #3B5998;
			}
			.social-tw:hover {
				color: #4099FF;
			}
			.social-gp:hover {
				color: #d34836;
			}
			.social-em:hover {
				color: #f39c12;
			}
			.nomargin { margin:0px; padding:0px;}





.footer-bottom {
    background-color: #337ab7;
    min-height: 30px;
    width: 100%;
}
.copyright {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
}
.design {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
    text-align: right;
}
.design a {
    color: #fff;
}
	</style>
	
</head>
<body>	
	<div class="container-fluid">
		<img class="img-responsive" src="/cakephp/files/sinh-nhat-kiki.jpg" alt="" style="width:100%; height:300px;">
	</div>
	<div id="container" class="container-fluid">
		<div id="header">
			<div class="navbar navbar-default mainmenu" style="background: #5bc0de;">
				<div class="container">
					<a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="navbar-brand" href="/cakephp_book">KIKI BOOK SHOP</a>
					<div class="nav-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><?php echo $this->Html->link('Sách mới', '/sach-moi'); ?></li>
							<li><a href="#ban-chay"><strong>Sách bán chạy</strong></a></li>
							<li><?php echo $this->Html->link('Liên hệ', '/books/lienhe'); ?></li>
						</ul>
						<ul class="nav navbar-nav pull-right">
							<?php 
							echo $this->Form->create('Book', array('action'=>'get_keyword', 'class'=>'navbar-form search'));
							echo $this->Form->input('keyword', array('label'=>'',"style"=>"width: 200px;", "placeholder"=>"Tìm kiếm..." ));
							echo $this->Form->end();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div><!--end main menu-->

<a href="http://taochu.taothiep.vn" title="Tạo chữ online cho website, blog"><img border=0  alt="Tạo chữ online" src="http://taochu.taothiep.vn/33/s.gif" /><img border=0  alt="Tạo chữ online" src="http://taochu.taothiep.vn/33/a.gif" /><img border=0  alt="Tạo chữ online" src="http://taochu.taothiep.vn/33/l.gif" /><img border=0  alt="Tạo chữ online" src="http://taochu.taothiep.vn/33/e.gif" /><img border=0 src=http://taochu.taothiep.vn/-.gif><img border=0  alt="Tạo chữ online" src="http://taochu.taothiep.vn/33/h.gif" /><img border=0  alt="Tạo chữ online" src="http://taochu.taothiep.vn/33/o.gif" /><img border=0  alt="Tạo chữ online" src="http://taochu.taothiep.vn/33/t.gif" /></a>
			<marquee scrollamount="10" direction="right" loop="50" scrolldelay="0" onmouseover="this.stop()" onmouseout="this.start()">

			<?php foreach($books as $book): ?>
		
			
			<?php echo $this->Html->image($book['Book']['image'], array('width'=>'187px','height'=>'180px')); ?>						
		
		<?php endforeach; ?>
					<img src="/cakephp/files/ki-nang-song-dep/con-bo.jpg" alt="" style="width: 187px; height: 180px;">
					<img src="/cakephp/files/kinh-te/kinh-te-vi-mo.jpg" alt="" style="width: 187px; height: 180px;">
					<img src="/cakephp/files/kinh-te/sieu-kinh-te.jpg" alt="" style="width: 187px; height: 180px;">
					<img src="/cakephp/files/kinh-te/kinh-te-quoc-te.jpg" alt="" style="width: 187px; height: 180px;">
			</marquee>	
		<!-- content -->
			<div id="content">
				<div class="row">
					<div class="content col col-lg-9" style="margin-top: 30px;">
						
						<?php echo $this->fetch('content'); ?>
					</div>
					<!-- end content sau side bar -->
					<!-- sidebar -->
					<div class="sidebar col col-lg-3"  style="margin-top: 30px;">
						<div class="panel panel-info">
							<h4 class="panel-heading" style="margin-top: 0px;">
								<i class="glyphicon glyphicon-shopping-cart"></i> Giỏ hàng
							</h4>
							<?php echo $this->element('cart'); ?>	
						</div>
						<div class="panel">
							<h4 class="panel-heading">
								<i class="glyphicon glyphicon-th-list"></i> Danh mục sách
							</h4>
							<?php echo $this->element('menu_categories'); ?>
						</div>
					</div>
					<!-- end side bar -->
				</div>
			</div>
		<!-- end content -->
		<!-- footer -->
	<footer class="footer1">
<div class="container">

<div class="row"><!-- row -->
            
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Nhà sách KIKI</h1>
                                
                                <ul>
                                	<li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách mới nhất</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách bán chạy</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách được yêu thích nhất</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách nổi tiếng</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sách nước ngoài</a></li>
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
            
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Tác giả nổi tiếng</h1>
                                
                                <ul>
 									
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Thu Hà</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Nguyễn Nhật Ánh</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Thu Hằng</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Vũ Trọng Phụng</a></li>
                                    <li><a  href="#" target="_blank"><i class="fa fa-angle-double-right"></i>Xem thêm</a></li>
                                    
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
            
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Khuyến mãi</h1>
                                
                                <ul>


                <li><a href="#"><i class="fa fa-angle-double-right"></i>Khuyến mãi hot</a></li>
 				<li><a href="#"><i class="fa fa-angle-double-right"></i>Khuyến mãi cho thành viên</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i>KM tri ân nhà giáo</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i>Quà tặng kèm</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i> Smart Book</a></li>
				

                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                
                   
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Thông tin chi tiết</h1>
                                
                                <div class="footerp"> 
                                
                                <h2 class="title-median">Nhà sách KIKI</h2>
                                <p><b>Email:</b> <a href="http://">phanthithuha.it@gmail.com</a></p>
                                <p><b>Phone: </b>

    <b style="color:#ffc106;">01647 303 115</b></p>
    
    <p><b>Địa chỉ:</b></p>
    <p><b>02 Thanh Sơn, Đà Nẵng.</b></p>
    
                                </div>
                                
                                <div class="social-icons">
                                
                                	<ul class="nomargin">
                                    
                <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                                    
                                    </ul>
                                </div>
                    		</li>
                          </ul>
                       </div>
                </div>
</div>
</footer>
<!--header-->

<div class="footer-bottom">

	<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="copyright">

					© 2016, Nhà sách KIKI.

				</div>

			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="design">

					 <a href="#"> Nhà sách KIKI </a> |  <a target="_blank" href="#">Thiết kế bởi Thu Hà.</a>

				</div>

			</div>

		</div>

	</div>

</div>
    <!--/.footer-bottom--> 
		<!-- end footer -->
	</div>
	<!-- end container-fluid -->
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>