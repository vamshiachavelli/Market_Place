<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')  }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')  }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href=" {{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<!-- <ul>
								<li class="menu-item" >
									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
								</li>
							</ul> -->
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								@if(Route::has('login'))
									@auth
										@if(Auth::user()->utype ==='SA')
									<!-- show the super admin links -->
									<li class="menu-item menu-item-has-children parent" >
									<a title="My account" href="#">My account  {{Auth::user()->name;}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										<li class="menu-item" >
											<a title="Profile" href="#">Profile</a>
										</li>
										<li class="menu-item" >
											<a title="Change Password" href="#">Change Password</a>
										</li>
										<li class="menu-item" >
											<a title="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										</li>
										<form id="logout-form" method="POST" action="{{ route('logout') }}">
											@csrf
										</form>
									</ul>
								</li>
										@elseif(auth::user()->utype ==='SADM')
										<!-- Show the school admin link -->
										<li class="menu-item menu-item-has-children parent" >
									<a title="My account" href="#">My account  {{Auth::user()->name;}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										
										<li class="menu-item" >
											<a title="Profile" href="#">Profile</a>
										</li>
										<li class="menu-item" >
											<a title="Change Password" href="#">Change Password</a>
										</li>
										<li class="menu-item" >
											<a title="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										</li>
										<form id="logout-form" method="POST" action="{{ route('logout') }}">
											@csrf
										</form>
										
									</ul>
								</li>
										@elseif(auth::user()->utype ==='BOW')
										<!-- show the business owner link -->
										<li class="menu-item menu-item-has-children parent" >
									<a title="My account" href="#">My account  {{Auth::user()->name;}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										
										<li class="menu-item" >
											<a title="Profile" href="#">Profile</a>
										</li>
										<li class="menu-item" >
											<a title="Change Password" href="#">Change Password</a>
										</li>
										<li class="menu-item" >
											<a title="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										</li>
										<form id="logout-form" method="POST" action="{{ route('logout') }}">
											@csrf
										</form>
										
									</ul>
								</li>
									@else
									
										<!-- show the student links -->
									<li class="menu-item menu-item-has-children parent" >
									<a title="My account" href="#">My account  {{Auth::user()->name;}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										<li class="menu-item" >
											<a title="Profile" href="#">Profile</a>
										</li>
										<li class="menu-item" >
											<a title="Change Password" href="#">Change Password</a>
										</li>
										<li class="menu-item" >
											<a title="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										</li>
										<form id="logout-form" method="POST" action="{{ route('logout') }}">
											@csrf
										</form>
										
									</ul>
								</li>
										@endif

									@else
								<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
								<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
								

									@endif

								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{ asset('assets/images/logo-top-1.png') }}" alt="mercado"></a>
						</div>

						<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="#" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value="" placeholder="Search here...">
									<button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
							</div>
						</div>

						<div class="wrap-icon right-section">
							<div class="wrap-icon-section wishlist">
								<a href="#" class="link-direction">
									<i class="fa fa-heart" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">0 item</span>
										<span class="title">Wishlist</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section minicart">
								<a href="#" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">4 items</span>
										<span class="title">CART</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					<div class="primary-nav-section">
						<div class="container">

						@if(Route::has('login'))
							@auth
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
							@if(Auth::user()->utype ==='SA')
							<li class="menu-item" >
								<a class="link-term mercado-item-title" href="{{ route('superadmin.dashboard') }}">Dashboard</a>
							</li>
							<li class="menu-item">
								<a href="{{route('superadmin.schooladmins')}}" class="link-term mercado-item-title"> Manage School Admin</a>
							</li>
							<li class="menu-item">
								<a href="{{route('superadmin.students')}}" class="link-term mercado-item-title"> Manage Students</a>
							</li>
							<li class="menu-item">
								<a href="{{route('superadmin.businessowners')}}" class="link-term mercado-item-title"> Manage Business Owners</a>
							</li>
							<li class="menu-item">
								<a href="{{route('superadmin.chat')}}" class="link-term mercado-item-title">Chat</a>
							</li>
							
							@elseif(auth::user()->utype ==='SADM')
							<li class="menu-item" >
								<a title="Dashboard" href="{{ route('schooladmin.dashboard') }}">Dashboard</a>
							</li>
							<li class="menu-item">
								<a href="{{route('schooladmin.students')}}" class="link-term mercado-item-title">Manage Students</a>
							</li>
							<li class="menu-item">
								<a href="{{route('schooladmin.businessowners')}}" class="link-term mercado-item-title">Manage Business Owners</a>
							</li>
							<li class="menu-item">
								<a href="{{route('schooladmin.chat')}}" class="link-term mercado-item-title">Chat</a>
							</li>
							@elseif(auth::user()->utype ==='BOW')		
							<li class="menu-item" >
								<a class="link-term mercado-item-title" href="{{ route('businessowner.dashboard') }}">Dashboard</a>
							</li>
							<li class="menu-item">
								<a href="{{route('businessowner.products')}}" class="link-term mercado-item-title">Products</a>
							</li>
							<li class="menu-item">
								<a href="{{route('businessowner.returnorder')}}" class="link-term mercado-item-title">Return Order</a>
							</li>
							<li class="menu-item">
								<a href="{{route('businessowner.chat')}}" class="link-term mercado-item-title">Chat</a>
							</li>
							@else
							<li class="menu-item" >
								<a class="link-term mercado-item-title" href="{{ route('student.dashboard') }}">Dashboard</a>
							</li>
							<li class="menu-item">
								<a href="{{ route('student.products') }}" class="link-term mercado-item-title">Products</a>
							</li>
							<li class="menu-item">
								<a href="{{route('student.clubs')}}" class="link-term mercado-item-title">Club</a>
							</li>
							
							<li class="menu-item">
								<a href="{{route('student.chat')}}" class="link-term mercado-item-title">Chat</a>
							</li>
							@endif
							</ul>
						@else
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
								<!-- <li class="menu-item">
									<a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
								</li>																	 -->
							</ul>
						@endif
						@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	{{$slot}}

	<footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			
			<!--End function info-->


			<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright © 2022 Web Data Management. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="#" class="link-term">About us</a></li>								
								<li class="menu-item"><a href="#" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="#" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="#" class="link-term">Return Policy</a></li>								
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<script>
		Talk.ready.then(function () {
  var me = new Talk.User({
    id: '123456',
    name: 'You',
    email: 'alice@example.com',
    photoUrl: 'https://talkjs.com/images/avatar-1.jpg',
    welcomeMessage: 'Hey there! How are you? :-)',
  });
  window.talkSession = new Talk.Session({
    appId: 'tMox9ONZ',
    me: me,
  });
  var other = new Talk.User({
    id: '654321',
    name: 'Customer Support',
    email: 'superadmin1@gmail.com',
    photoUrl: 'https://talkjs.com/images/avatar-5.jpg',
    welcomeMessage: 'Hey, how can I help?',
  });

  var conversation = talkSession.getOrCreateConversation(
    Talk.oneOnOneId(me, other)
  );
  conversation.setParticipant(me);
  conversation.setParticipant(other);

  var inbox = talkSession.createInbox({ selected: conversation });
  inbox.mount(document.getElementById('talkjs-container'));
});
	</script>
    @livewireScripts
</body>
</html>