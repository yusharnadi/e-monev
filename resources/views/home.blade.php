<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the apple mobile web app capable -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the apple mobile web app status bar style -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- set the description -->
	<meta name="description" content="Si Perkasa Sistem Informasi pada Bagian Perekonomian dan SDA">
	<!-- set the Keyword -->
	<meta name="keywords" content="Sistem Informasi pada Bagian Perekonomian dan SDA, singkawang, setda">
	<meta name="author" content="Digitaldev">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}" type="image/x-icon">
	<title>Beranda | SIPERKASA</title>
	<!-- include the site stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7COswald:400,700" rel="stylesheet">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('landing')}}/css/bootstrap.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('landing')}}/css/plugins.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('landing')}}/css/font-awesome.min.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('landing')}}/style.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('landing')}}/css/colors.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('landing')}}/css/responsive.css">
	<!-- include the site stylesheet -->
	<style class="color_css"></style>
</head>
<body>
	<!-- Wrapper of the page -->
	<div id="wrapper">
		<!-- Header of the page -->
		<header id="header">
			<div class="container">
				<div class="holder center-block">
					<!-- Logo of the page -->
					<div class="logo">
						<a href="#">
							<img src="{{asset('landing')}}/images/siperkasa-dark.png" alt="SIPERKASA" class="light img-responsive">
							<img src="{{asset('landing')}}/images/siperkasa-light.png" alt="SIPERKASA" class="dark img-responsive">
						</a>
					</div>
					<!-- Logo of the page end -->
					<!-- Navbar of the page -->
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<a href="{{route('login')}}" class="btn btn-default btn-white">Login</a>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#" data-scroll-nav="0">Beranda</a></li>
								<li><a href="#" data-scroll-nav="1">Aspek</a></li>
								<li><a href="#" data-scroll-nav="2">Penilaian Kinerja</a></li>
								<li><a href="#" data-scroll-nav="3">Kontak</a></li>
								{{-- <li><a href="#" data-scroll-nav="4">pricing</a></li> --}}
							</ul>
						</div>
					</nav>
					<!-- Navbar of the page end -->
				</div>
			</div>
		</header>
		<!-- Header of the page end -->
		<!-- Main of the page -->
		<main id="main">
			<!-- Hero area of the page -->
			<section class="hero-area banner text-left overlay" style="background-image: url({{asset('landing')}}/images/hero.jpg);" data-scroll-index="0">
				<div class="holder">
					<div class="container">
						<div class="row">
							<header class="heading-holder col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
								<h1>SI PERKASA</h1>
								<p>Optimalisasi Pembinaan (Evaluasi dan Monitoring) Perumda melalui Sistem Informasi pada Bagian Perekonomian dan SDA AMGP Kota Singkawang.</p>
								<a href="#" class="btn btn-default btn-white">Learn More</a>
								{{-- <a href="#" class="btn btn-default btn-white">Download</a> --}}
							</header>
						</div>
					</div>
				</div>
			</section>
			<!-- Hero area of the page end -->
			<!-- Features area of the page -->
			<section class="features-area container" data-scroll-index="1">
				<div class="row">
					<header class="col-xs-12 heading-wrap col-sm-6 col-sm-offset-3 text-center">
						<h2>Aspek-aspek <br>Evaluasi <span class="text-bright">Kinerja Perumda</span></h2>
					</header>
				</div>
				<!-- Features of the page -->
				<ul class="features-list">
                    <li>
						<div class="icon-holder">
							<img src="{{asset('landing')}}/images/calculator.svg" width="52" height="60" alt="icon calculator" class="img-responsive">
						</div>
						<h3><a href="#">Aspek Keuangan</a></h3>
						<p>Penilaian yang mencakup kemampuan PDAM untuk menciptakan laba dan mengefisienkan kegiatan operasionalnya.</p>
					</li>
                    <li>
						<div class="icon-holder">
							<img src="{{asset('landing')}}/images/clock.svg" width="56" height="50" alt="icon clock" class="img-responsive">
						</div>
						<h3><a href="#">Aspek Pelayanan</a></h3>
						<p>Penilaian bertujuan untuk mengukur perspektif pelayanan yang menggambarkan tingkat kemampuan PDAM memenuhi kebutuhan pelanggannya.</p>
					</li>
					
					<li>
						<div class="icon-holder">
							<img src="{{asset('landing')}}/images/cleaning.png" width="37" height="51" alt="icon cleaning" class="img-responsive">
						</div>
						<h3><a href="#">Aspek Operasional</a></h3>
						<p>Penilaian kinerja aspek operasional bertujuan untuk mengukur tingkat perspektif operasional</p>
					</li>
					<li>
						<div class="icon-holder">
							<img src="{{asset('landing')}}/images/id-card.svg" width="54" height="52" alt="icon id-card" class="img-responsive">
						</div>
						<h3><a href="#">Aspek SDM</a></h3>
						<p>Penilaian kinerja aspek sumber daya manusia bertujuan untuk mengukur tingkat inovasi dan pembelajaran dalam kaitannya dengan pengelolaan PDAM.</p>
					</li>
					
					{{-- <li>
						<div class="icon-holder">
							<img src="{{asset('landing')}}/images/calendar.svg" width="49" height="51" alt="icon calandar" class="img-responsive">
						</div>
						<h3><a href="#">Daily report</a></h3>
						<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore.</p>
					</li> --}}
				</ul>
				<!-- Features of the page end -->
			</section>
			<!-- Features area of the page end -->
			<!-- Product Features of the page -->
			<section class="container product-features" data-scroll-index="2">
				<div class="row sameheight-container">
					<!-- Descr of the page -->
					<div class="col-xs-12 col-sm-6 descr sameheight">
						<div class="align">
							<h2>Hasil Penilaian Kinerja Perumda AMGP.</h2>
							<p>Adapun hasil penilaian kinerja ini merupakan data periode tahun {{$kinerja->tahun}}. Proses Pelaporan dilakukan selama 4 kali dari periode triwulan 1 sampai triwulan 4 ditahun tersebut.</p>
							<ul class="facts-list">
                                <li>
									<h3><span class="">{{$kinerja->tahun}}</span><span class="text-block">Tahun</span></h3>
								</li>
								<li>
									<h3><span class="">{{$penilaian['total_bobot']}}</span><span class="text-block">Nilai</span></h3>
								</li>
								<li>
									<h3>Sehat<span class="text-block">Kategori</span></h3>
								</li>
							</ul>
						</div>
					</div>
					<!-- Descr of the page end -->
					<!-- img holder of the page -->
					<div class="img-holder sameheight col-xs-12 col-sm-6">
						<img src="http://placehold.it/765x745" alt="image description" class="img-responsive">
					</div>
					<!-- img holder of the page end -->
				</div>
			</section>
			<!-- Product Features of the page end -->
			<!-- Demo block of the page -->
			<aside class="demo-block">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-7">
							<h2>Ada pertanyaan, seputar .... ?</h2>
							<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam.</p>
						</div>
						<div class="col-xs-12 col-md-5">
                            {{-- <a href="#" class="btn btn-default btn-white">Hubungi Kami</a> --}}
							<ul>
								<li><a href="#" class="btn btn-default btn-white">Hubungi Kami</a></li>
							</ul>
						</div>
					</div>
				</div>
			</aside>
			<!-- Demo block of the page end -->
			<!-- Testimonials of the page -->
			{{-- <section class="testimonials text-center" data-scroll-index="3">
				<div class="container">
					<div class="row">
						<header class="col-xs-12 heading-wrap col-sm-6 col-sm-offset-3 text-center">
							<h2>More than <span class="text-bright">20,000+ Customers</span>, <br>see some wishes here.</h2>
						</header>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<!-- Testimonials gallery of the page -->
						<div class="testimonials-gallery">
							<!-- Testimonials mask of the page -->
							<div class="testimonials-mask">
								<div class="testimonials-slide">
									<blockquote>
										<q>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium<br> lectorum. Mirum est notare quam littera gothica, </q>
										<cite>
											<strong class="name">David Ramon</strong>
											<span class="subtitle">Project Manager, D360-Studio</span>
										</cite>
									</blockquote>
								</div>
							</div>
							<!-- Testimonials mask of the page end -->
							<!-- Testimonials mask of the page -->
							<div class="testimonials-mask">
								<div class="testimonials-slide">
									<blockquote>
										<q>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium<br> lectorum. Mirum est notare quam littera gothica, </q>
										<cite>
											<strong class="name">David Ramon</strong>
											<span class="subtitle">Project Manager, D360-Studio</span>
										</cite>
									</blockquote>
								</div>
							</div>
							<!-- Testimonials mask of the page end -->
							<!-- Testimonials mask of the page -->
							<div class="testimonials-mask">
								<div class="testimonials-slide">
									<blockquote>
										<q>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium<br> lectorum. Mirum est notare quam littera gothica, </q>
										<cite>
											<strong class="name">David Ramon</strong>
											<span class="subtitle">Project Manager, D360-Studio</span>
										</cite>
									</blockquote>
								</div>
							</div>
							<!-- Testimonials mask of the page end -->
						</div>
						<!-- Testimonials gallery of the page end -->
					</div>
				</div>
				<aside class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="aligncenter col-xs-12">
								<img src="http://placehold.it/850x415" alt="image description" class="img-responsive">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 heading-wrap btn-holder col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3 text-center">
							<h2>Our software is totally customisable and easy to use, <span class="text-bright">no need to know anything!</span></h2>
							<a href="#" class="btn btn-info">Purchase now</a>
						</div>
					</div>
				</aside>
			</section> --}}
			<!-- Testimonials of the page end -->
			<!-- Video block of the page -->
			{{-- <aside class="video-block">
				<div class="video overlay">
					<img src="{{asset('landing')}}/images/hero.jpg" alt="Si Perkasa" class="img-responsive">
					<a href="http://www.youtube.com/embed/9bZkp7q19f0?autoplay=1" class="ico-play lightbox fancybox.iframe"></a>
				</div>
			</aside> --}}
			<!-- Video block of the page end -->
			
			<!-- Trial block of the page -->
			<section class="trial-block container">
				<div class="row">
					<div class="alignleft">
						<img src="http://placehold.it/665x460" alt="image description" class="img-responsive">
					</div>
					<div class="col-xs-12 col-sm-6 descr">
						<div class="align">
							<header class="heading-wrap">
								<h2>Try our free trial today. If you don’t like, you can cancel it anytime!</h2>
							</header>
							<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
							<a href="#" class="btn btn-info">Try our demo</a>
						</div>
					</div>
				</div>
			</section>
			<!-- Trial block of the page end -->
			<!-- Brands area of the page -->
			<aside class="brands-area container">
				<div class="row">
					<header class="col-xs-12 heading-wrap col-sm-6 col-sm-offset-3 text-center">
						<h2>Link <span class="text-bright">Terkait</span></h2>
					</header>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<!-- Logos list of the page -->
						<ul class="list-unstyled line-slider">
							<li><a href="#"><img src="{{asset('landing')}}/images/logo-bpspam.png" alt="Logo BPSPAM PUPR" class="img-responsive"></a></li>
                            <li><a href="#"><img src="{{asset('landing')}}/images/logo-pemkot.png" alt="Logo Singkawang" class="img-responsive"></a></li>
                            <li><a href="#"><img src="{{asset('landing')}}/images/logo-pdam.png" alt="Logo Pdam Gunung poteng singkawang" class="img-responsive"></a></li>
						</ul>
						<!-- Logos list of the page end -->
					</div>
				</div>
			</aside>
			<!-- Brands area of the page end -->
		</main>
		<!-- Main of the page end -->
		<!-- Footer of the page -->
		<footer id="footer">
			<!-- Aside of the page -->
			<aside class="aside">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center col-sm-6 col-sm-offset-3">
							<div class="logo"><a href="#"><img src="{{asset('landing')}}/images/siperkasa-dark.png" alt="SIPERKASA"></a></div>
							<p>Sistem Informasi pada Bagian Perekonomian dan SDA</p>
							<!-- Social Networks of the page -->
							<ul class="social-networks">
								<li><a href="https://www.instagram.com/bagianperekonomian.singkawang/"><span class="fa fa-instagram"></span></a></li>
								<li><a href="#"><span class="icon ico-facebook"></span></a></li>
								<li><a href="https://www.youtube.com/channel/UChPpebSOlGC_i86TSh8c_Ew"><span class="fa fa-youtube"></span></a></li>
								<li><a href="mailto:perekonomiansetdaskw@gmail.com"><span class="icon ico-mail"></span></a></li>
							</ul>
							<!-- Social Networks of the page end -->
						</div>
					</div>
				</div>
			</aside>
			<!-- Aside of the page end -->
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4 text-center">
						<p>&copy; Copyright 2023, SI PERKASA | BAGIAN PEREKONOMIAN <br>PEMERINTAH KOTA SINGKAWANG</p>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer of the page end -->
		<!-- Back Top of the page -->
    	<span id="back-top" class="fa fa-angle-up"></span>
    	<div id="loader" class="loader-holder">
			<div class="block"><img src="{{asset('landing')}}/images/svg/hearts.svg" width="100" alt="loader"></div>
		</div>
	</div>
	<!-- Wrapper of the page end -->
	<!-- include jQuery -->
	<script src="{{asset('landing')}}/js/jquery.js"></script>
	<!-- include jQuery -->
	<script src="{{asset('landing')}}/js/plugins.js"></script>
	<!-- include jQuery -->
	<script src="{{asset('landing')}}/js/jquery.main.js"></script>
	{{-- <div id="style-changer" data-src="style-changer.html"></div> --}}
</body>
</html>