<main id="main" class="main-site">
<div class="container">
@if(session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    	<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Products Category</h3> 
				
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{ asset('assets/images/fashion-accesories-banner.jpg') }}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">
							<a href="#fashion_1a" class="tab-control-item active">Latest Products</a>
							<a href="#fashion_1b" class="tab-control-item">Add new Product</a>
							<!-- <a href="#fashion_1c" class="tab-control-item">Laptop</a>
							<a href="#fashion_1d" class="tab-control-item">Tablet</a> -->
						</div>
						<div class="tab-contents">

							<div class="tab-content-item active" id="fashion_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
								@foreach($products as $product)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('assets/images/products/fashion_0') }}{{$loop->iteration}}.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<a href="#" title="Delete Product"  wire:click.prevent="delete({{$product->id}})"><span class="flash-item new-label"><i class="fa fa-trash"></i></span></a>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$product->productTitle}}</span></a>
											<div class="wrap-price"><span class="product-price">{{$product->productPrice}}</span></div>
										</div>
									</div>
								@endforeach
									

								</div>
							</div>

							<div class="tab-content-item" id="fashion_1b">
								
								<div class="row">
									<div class="col-md-8">
										<div class="panel-default">
											<div class="panel-heading">Add New Product</div>
										</div>
										<div class="panel-body">
										<form action="">
											@csrf
											<div class="form-group">
												<label for="">Product Title</label>
												<input type="text" name="productTitle" class="form-control" placeholder="Product title...">
											</div>
											<div class="form-group">
												<label for="">Product Description</label>
												<textarea name="productDesc" id="" cols="30" rows="10" class="form-control" placeholder="Product description..."></textarea>
											</div>
											<div class="form-group">
												<label for="">Product Price</label>
												<input type="text" name="productPrice" class="form-control" placeholder="Product price...">
											</div>
											<div class="form-group">
												<label for="">Product Image</label>
												<input type="file" name="prodcutImage" class="form-control">
											</div>
											<div class="form-group">
												<button class="btn btn-primary">Add Product</button>
											</div>
										</form>
										</div>
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>	
</div>
</div>


