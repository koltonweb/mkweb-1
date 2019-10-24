<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="/images/favicon.png" type="image/x-icon" />
	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon" />
    <?=$this->getMeta();?>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/animate.min.css">
	<link rel="stylesheet" href="/css/et-line-font.css">
	<link rel="stylesheet" href="/css/nivo-lightbox.css">
	<link rel="stylesheet" href="/css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="/css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-circle">
       <div class="sk-circle1 sk-circle"></div>
       <div class="sk-circle2 sk-circle"></div>
       <div class="sk-circle3 sk-circle"></div>
       <div class="sk-circle4 sk-circle"></div>
       <div class="sk-circle5 sk-circle"></div>
       <div class="sk-circle6 sk-circle"></div>
       <div class="sk-circle7 sk-circle"></div>
       <div class="sk-circle8 sk-circle"></div>
       <div class="sk-circle9 sk-circle"></div>
       <div class="sk-circle10 sk-circle"></div>
       <div class="sk-circle11 sk-circle"></div>
       <div class="sk-circle12 sk-circle"></div>
    </div>
</div>

<!-- navigation section -->
<section class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Веб-мастер</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">Главная</a></li>
				<li><a href="#work" class="smoothScroll">Работа</a></li>
				<li><a href="#about" class="smoothScroll">О разработчике</a></li>
				<li><a href="#portfolio" class="smoothScroll">Портфолио</a></li>
				<li><a href="#pricing" class="smoothScroll">Цены</a></li>
				<li><a href="#contact" class="smoothScroll">Контакты</a></li>
			</ul>
		</div>
	</div>
</section>

<?=$content;?>


<!-- contact section -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<div class="section-title">
					<h1 class="heading bold">ВСЕГДА НА ЗВЯЗИ</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 contact-info">
				<h2 class="heading bold">ДЛЯ СОТРУДНИЧЕСТВА</h2>
				<p>
					Связаться со мной, вы можете любым удобным для вас способом: позвонить на любой из указанных номеров телефона,
					написать письмо на электронную почту, а так же в социальных сетях. Или оставьте заявку, с вашими контактами,
					заполнив форму обратной связи, здесь на сайте. И в течении одного рабочего дня я обязательно свяжусь с вами.  
				</p>
				<div class="col-md-6 col-sm-4">
					<h3><i class="icon-envelope medium-icon wow bounceIn" data-wow-delay="0.6s"></i> EMAIL</h3>
					<p>maxkoltan@mail.ru</p>
				</div>
				<div class="col-md-6 col-sm-4">
					<h3><i class="icon-phone medium-icon wow bounceIn" data-wow-delay="0.6s"></i> PHONES</h3>
					<p>8 (915) 242 02 05 | 090-080-0760</p>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="wow fadeInUp" data-wow-delay="0.6s">
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" id="new-request-nickname" placeholder="Имя" name="name">
					</div>
					<div class="col-md-6 col-sm-6">
						<input type="email" class="form-control" id="new-request-email" placeholder="Email" name="email">
					</div>
					<div class="container ajax-response-info" id="info">
					</div>
					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" id="new-request-message"  placeholder="Сообщение..." rows="7" name="message"></textarea>
					</div>
					<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
						<input type="submit" id="new-request-submit" class="form-control" value="ОТПРАВИТЬ ЗАЯВКУ">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Copyright © Maxkoltan | fullstack development web master <a href="https://e.mail.ru/messages/inbox/" target="_parent">maxkoltan@mail.ru</a></p>
				<hr>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-behance wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-tumblr wow fadeIn" data-wow-delay="0.9s"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/smoothscroll.js"></script>
<script src="/js/isotope.js"></script>
<script src="/js/imagesloaded.min.js"></script>
<script src="/js/nivo-lightbox.min.js"></script>
<script src="/js/jquery.backstretch.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/custom.js"></script>

</body>
</html>