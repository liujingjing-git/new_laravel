<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.8/skins/default/aliplayer-min.css" />

@extends('layouts.shop')

@section('title', '商品详情页')
@section('content')

	<!-- menu -->
	<div class="menus" id="animatedModal2">
		<div class="close-animatedModal2 close-icon">
			<i class="fa fa-close"></i>
		</div>
		<div class="modal-content">
			<div class="container">
				<div class="row">
					<div class="col s4">
						<a href="index.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-home"></i>
								</div>
								Home
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="product-list.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-bars"></i>
								</div>
								Product List
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="shop-single.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-eye"></i>
								</div>
								Single Shop
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col s4">
						<a href="wishlist.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-heart"></i>
								</div>
								Wishlist
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="cart.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								Cart
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="checkout.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-credit-card"></i>
								</div>
								Checkout
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col s4">
						<a href="blog.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-bold"></i>
								</div>
								Blog
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="blog-single.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-file-text-o"></i>
								</div>
								Blog Single
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="error404.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-hourglass-half"></i>
								</div>
								404
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col s4">
						<a href="testimonial.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-support"></i>
								</div>
								Testimonial
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="about-us.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-user"></i>
								</div>
								About Us
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="contact.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-envelope-o"></i>
								</div>
								Contact
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col s4">
						<a href="setting.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-cog"></i>
								</div>
								Settings
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="login.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-sign-in"></i>
								</div>
								Login
							</div>
						</a>
					</div>
					<div class="col s4">
						<a href="register.html" class="button-link">
							<div class="menu-link">
								<div class="icon">
									<i class="fa fa-user-plus"></i>
								</div>
								Register
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end menu -->

	<!-- cart menu -->
	<div class="menus" id="animatedModal">
		<div class="close-animatedModal close-icon">
			<i class="fa fa-close"></i>
		</div>
		<div class="modal-content">
			<div class="cart-menu">
				<div class="container">
					<div class="content">
						<div class="cart-1">
							<div class="row">
								<div class="col s5">
									<img src="/static/index/img/cart-menu1.png" alt="">
								</div>
								<div class="col s7">
									<h5><a href="">Fashion Men's</a></h5>
								</div>
							</div>
							<div class="row quantity">
								<div class="col s5">
									<h5>Quantity</h5>
								</div>
								<div class="col s7">
									<input value="1" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col s5">
									<h5>Price</h5>
								</div>
								<div class="col s7">
									<h5>$20</h5>
								</div>
							</div>
							<div class="row">
								<div class="col s5">
									<h5>Action</h5>
								</div>
								<div class="col s7">
									<div class="action"><i class="fa fa-trash"></i></div>
								</div>
							</div>
						</div>
						<div class="divider"></div>
						<div class="cart-2">
							<div class="row">
								<div class="col s5">
									<img src="/static/index/img/cart-menu2.png" alt="">
								</div>
								<div class="col s7">
									<h5><a href="">Fashion Men's</a></h5>
								</div>
							</div>
							<div class="row quantity">
								<div class="col s5">
									<h5>Quantity</h5>
								</div>
								<div class="col s7">
									<input value="1" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col s5">
									<h5>Price</h5>
								</div>
								<div class="col s7">
									<h5>$20</h5>
								</div>
							</div>
							<div class="row">
								<div class="col s5">
									<h5>Action</h5>
								</div>
								<div class="col s7">
									<div class="action"><i class="fa fa-trash"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="total">
						<div class="row">
							<div class="col s7">
								<h5>Fashion Men's</h5>
							</div>
							<div class="col s5">
								<h5>$21.00</h5>
							</div>
						</div>
						<div class="row">
							<div class="col s7">
								<h5>Fashion Men's</h5>
							</div>
							<div class="col s5">
								<h5>$21.00</h5>
							</div>
						</div>
						<div class="row">
							<div class="col s7">
								<h6>Total</h6>
							</div>
							<div class="col s5">
								<h6>$41.00</h6>
							</div>
						</div>
					</div>
					<button class="btn button-default">Process to Checkout</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart menu -->


	<!-- single post -->
	<div class="pages section">
		<div class="container">
			<div class="blog-single">
				<img src="/storage/{{$goods->goods_img}}" alt="">
				<div class="blog-single-content">
					<h5>{{$goods->goods_name}}</h5>
					<div class="date">
						<span><i class="fa fa-calendar"></i> Dec 22, 2018</span>
					</div>
                    <tr>
                        <th><strong class="orange">￥{{$goods->shop_price}}</strong></th>
                    </tr>
                    <div class="j_nums">
                        <input type="text" value="1" class="n_ipt" id="buy_number" />
                    </div>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi error quibusdam culpa assumenda maiores ea dicta fuga a itaque rerum deserunt, incidunt, nulla, vero amet sapiente reiciendis. Perspiciatis debitis, accusamus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus eligendi porro deleniti quisquam omnis rem quibusdam corporis alias, et quae, assumenda unde pariatur vitae placeat veritatis nam quia, velit delectus.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ut vitae recusandae perferendis, temporibus, ullam, tenetur eius necessitatibus aliquam sequi, eum atque ratione ipsam in aliquid vero numquam id minus!</p>

                    <div class="form-button">
                        <a id="cart"><div class="btn button-default">加入购物车</div></a>
                        <div class="btn button-default" id="collection" is_del="{{$del}}">{{$del==0 ? '收藏' : '已收藏'}}</div>
                    </div>
					<div class="share-post prism-player" id="player-con"></div>
				</div>
				<div class="comment">
					<h5>1条评论</h5>
					<div class="comment-details">
						<div class="row">
							<div class="col s3">
								<!-- <img src="img/user-comment.jpg" alt=""> -->
							</div>
							<div class="col s9">
								<div class="comment-title">
									<span><strong>{{$data['user_name']}}</strong> | {{date('Y-m-d H:i:s',$data['add_time'])}} | <p><b>{{$data['subject']}}</b></p></span>
								</div>
								<p>{{$data['content']}}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="comment-form">
					<div class="comment-head">
						<h5>在下面发表评论</h5>
						<p>对于现况的不满，你不能只是抱怨，而是要有勇气作出改变。</p>
					</div>
					<div class="row">
						<form class="col s12 form-details" action="{{url('comments')}}" method="post">
						@csrf
						<input type="hidden" name="goods_id" value="{{$goods->goods_id}}">
							<div class="input-field">
								<input type="text" class="validate" name="subject" placeholder="主题" required>
							</div>
							<div class="input-field">
								<textarea id="textarea1" cols="30" rows="10" name="content" class="materialize-textarea" class="validate" placeholder="内容"></textarea>
							</div>
							<div class="form-button">
								<input class="btn button-default" value="发表评论" type="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single post -->


	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	
    <script src="/js/jquery.min.js"></script>
    <script>
        $(function(){
        //加入购物车
        $(document).on("click","#cart",function(){
            var buy_number = $("#buy_number").val();
            var goods_id = {{$goods->goods_id}};
           // alert(goods_id);

            $.post('/carts',{'goods_id':goods_id,'buy_number':buy_number},function(result){
                if(result.code=='00001'){
                    location.href = "/login?refer="+window.location.href;
                }
                if(result.code=='00002'){
                    location.href = "/cart";
                }
            },'json');
        });
     });
    </script>
    <script src="/js/jquery.min.js"></script>
    <script>
		$(document).ready(function () {
            // 收藏
			$("#collection").click(function(){
				var goods_id = {{$goods->goods_id}};
				var is_del = $("#collection").attr('is_del');
				// alert(is_del);
				var text=$("#collection").text();
				var texts = "";
				if(text=="收藏"){
					texts="已收藏";
				} else {
					texts="收藏";
				}
				// alert(text);
				var is_dels = "";
				if(is_del=="1"){
            		is_dels="0"
        		}else{
            		is_dels="1"
        		}
				// alert(is_dels);
				var text=$('#collection').text();
				$.ajax({
					type: "POST",
					url: "/collect_do",
					data:{"goods_id":goods_id,"is_del":is_dels},
					dataType: "json",
					success:function(data){
						if(data.error_no==0){
							if(is_del == 1){
								$("#collection").html('收藏');
							}else{
								$("#collection").html('已收藏');
							}
							// console.log(is_dels);
							$("#collection").attr('is_del',is_dels);
						}
					}
				});
				
			});
        });

    </script>
	<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/de/prismplayer/2.8.8/aliplayer-min.js"></script>
	<script>
		var player = new Aliplayer({
		"id": "player-con",
		"source": "/storage/{!!$goods->m3u8!!}",
		"width": "50%",
		"height": "400px",
		"autoplay": true,
		"isLive": false,
		"rePlay": false,
		"playsinline": true,
		"preload": true,
		"controlBarVisibility": "hover",
		"useH5Prism": true
		}, function (player) {
			console.log("The player is created");
		}
		);
	</script>
    @endsection
