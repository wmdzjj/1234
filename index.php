
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>全套红色食品商城响应式首页模板 - 我爱模板网 www.5imoban.net</title>

		<link href="assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="css/hmstyle.css" rel="stylesheet" type="text/css" />
		<script src="http://www.5imoban.net/download/jquery/jquery.1.11.3.js"></script>
		<script src="assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<?php include 'php/header.php'; ?>
             <b class="line"></b>
			<div class="shopNav">
				<div class="slideall" style="height: auto;">
			        
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
                
			    <div class="bannerTwo">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
							<?php 
								$pdo=new PDO('mysql:host=localhost;dbname=orange','root','root');
								$b=$pdo->prepare('select * from banner where is_show=1 order by ban_sort limit 4');
								$b->execute();
								$b1=$b->fetchAll(PDO::FETCH_ASSOC);
								foreach($b1 as $k=>$v){
							?>
								<li class="banner<?php echo $k+1 ?>"><a href=<?php echo $v['ban_url'] ?>><img src="images/<?php echo $v['ban_pic'] ?>" /></a></li>
							<?php } ?>
							</ul>
						</div>
						<div class="clear"></div>	
			    </div>

			<!--侧边导航 -->
			<div id="nav" class="navfull" style="position: static;">
				<div class="area clearfix">
					<div class="category-content" id="guide_2">
						
						<div class="category" style="box-shadow:none ;margin-top: 2px;">
							<ul class="category-list navTwo" id="js_climit_li">
			<?php
				$pdo=new PDO('mysql:host=localhost;dbname=orange','root','root');
				$s=$pdo->prepare('select * from category where parent_id=0');
				$pdo->query("SET NAMES utf8");
				$s->execute();
				$result=$s->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $v){
					
			?>
					<li>
						<div class="category-info">
							<h3 class="category-name b-category-name"><i><img src=<?php echo "images/".$v['icon']; ?>></i><a href="php/search.php?cat_id=<?php echo $v['cat_id'] ?>" class="ml-22" title=<?php echo $v['cat_name']; ?>><?php echo $v['cat_name']; ?></a></h3>
							<em>&gt;</em></div>
						<div class="menu-item menu-in top">
							<div class="area-in">
								<div class="area-bg">
									<div class="menu-srot">
										<div class="sort-side">
			<?php
				$s2=$pdo->prepare("select * from category where parent_id=".$v['cat_id']);
				$s2->execute();
				$result2=$s2->fetchAll(PDO::FETCH_ASSOC);
				foreach($result2 as $v2){
			?>
					<dl class="dl-sort">
						<dt><a href="php/search.php?cat_id=<?php echo $v2['cat_id'] ?>"><span title=<?php echo $v2['cat_name'] ?>><?php echo $v2['cat_name'] ?></span></a></dt>
					<?php 
						$s3=$pdo->prepare("select * from category where parent_id=".$v2['cat_id']);
						$s3->execute();
						$result3=$s3->fetchAll(PDO::FETCH_ASSOC);
						foreach($result3 as $v3){
					?>	
						<dd><a href="php/search.php?cat_id=<?php echo $v3['cat_id'] ?>" title=<?php echo $v3['cat_name'] ?> href="#"><span><?php echo $v3['cat_name'] ?></span></a></dd>
					<?php } ?>
					</dl>
			<?php } ?>
										</div>
										<div class="brand-side">
											<dl class="dl-sort"><dt><span>实力商家</span></dt>
												<?php 
													$s4=$pdo->prepare("select * from shangjia");
													$s4->execute();
													$result4=$s4->fetchAll(PDO::FETCH_ASSOC);
													foreach($result4 as $v4){
												?>
												<dd><a rel="nofollow" title="呵官方旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" ><?php echo $v4['name'] ?></span></a></dd>
												<?php } ?>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
			<?php } ?>
			</ul>
									</div>
								</div>

							</div>
						</div>
						<!--导航 -->
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>


					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					
				<!--各类活动-->
				<div class="row">
					<li><a><img src="images/row1.jpg"/></a></li>
					<li><a><img src="images/row2.jpg"/></a></li>
					<li><a><img src="images/row3.jpg"/></a></li>
					<li><a><img src="images/row4.jpg"/></a></li>
				</div>
				<div class="clear"></div>	
					<!--走马灯 -->

					<div class="marqueenTwo">
						<span class="marqueen-title"><i class="am-icon-volume-up am-icon-fw"></i>商城头条<em class="am-icon-angle-double-right"></em></span>
						<div class="demo">

							<ul>
						<?php 
							$new=$pdo->prepare("select * from news limit 8");
							$new->execute();
							$new1=$new->fetchAll(PDO::FETCH_ASSOC);
							foreach($new1 as $news){
						?>
								<li class="title-first"><a target="_blank" href=<?php echo $news['news_rul'] ?>>
									<span><?php echo $news['news_type'] ?></span><?php echo $news['news_title'] ?>							
								</a></li>
						<?php } ?>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--热门活动 -->

					<div class="am-container">
					
                     <div class="sale-mt">
		                   <i></i>
		                   <em class="sale-title">限时秒杀</em>
		                   <div class="s-time" id="countdown">
			                    <span class="hh">01</span>
			                    <span class="mm">20</span>
			                    <span class="ss">59</span>
		                   </div>
	                  </div>

					
					  <div class="am-g am-g-fixed sale">
					<?php 
						$sale1=$pdo->prepare("select * from product where is_show=1 and is_sale=1 limit 4");
						$sale1->execute();
						$sale2=$sale1->fetchAll(PDO::FETCH_ASSOC);
						foreach($sale2 as $sales){
					?>
						<div class="am-u-sm-3 sale-item">
							<div class="s-img">
								<a href="# "><img src="images/<?php echo $sales['pro_pic']; ?>" /></a>
							</div>
                           <div class="s-info">
                           	   <a href="#"><p class="s-title"><?php echo $sales['pro_name'] ?></p></a>
                           	   <div class="s-price">￥<b>9.90</b>
                           	   	  <a class="s-buy" href="#">秒杀</a>
                           	   </div>                          	  
                           </div>								
						</div>
					<?php } ?>
					  </div>
                   </div>
					<div class="clear "></div>
		<?php 
			$pro=$pdo->prepare("select * from category where parent_id=0 limit 10");
			$pro->execute();
			$pro1=$pro->fetchAll(PDO::FETCH_ASSOC);
			foreach($pro1 as $pros){
				$i=1;
		 ?>
            <div class="f<?php echo $i; ?>">
					<div class="am-container " >
						<div class="shopTitle ">
							<h4 class="floor-title"><?php echo $pros['cat_name'] ?></h4>
							<div class="floor-subtitle"><!-- <em class="am-icon-caret-left"></em> --><h3><?php echo $pros['cat_ad'] ?></h3></div>
							<div class="today-brands " style="right:0px ;top:13px;">
							<?php 
							$pro2=$pdo->prepare("select * from category where parent_id=".$pros['cat_id']);
							$pro2->execute();
							$pro21=$pro2->fetchAll(PDO::FETCH_ASSOC);
							$i=0;
							foreach($pro21 as $pros2){
								$pro3=$pdo->prepare("select * from category where parent_id=".$pros2['cat_id']);
								$pro3->execute();
								$pro31=$pro3->fetchAll(PDO::FETCH_ASSOC);
								foreach($pro31 as $pros3){
									$i++;
									if($i>4){
										break;
									}
									if($i==1){
							?>
							<a href="# "><?php echo $pros3['cat_name']; ?></a>
							<?php }else{ ?>
							|<a href="# "><?php echo $pros3['cat_name']; ?></a>
							<?php }}} ?>
							</div>
						</div>
					</div>
					<div class="am-g am-g-fixed floodSix ">				
						<div class="am-u-sm-5 am-u-md-3 text-one list">
							<div class="word">
							<?php
								foreach($pro21 as $pros2){
							?>
								<a class="outer" href="#"><span class="inner"><b class="text"><?php echo $pros2['cat_name'] ?></b></span></a>
							<?php } ?>								
							</div>							
							<a href="# ">
								<img src="images/5.jpg" />
								<div class="outer-con ">
									<div class="title ">
										<?php echo $pros['cat_name']; ?>大礼包开抢啦
									</div>
									<div class="sub-title ">
										<?php echo $pros['cat_ad']; ?>
									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two big">
							
								<div class="outer-con ">
									<div class="title ">
										雪之恋和风大福
									</div>
									<div class="sub-title ">
										¥13.8
									</div>
									
								</div>
								<a href="# "><img src="images/act1.png" /></a>						
						</div>

						<li>
							<div class="am-u-md-2 am-u-lg-2 text-three">
								<div class="boxLi"></div>
								<div class="outer-con ">
									<div class="title ">
										小优布丁
									</div>								
									<div class="sub-title ">
										¥4.8
									</div>
									
								</div>
								<a href="# "><img src="images/1.jpg " /></a>
							</div>
						</li>
						<li>
							<div class="am-u-md-2 am-u-lg-2 text-three sug">
								<div class="boxLi"></div>
								<div class="outer-con ">
									<div class="title ">
										小优布丁
									</div>
									<div class="sub-title ">
										¥4.8
									</div>
									
								</div>
								<a href="# "><img src="images/2.jpg " /></a>
							</div>
						</li>
						<li>
							<div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five">
								<div class="boxLi"></div>
								<div class="outer-con ">
									<div class="title ">
										小优布丁
									</div>								
									<div class="sub-title ">
										¥4.8
									</div>
									
								</div>
								<a href="# "><img src="images/5.jpg" /></a>
							</div>	
						</li>
						<li>
							<div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six">
								<div class="boxLi"></div>
								<div class="outer-con ">
									<div class="title ">
										小优布丁
									</div>
									<div class="sub-title ">
										¥4.8
									</div>
									
								</div>
								<a href="# "><img src="images/3.jpg" /></a>
							</div>	
						</li>
						<li>
							<div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six">
								<div class="boxLi"></div>
								<div class="outer-con ">
									<div class="title ">
										小优布丁
									</div>
									<div class="sub-title ">
										¥4.8
									</div>
									
								</div>
								<a href="# "><img src="images/4.jpg" /></a>
							</div>	
						</li>						
					</div>

					<div class="clear "></div>
            </div>
        <?php $i++; } ?>
            
				<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em><a href="http://www.5imoban.net/" target="_blank" title="静态网页模板">我爱模板网</a></em>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

		<!--引导 -->
		<div class="navCir">
			<li class="active"><a href="home2.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
		<!--菜单 -->
		<div class=tip>
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item ">
						<a href="# ">
							<span class="setting "></span>
						</a>
						<div class="ibar_login_box status_login ">
							<div class="avatar_box ">
								<p class="avatar_imgbox "><img src="images/no-img_mid_.jpg " /></p>
								<ul class="user_info ">
									<li>用户名：sl1903</li>
									<li>级&nbsp;别：普通会员</li>
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="# " class="login_order ">我的订单</a>
								<a href="# " class="login_favorite ">我的收藏</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>

					</div>
					<div id="shopCart " class="item ">
						<a href="# ">
							<span class="message "></span>
						</a>
						<p>
							购物车
						</p>
						<p class="cart_num ">0</p>
					</div>
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="# ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc "><img src="images/wdsc.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi "><img src="images/chongzhi.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display:none; "><img src="images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem ">
							<a href="#top " class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">优惠券</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">红包</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">￥0</div>
						<div class="text ">余额</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
				</div>
			</div>
		</div>
		<script>
			window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="basic/js/quick_links.js "></script>
	</body>

</html>