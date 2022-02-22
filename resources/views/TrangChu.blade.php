@extends('layouts3.app')
@section('content')	
<div class="page-header" style="background-image: url('{{asset('assets2')}}/img/ecommerce/balmain_runway.jpg');">
	<div class="filter"></div>
	<div class="content-center">
		<div class="container text-center">
			<h1>Brace yourself!</h1>
			<h3>25% Off and Free global delivery for all products</h3>
		</div>
	</div>
</div>
<div class="wrapper">

 <div class="section latest-offers">
	   <div class="container">
		   <h3 class="section-title">Latest Offers</h3>  
		   <div class="row">
			@foreach ($sanpham as $SanPham) 
				<div class="col-md-4">
					<div class="card card-product card-plain">
						<div class="card-image">
							<a href="{{ route('ChiTietSanPham.index',['idSanPham' => $SanPham->idSanPham]) }}">
								<img src="{{$SanPham->anh}}" alt="Rounded Image" class="img-rounded img-responsive">
							</a>
							<div class="card-body">
								<div class="card-description">
									<h5 class="card-title">{{$SanPham->nameSanPham}}</h5>
									<p class="card-description">This is a limited edition dress for the fall collection. Comes in 3 colours.</p>
								</div>
								<div class="price">
									
									<strike>2.675 &euro;</strike> <span class="text-danger">{{number_format($SanPham->gia_SP , 0, ".",".")}} VNĐ</span>
								</div>
							</div>
						</div>
					</div>
				 </div>
				 @endforeach
			</div>
			<div style="margin-left: 420px">
			{{$sanpham->appends([
				'search' => $search
			])->links() }} 
			</div>
	   </div>
</div><!-- section -->
 <div class="section section-blog">
	   <div class="container">
		   <div class="row">
				<div class="col-md-4">
					<div class="card card-blog">
						<div class="card-image">
							<a href="#pablo">
								<img class="img img-raised" src="{{asset('assets2')}}/img/sections/miguel-perales.jpg">
							</a>
						</div>
						<div class="card-body">
							<h6 class="card-category text-info">Enterprise</h6>
							<h5 class="card-title">
								<a href="#pablo">LinkedIn’s new desktop app arrives</a>
							</h5>
							<p class="card-description">
								LinkedIn is today launching its official desktop application for Windows 10, allowing the professional social networking service to... <br>
							</p>
							<hr>
							<div class="card-footer">
								<div class="author">
									<a href="#pablo">
									   <img src="{{asset('assets2')}}/img/faces/ayo-ogunseinde-2.jpg" alt="..." class="avatar img-raised">
									   <span>Mike John</span>
									</a>
								</div>
								<div class="stats">
										<i class="fa fa-clock-o" aria-hidden="true"></i> 5 min read
									</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card card-blog">
						<div class="card-image">
							<a href="#pablo">
								<img class="img img-raised" src="{{asset('assets2')}}/img/sections/roger-keller.jpg">
							</a>
						</div>
						<div class="card-body">
							<h6 class="card-category text-success">
								Startups
							</h6>
							<h5 class="card-title">
								<a href="#pablo">MIT’s Cheetah 3 robot is built to save lives</a>
							</h5>
							<p class="card-description">
								The latest version of MIT’s Cheetah robot made its stage debut today at TC Sessions: Robotics in Cambridge, Mass. It’s a familiar project... <br>
							</p>
							<hr>
							<div class="card-footer">
								<div class="author">
									<a href="#pablo">
									   <img src="{{asset('assets2')}}/img/faces/kaci-baum-2.jpg" alt="..." class="avatar img-raised">
									   <span>Nickie Kelly</span>
									</a>
								</div>
								<div class="stats">
										<i class="fa fa-clock-o" aria-hidden="true"></i> 5 min read
									</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card card-blog">
						<div class="card-image">
							<a href="#pablo">
								<img class="img img-raised" src="{{asset('assets2')}}/img/sections/joshua-earlesz.jpg">
							</a>
						</div>

						<div class="card-body">
							<h6 class="card-category text-danger">
								<i class="fa fa-free-code-camp" aria-hidden="true"></i> Enterprise
							</h6>
							<h5 class="card-title">
								<a href="#pablo">Lionel Richie says “Hello” to startup investors</a>
							</h5>
							<p class="card-description">
								Because developing a doctor-on-demand service that would allow personalized medical visits, booked through an app on a user’s phone is... <br>
							</p>
							<hr>
							<div class="card-footer">
								<div class="author">
									<a href="#pablo">
									   <img src="{{asset('assets2')}}/img/faces/erik-lucatero-2.jpg" alt="..." class="avatar img-raised">
									   <span>Mike John</span>
									</a>
								</div>
								<div class="stats">
										<i class="fa fa-clock-o" aria-hidden="true"></i> 5 min read
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	   </div>
</div><!-- section -->
<div class="subscribe-line subscribe-line-black">
	 <div class="container">
		<div class="row">
			 <div class="col-md-9 col-sm-8">
				<form class="">
					 <div class="form-group">
						  <input type="text" value="" class="form-control" placeholder="Enter your email...">
					 </div>
				 </form>
			 </div>
			 <div class="col-md-3 col-sm-4">
				 <button type="button" class="btn btn-neutral btn-block btn-lg">Join Newsletter</button>
			 </div>
		</div>
	 </div>
</div>

<footer class="footer footer-big">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-9">
				<div class="links">
					<ul class="uppercase-links">
						<li>
							<a href="#paper-kit">
								Home
							</a>
						</li>
						<li>
							<a href="#paper-kit">
								Company
							</a>
						</li>
						<li>
							<a href="#paper-kit">
								Portfolio
							</a>
						</li>
						<li>
							<a href="#paper-kit">
							   Team
							</a>
						</li>
						<li>
							<a href="#paper-kit">
							   Blog
							</a>
						</li>
						<li>
							<a href="#paper-kit">
							   Contact
							</a>
						</li>


					</ul>
					<hr />

					<div class="copyright">
						© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
					</div>
				</div>
			</div>

			<div class="col-md-4 ml-auto col-sm-2">
				<div class="social-area">
					<a href="#facebook" class="btn btn-neutral btn-round btn-just-icon btn-facebook">
					   <i class="fa fa-facebook" aria-hidden="true"></i>
				   </a>
					<a href="#twitter" class="btn btn-neutral btn-just-icon btn-round btn-twitter">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a href="#google" class="btn btn-neutral btn-just-icon btn-round btn-google">
						<i class="fa fa-google-plus" aria-hidden="true"></i>
					</a>
					<a href="#pin" class="btn btn-neutral btn-just-icon btn-round btn-pinterest">
						<i class="fa fa-pinterest-p" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
</div> 
@endsection