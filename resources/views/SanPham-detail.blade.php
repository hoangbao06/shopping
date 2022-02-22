@extends('layouts3.app')
@section('content')	

<div class="wrapper">
	<div class="page-header page-header-xs" style="background-image: url('{{asset('assets2')}}/img/sections/clark-street-mercantile.jpg');">
		<div class="filter"></div>
	</div>
    <div class="main">
        <div class="section">
            <div class="container">
                    <div class="row title-row">
                        <div class="col-md-2">
                            <h4 class="shop">Shop</h4>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="pull-right">
                                <span class="text-muted">Order Status</span> <button class="btn btn-link"> <i class="fa fa-shopping-cart"></i> 0 Items</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-6">
                            <div id="carousel" class="ml-auto mr-auto">
								<div class="card page-carousel">
									<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									    <ol class="carousel-indicators">
										    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
									    </ol>
			                            <div class="carousel-inner" role="listbox">

				                            <div class="carousel-item active">
				                                <img class="d-block img-fluid" src="{{ $sanphamChiTiet->anh }}" alt="Awesome Item">
				                            	<div class="carousel-caption d-none d-md-block">
				                                    <p>Somewhere</p>
				                                </div>
				                            </div>

											@foreach ($anhsanpham as $anhSanPham)
				                            <div class="carousel-item">
				                                <img class="d-block img-fluid" src="{{ $anhSanPham->anhsanPham }}" alt="Awesome Item">
				                            	<div class="carousel-caption d-none d-md-block">
				                            	    <p>Somewhere else</p>
				                            	</div>
				                            </div>
											@endforeach

			                            </div>

			                            <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			                                <span class="fa fa-angle-left"></span>
			                                <span class="sr-only">Previous</span>
			                            </a>
			                            <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			                                <span class="fa fa-angle-right"></span>
			                                <span class="sr-only">Next</span>
			                            </a>
									</div>
								</div>
                            </div> <!-- end carousel -->

                        </div>
                        <div class="col-md-5 col-sm-6">
							<form method="post" action="{{route('HoaDonChiTiet.store')}}">
								@csrf
							<h2>{{$sanphamChiTiet->nameSanPham}}</h2>
							<input type="hidden" name="id_sanPham" value="{{$sanphamChiTiet->idSanPham}}">
							<h4 class="price" name="gia_SP" ><strong>{{$sanphamChiTiet->gia_SP}} VNĐ</strong></h4>
							<hr/>
							<p>This blazer in suede is a must-have of your wardrobe. Team it with a angora blazer and a angora sweater.</p>
							<span class="label label-default shipping">Free shipping to Europe </span>

                            <div class="row">
									<input type="hidden" name="gia_san_pham" class="btn btn-danger btn-block btn-round" value="{{ $sanphamChiTiet->gia_SP }}">                               
                                <div class="col-md-6 col-sm-6">
                                    <label>Số Lượng</label>
                                    <div class="form-group">
									  <input type="number" name="so_Luong" class="btn btn-danger btn-block btn-round" min="1" value="1" >

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label>Thể Loại</label>
                                    <div class="form-group">
                                        <select name="huge" class="selectpicker" data-style="btn btn-outline-default btn-block btn-round" data-menu-style="">
                                            <option value="1">Small </option>
                                            <option value="2">Medium</option>
                                            <option value="3">Large</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr />

						
							@if (Session::exists("idUser"))
							
								<input type="hidden" name="id_KhachHang" value="{{Session::get('idUser')}}">
								<div class="row">
									<div class="col-md-4"></div>
									<div class="col-md-4">
										<button class="btn btn-wd btn-info btn-round" >Thêm Vào Giỏ  &nbsp;<i class="fa fa-chevron-right"></i></button>
									</div>
									<div class="col-md-4"></div>	
								</div>      
							
							@else
							
								<a class="btn btn-danger btn-block btn-round" href="{{ route('loginUser')}}" data-scroll="true" href="javascript:void(0)">Vui lòng đăng nhập</a>
						
							@endif
						










						</form>	
                        </div>
                    </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row card-body-row">
                    <div class="col-md-4 col-sm-4">
                       <div class="info">
                            <div class="icon icon-warning">
                                <i class="nc-icon nc-delivery-fast"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title"> 2 Days Delivery </h4>
                                <p>Spend your time generating new ideas. You don't have to think of implementing anymore.</p>
                            </div>
                       </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                       <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-credit-card"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title"> Refundable Policy </h4>
                                <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.</p>
                            </div>
                       </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                       <div class="info">
                            <div class="icon icon-success">
                                <i class="nc-icon nc-bulb-63"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title"> Popular Item </h4>
                                <p>Choose from a veriety of colors resembling sugar paper pastels.</p>
                            </div>
                       </div>
                    </div>
                </div>
                <hr />
                    <p>What to find out more about how we build our stuff? <a class="link-danger">Learn more.</a></p>
                <hr />
                <div class="faq">

                    <h4>Frequently Asked Questions</h4> <br/>
					<div id="acordeon">
						<div id="accordion" role="tablist" aria-multiselectable="true">
							<div class="card no-transition">
								<div class="card-header card-collapse" role="tab" id="headingOne">
									<h5 class="mb-0 panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
											Default Collapsible Item 1
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
								<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
								<div class="card-header card-collapse" role="tab" id="headingTwo">
									<h5 class="mb-0 panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Default Collapsible Item 2
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
								<div class="card-header card-collapse" role="tab" id="headingThree">
									<h5 class="mb-0 panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Default Collapsible Item 3
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
						</div><!--  end acordeon -->
					</div>

                </div>
                <div class="row add-row">
                    <div class="col-md-4 col-sm-4">
                        <h4>Complete the Look</h4>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h5>Full-Grain Leather Briefcase</h5>
                        <p class="price"><strong>&euro; 975.00</strong></p>

                        <p>Constructed from robust full-grain leather, it's finished with the label's 'city webbing' - a rich take on the brand's signature stripes.</p>
						<br/>
                        <button class="btn btn-danger btn-round"> Add to Cart</button>
                    </div>
                    <div class="col-md-3 ml-auto col-sm-4">
                        <img src="{{asset('assets2')}}/img/gallery/paul-smith.jpg" alt="Rounded Image" class="img-rounded img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-dark">
            <div class="container">
				{{-- @foreach ($sanphamChiTiet as $SanPham) --}}
                <div class="row">
                    <div class="col-md-12"><h4>Similar Products</h4><br/></div>
                    <div class="col-md-4 col-sm-4">
						<div class="card card-product card-plain">								
							<div class="card-image">
								<a href="#paper-kit">
									<img src="{{asset('assets2')}}/img/balmain-1.jpg" alt="Rounded Image" class="img-rounded img-responsive">
								</a>
								<div class="card-body">
									<div class="card-description">
										<h5 class="card-title">{{$sanphamChiTiet->nameSanPham}}</h5>
										<p class="card-description">Dresses & Skirts</p>
									</div>
									<div class="actions">
										<h5>1.300 &euro;</h5>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-md-4 col-sm-4">
						<div class="card card-product card-plain">
							<div class="card-image">
								<a href="#paper-kit">
									<img src="{{asset('assets2')}}/img/balmain-2.jpg" alt="Rounded Image" class="img-rounded img-responsive">
								</a>
								<div class="card-body">
									<div class="card-description">
										<h5 class="card-title">{{$sanphamChiTiet->nameSanPham}}</h5>
										<p class="card-description">Dresses & Skirts</p>
									</div>
									<div class="actions">
										<h5>1.500 &euro;</h5>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-md-4 col-sm-4">
						<div class="card card-product card-plain">
	                        <div class="card-image">
	                            <a href="#paper-kit">
	                                <img src="{{asset('assets2')}}/img/balmain-3.jpg" alt="Rounded Image" class="img-rounded img-responsive">
	                            </a>
	                            <div class="card-body">
	                                <div class="card-description">
	                                    <h5 class="card-title">Chrystal Skirt</h5>
	                                    <p class="card-description">Only on demand</p>
	                                </div>

	                                <div class="actions">
	                                    <h5>1.200 &euro;</h5>
	                                </div>
	                            </div>
	                        </div>
						</div>
                    </div>
                </div>
				{{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>


<footer class="footer section-black">
	<div class="container">
		<div class="row">
			<nav class="footer-nav">
				<ul>
					<li><a href="https://www.creative-tim.com">Creative Tim</a></li>
					<li><a href="http://blog.creative-tim.com">Blog</a></li>
					<li><a href="https://www.creative-tim.com/license">Licenses</a></li>
				</ul>
			</nav>
			<div class="credits ml-auto">
				<span class="copyright">
					© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
				</span>
			</div>
		</div>
	</div>
</footer>

@endsection
