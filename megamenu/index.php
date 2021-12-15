<html>
	<head>
		<script src="https://use.fontawesome.com/b99b452209.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			body {
				margin: 0;
				padding: 0;
				font-family: sans-serif;
			}
			a {text-decoration: none;}
			.container {
				margin: auto;
				width: 1000px;
			}
			ul {
				padding-left: 0;
				margin-top: 0;
				margin-bottom: 0;
				list-style: none;
			}
			nav {
				background: #d4dee2;
				font-size: 0;
				position: relative;
				background:#cfeefb				
			}
			nav > ul > li {
				display: inline-block;
				font-size: 14px;
				padding: 0 15px;
				position: relative;
				list-style-type: disclosure-closed;
			}
			nav > ul > li > a {
				color: #000;
				display: block;
				padding: 20px 0;
				border-bottom: 3px solid transparent;
				transition: all .3s ease;				
			}
			nav > ul > li:hover > a {
				color: #444; 
				border-bottom: 3px solid deepskyblue;
			}
			.mega-menu {
				background: white;
				visibility: hidden;
				opacity: 0;
				transition: visibility 0s, opacity 0.5s linear;
				position: absolute;
				left: 0;
				width: 100%;
				padding-bottom: 20px;				
				box-shadow: 0 1px 15px 2px silver;
			}
			.mega-menu h3 {color: #444;}

			.mega-menu .container {
				display: flex;
			}
			.mega-menu .item {
				flex-grow: 1;
				margin: 0 10px;
			}
			.mega-menu .item ul{
				margin-bottom:1em
			}
			.mega-menu .item img {
				width: 100%;
			}
			.mega-menu a {
				color: #458dea;
				display: block;
				padding: 0.2em 0;
				display:list-item;
				list-style-type: disclosure-closed;
				list-style-position: inside;				
			}
			.mega-menu a:hover {color: #2d6a91;}
			.dropdown {position: static;}
			.dropdown:hover .mega-menu {
				visibility: visible;
				opacity: 1;
			}			
			#topMenu{
				list-style-type:none;
				width:90%;
				margin: auto				
			}
			#topMenu li, #logoMenu li{
				display:inline-block;
			}			
			#topMenu li a, #logoMenu li a{
				display:block;
				padding:0.5em;
				font-size:0.8em;
				color:slategray
			}
			#topMenu li a{
				border-bottom:1px solid white
			}
			#topMenu li a:hover{
				border-bottom:1px solid silver
			}
			#logoMenu li a{				
				color:slategray
			}			
			#lastItem{
				float:right
			}
			#logoMenu{
				width:90%;
				margin:0 auto;
				list-style-type:none;
				display: flex;
				list-style: none;
				justify-content:center;				
			}			
			.logo{
				flex:auto
			}
			.menuLinks a{
				color: #636d75;
				font-weight: bold;
				background: #f3f3f3;
				padding: 0.5em 1em;
				margin: 0.2em;
				border-radius: 0.5em;
			}
		</style>
		
	</head>
	<body>
		<ul id="topMenu">
			<li><a href="#">Store Locator</a></li>
			<li><a href="#">UAE</a></li>
			<li><a href="#">Franchise Enquiry</a></li>
			<li id="lastItem"><a href="#">Contact us</a></li>
		</ul>
		
		<ul id="logoMenu">
			<li class="logo"><a href="#"><img src='images/logo.jpg' width='100'></a></li>
			<li class='menuLinks'><a href="#">Cart <i class="fa fa-shopping-cart"></i></a></li>
			<li class='menuLinks'><a href="#">Login / Register</a></li>
			<li class='menuLinks'><a href="#">000000000</a></li>
		</ul>
		
		<nav>
		  <ul class="container">
			<li class='dropdown'>
			  <a href='#'>Computer Glasses <i class="fa fa-angle-down"></i></a>
			  <div class='mega-menu'>
				<div class="container">
				  <div class="item">
					  <h3>Men</h3>
					  <ul>
						<li><a href='#'>Men Blue Light Glasses</a></li>
					  </ul>
					  <!-- <img src="images/computerglasses/men.jpg" width='100%'> -->
				  </div>
				  <div class="item">
					  <h3>Women</h3>
					  <ul>
					  <li><a href='#'>Women Blue Light Glasses</a></li>

					  </ul>
					  <!-- <img src="images/computerglasses/women.jpg" width='100%'> -->
				  </div> <!-- /.item -->
				  <div class="item">
					  <h3>Kids</h3>
					  <ul>
					  <li><a href='#'>Kids Blue Light Glasses</a></li>

					  </ul>
					  <!-- <img src="images/computerglasses/kids.jpg" width='100%'> -->
				  </div> <!-- /.item --> 
				  <div class="item">
					 <br>
					 <img src="images/computerglasses/default.jpg" width='100%' style='visibility:hidden'>
				  </div>
				</div><!-- /.container -->
			  </div><!-- /.mega-menu -->
			</li>
			<li class='dropdown'>
			  <a href='#'>Frames <i class="fa fa-angle-down"></i> </a>
			  <div class='mega-menu'>
				<div class="container">
				  <div class="item">
					  <h3>Our Top Picks</h3>
					  <ul>
						<li><a href='#'>New Arrivals</a></li>
						<li><a href='#'>Best Sellers</a></li>
						<li><a href='#'>Trending</a></li>
						<li><a href='#'>Computer Glasses</a></li>
					  </ul>
				  </div>
				  <div class="item">
					  <h3>Brands</h3>
					  <ul>
						<li><a href='#'>Ray-ban</a></li>
						<li><a href='#'>Oakley</a></li>
						<li><a href='#'>Vogue</a></li>
					  </ul>
				  </div>
				  <div class="item">
					  <h3>Frame Type</h3>
					  <ul>
						<li><a href='#'>Full</a></li>
						<li><a href='#'>Half</a></li>
						<li><a href='#'>Rimless</a></li>
					  </ul>
				  </div>				  
				  <div class="item">
					  <h3>Price Range</h3>
					  <ul>
						<li><a href='#'>Under 299</a></li>
						<li><a href='#'>300 to 999</a></li>
						<li><a href='#'>1000 to 1999</a></li>
						<li><a href='#'>2000 to 2999</a></li>
						<li><a href='#'>+ 3000</a></li>
					  </ul>
				  </div>				  
				</div>
			  </div>
			</li>				
			<li class='dropdown'>
			  <a href='#'>Sunglasses <i class="fa fa-angle-down"></i> </a>
			  <div class='mega-menu'>
				<div class="container">
				  <div class="item">
					  <h3>Menu</h3>
					  <ul>
						<li><a href='#'>Glu 0 Computer Glasses</a></li>
						<li><a href='#'>Premium Range from 1099</a></li>
					  </ul>
					  <img src="images/sunglasses/men.jpg" width='100%'>
				  </div>
				  <div class="item">
					  <h3>Women</h3>
					  <ul>
						<li><a href='#'>Glu 0 Computer Glasses</a></li>
						<li><a href='#'>Premium Range from 1099</a></li>
					  </ul>
					  <img src="images/sunglasses/women.jpg" width='100%'>
				  </div>				  
				  <div class="item">
					  <h3>Kids</h3>
					  <ul>
						<li><a href='#'>Glu 0 Computer Glasses</a></li>
						<li><a href='#'>Premium Range from 1099</a></li>
					  </ul>
					  <img src="images/sunglasses/kids.jpg" width='100%'>
				  </div>				
				</div><!-- .container -->
			  </div><!-- .mega-menu-->
			</li>
			<li class='dropdown'>
			  <a href='#'>Contact Lens <i class="fa fa-angle-down"></i> </a>
			  <div class='mega-menu'>
				<div class="container">
				  <div class="item">
					  <h3>Contact Lens</h3>
					  <ul>
						<li><a href='#'>Glu 0 Computer Glasses</a></li>
						<li><a href='#'>Premium Range from 1099</a></li>
					  </ul>
					  <img src="images/contactlens/default.jpg" style="width:200px">
				  </div> <!-- /.item -->
				</div><!-- .container -->
			  </div><!-- .mega-menu-->
			</li>		
			<li class='dropdown'>
			  <a href='#'>Prescription lens <i class="fa fa-angle-down"></i> </a>
			  <div class='mega-menu'>
				<div class="container">
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				</div><!-- .container -->
			  </div><!-- .mega-menu-->
			</li>
			<li class='dropdown'>
			  <a href='#'>Accessories <i class="fa fa-angle-down"></i> </a>
			  <div class='mega-menu'>
				<div class="container">
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				  <div class="item">
					  <h3>Image One</h3>
					  <img src="http://placehold.it/250x200">
				  </div> <!-- /.item -->				  
				</div><!-- .container -->
			  </div><!-- .mega-menu-->
			</li>
			<li><a href='#'>About</a></li>
			<li><a href='#'>Conatct</a></li>
		  </ul>
		</nav>
		<img src='images/slider/1.jpg' width='100%'>
		
	</body>
</html>	