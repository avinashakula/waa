<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Computer Glasses</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/index.php?loc=uae&product_type=computer_glasses&ifor=men">Men Blue Light Glasses</a></li>
            <li><a class="dropdown-item" href="/index.php?loc=uae&product_type=computer_glasses&ifor=women">Women Blue Light Glasses</a></li>
            <li><a class="dropdown-item" href="/index.php?loc=uae&product_type=computer_glasses&ifor=kids">Kids Blue Light Glasses</a></li>
          </ul>
        </li>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Frames</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/index.php?loc=uae&product_type=computer_glasses&ifor=men">Men Blue Light Glasses</a></li>
            <li><a class="dropdown-item" href="/index.php?loc=uae&product_type=computer_glasses&ifor=women">Women Blue Light Glasses</a></li>
            <li><a class="dropdown-item" href="/index.php?loc=uae&product_type=computer_glasses&ifor=kids">Kids Blue Light Glasses</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> -->

<nav>
	<ul class="container navCenter">
	<li class='dropdown'>
		<a href='#'>Computer Glasses <i class="fa fa-angle-down"></i></a>
		<div class='mega-menu'>
		<div class="container">
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=computer_glasses&ifor=men"'>Men Blue Light Glasses</button>
			</div>
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=computer_glasses&ifor=women"'>Women Blue Light Glasses</button>
			</div>
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=computer_glasses&ifor=kids"'>Kids Blue Light Glasses</button>
			</div>
			<div class="dropend">
				<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Brand</button>
				<ul class="dropdown-menu megaSubMenus computer_glasses_menuBrandsList_men" id="menuBrandsList"></ul>
			</div>
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=computer_glasses&arrival=computer_glasses"'>New Arrivals</button>
			</div>
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=computer_glasses&topselling=computer_glasses"'>Top Sellings</button>
			</div>			
		</div>
		</div>
	</li>
	<li class='dropdown'>
		<a href='#'>Frames <i class="fa fa-angle-down"></i> </a>
		<div class='mega-menu'>
		<div class="container">
			<div class='subMenuWrapper'>	
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Brand</button>
					<ul class="dropdown-menu megaSubMenus frames_menuBrandsList_men" id="menuBrandsList"></ul>
				</div>
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Frame Type</button>
					<ul class="dropdown-menu megaSubMenus frames_menuFrameTypesList_men" id="menuFrameTypesList"></ul>
				</div>
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Frame Shapes</button>
					<ul class="dropdown-menu megaSubMenus frames_menuFrameShapesList_men" id="menuFrameShapesList"></ul>
				</div>
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Price</button>
					<ul class="dropdown-menu megaSubMenus frames_menuPricesList_men"></ul>
				</div>						
				<div class="dropend">
					<button type="button" class="btn" aria-expanded="false" onclick="location.href='/index.php?loc=uae&product_type=frames&arrival=frames'">New Arrivals</button>
				</div>
				<div class="dropend">
					<button type="button" class="btn" aria-expanded="false" onclick="location.href='/index.php?loc=uae&product_type=frames&topselling=frames'">Top Sellings</button>
				</div>
			</div>												  
		</div>
		</div>
	</li>				
	<li class='dropdown'>
		<a href='#'>Sunglasses <i class="fa fa-angle-down"></i> </a>
		<div class='mega-menu'>
		<div class="container">
			<div class='subMenuWrapper'>
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Brand</button>
					<ul class="dropdown-menu megaSubMenus sunglasses_menuBrandsList_men" id="menuBrandsList"></ul>
				</div>
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Frame Type</button>
					<ul class="dropdown-menu megaSubMenus sunglasses_menuFrameTypesList_men" id="menuFrameTypesList"></ul>
				</div>
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Frame Shapes</button>
					<ul class="dropdown-menu megaSubMenus sunglasses_menuFrameShapesList_men" id="menuFrameShapesList"></ul>
				</div>
				<div class="dropend">
					<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Price</button>
					<ul class="dropdown-menu megaSubMenus sunglasses_menuPricesList_men" ></ul>
				</div>						
				<div class="dropend">
					<button type="button" class="btn" aria-expanded="false" onclick="location.href='/index.php?loc=uae&product_type=sunglasses&arrival=sunglasses'">New Arrivals</button>
				</div>
				<div class="dropend">
					<button type="button" class="btn" aria-expanded="false" onclick="location.href='product.html?cat=sunglasses&topselling=sunglasses'">Top Sellings</button>
				</div>
			</div>							
		</div><!-- .container -->
		</div><!-- .mega-menu-->
	</li>
	<li class='dropdown'>
		<a href='#'>Contact Lens <i class="fa fa-angle-down"></i> </a>
		<div class='mega-menu'>
		<div class="container">
			<div class='row'>
				<div class='col-6'>
					<h3>Clear</h3>
					<div class='subMenuWrapper'>
						<div class="dropend">
							<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Duration</button>
							<ul class="dropdown-menu megaSubMenus" >
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearduration=daily_contact_lenses'>Daily Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearduration=bi-weekly_contact_lenses'>Bi-Weekly Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearduration=monthly_contact_lenses'>Monthly Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearduration=3_months_contact_lenses'>3 Months Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearduration=all_duration'>All Duration</a></li>
							</ul>
						</div>
						<div class="dropend">
							<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Brands</button>
							<ul class="dropdown-menu megaSubMenus">
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=acuvue_contact_lenses'>Acuvue Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=dailies_contact_lenses'>Dailies Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=air_optix_contact_lenses'>Air Optix Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=biofinity_contact_lenses'>Biofinity Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=biotrue_contact_lenses'>Biotrue Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=clalen_contact_lenses'>Clalen Contact Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=all_brands'>All Brands</a><li>
							</ul>
						</div>
						<div class="dropend">
							<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Solutions & Eye Drops</button>
							<ul class="dropdown-menu megaSubMenus">
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearsolution=alcon'>Alcon</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearsolution=copervision'>Copervision</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearsolution=biotrue'>Biotrue</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&clearsolution=renu'>Renu</a></li>

							</ul>
						</div>
						<div class="dropend">
							<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=contact_lens&arrival=clear"'>New Arrivals</button>
						</div>
						<div class="dropend">
							<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=contact_lens&topselling=clear"'>Top Sellings</button>
						</div>

					</div>	
				</div>
			
				<div class='col-6'>
					<h3>Color</h3>
					<div class='subMenuWrapper'>
						<div class="dropend">
							<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Duration</button>
							<ul class="dropdown-menu megaSubMenus">
								<li><a href='/index.php?loc=uae&product_type=contact_lens&colorduration=daily_colored_lenses'>Daily Colored Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&colorduration=monthly_colored_lenses'>Monthly Colored Lenses</a></li>									
								<li><a href='/index.php?loc=uae&product_type=contact_lens&colorduration=3_months_colored_lenses'>3 Months Colored Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&colorduration=6_months_colored_lenses'>6 Months Colored Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&colorduration=yearly_colored_lenses'>Yearly Colored Lenses</a></li>									
								<li><a href='/index.php?loc=uae&product_type=contact_lens&colorduration=all_duration'>All Duration</a></li>
							</ul>
						</div>
						<div class="dropend">
							<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Brands</button>
							<ul class="dropdown-menu megaSubMenus">
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=bella_lenses'>Bella Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=freshlook_lenses'>Freshlook Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=anesthesia_lenses'>Anesthesia Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=amara_lenses'>Amara Lenses</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&brand=all_brands'>All Brands</a></li>
							</ul>
						</div>
						<div class="dropend">
							<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Color</button>
							<ul class="dropdown-menu megaSubMenus">
								<li><a href='/index.php?loc=uae&product_type=contact_lens&contactlenscolor=yellow'>Yellow</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&contactlenscolor=blue'>Blue</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&contactlenscolor=green'>Green</a></li>
								<li><a href='/index.php?loc=uae&product_type=contact_lens&contactlenscolor=pink'>Pink</a></li>
							</ul>
								
						</div>	
						<div class="dropend">
							<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=contact_lens&arrival=color"'>New Arrivals</button>
						</div>
						<div class="dropend">
							<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=contact_lens&topselling=color"'>Top Sellings</button>
						</div>			
					</div>	
				</div>	
			</div>	
			
		</div><!-- .container -->
		</div><!-- .mega-menu-->
	</li>		
	<li class='dropdown'>
		<a href='#'>Prescription lens <i class="fa fa-angle-down"></i> </a>
		<div class='mega-menu'>
		<div class="container">
			<div class="dropend">
				<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Lens Types</button>
				<ul class="dropdown-menu megaSubMenus prescription_lens_menuPrescriptionLensTypesList_men" id="menuBrandsList"></ul>
			</div>	
			<div class="dropend">
				<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Brand</button>
				<ul class="dropdown-menu megaSubMenus prescription_lens_menuBrandsList_men" id="menuBrandsList"></ul>
			</div>	
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=prescription_lens&arrival=prescription_lens"'>New Arrivals</button>
			</div>
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=prescription_lens&topselling=prescription_lens"'>Top Sellings</button>
			</div>					  
		</div>
		</div>
	</li>
	<li class='dropdown'>
		<a href='#'>Accessories <i class="fa fa-angle-down"></i> </a>
		<div class='mega-menu'>
		<div class="container">
			<div class="dropend">
				<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Accessories List</button>
				<ul class="dropdown-menu megaSubMenus accessories_menuAccessoriesList_men" id="menuBrandsList"></ul>
			</div>
			<div class="dropend">
				<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Brand</button>
				<ul class="dropdown-menu megaSubMenus accessories_menuBrandsList_men" id="menuBrandsList"></ul>
			</div>	 
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=accessories&arrival=accessories"'>New Arrivals</button>
			</div>
			<div class="dropend">
				<button type="button" class="btn" onclick='location.href="/index.php?loc=uae&product_type=accessories&topselling=accessories"'>Top Sellings</button>
			</div>	 
		</div>
		</div>
	</li>
	<!-- <li><a href='#'>About</a></li>
	<li><a href='#'>Contact</a></li> -->
	</ul>
</nav>
		<script>
			function titleCase(str) {
				var splitStr = str.toLowerCase().split(' ');
				for (var i = 0; i < splitStr.length; i++) {				
					splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
				}
				return splitStr.join(' '); 
			}
			let brands = ["ray ban","oakley","maui jim","americal optical","tom ford","persol","oliver peoples","prada","mykita","randolph"];
			let accessoriesList = ["Supporting Rope", "Contact Lens Case", "Contact Lens Solution", "Reading Glasses", "Cleaning cloth", "Spray Cleaner for Glasses"];
			let frameTypes = ["full","half","rimless"];
			let frameShapes = ["round","oval","aviator","squared","hexagon","octagon","rectanguler","cat eye","mshape glasses","semi aviator","wrap around","mix shape"];
			let framePrices = ["199","299","399","499","500"];
			let prescriptionLensTypes = ["single vision","bifocal","progressive"];
			function menuList(list, key, drop, type, ifor){				
				let brandsList = "";
				for(let i=0; i<list.length; i++){					
					// brandsList = brandsList + `<li><a href='./products.html?ifor=${ifor}&type=${type}&${key}=${brands[i]}'>${titleCase(list[i])}</a><li>`;
					// /index.php?loc=uae&product_type=frames&brand=ray_ban
					let modifiedKey = list[i].split(" ").join("_");
					let appendText = "";
					if( key == "price" ){
						appendText = "under AED";
					}
					brandsList = brandsList + `<li><a href='/index.php?loc=uae&product_type=${type}&${key}=${modifiedKey}'>${appendText} ${titleCase(list[i])}</a><li>`;
				}
				var i;
				for (i = 0; i < drop.length; i++) {
					drop[i].innerHTML = brandsList;
				}
			}
			
			function updateFramesMenu(type){
				if( type == "computer_glasses" ){
					let drop1 = document.getElementsByClassName(`${type}_menuBrandsList_men`);menuList(brands, "brand", drop1, type, 'men');
				}else if( type == "prescription_lens" ){
					let drop1 = document.getElementsByClassName(`${type}_menuBrandsList_men`);menuList(brands, "brand", drop1, type, 'men');
					let drop2 = document.getElementsByClassName(`${type}_menuPrescriptionLensTypesList_men`);menuList(prescriptionLensTypes, "prescription_lens", drop2, type, 'men');
				}else if( type == "accessories" ){
					let drop1 = document.getElementsByClassName(`${type}_menuBrandsList_men`);menuList(brands, "brand", drop1, type, 'men');
					let drop2 = document.getElementsByClassName(`${type}_menuAccessoriesList_men`);menuList(accessoriesList, "accessories", drop2, type, 'men');
				}else{
					let drop1 = document.getElementsByClassName(`${type}_menuBrandsList_men`);menuList(brands, "brand", drop1, type, 'men');
					let drop2 = document.getElementsByClassName(`${type}_menuFrameTypesList_men`);menuList(frameTypes, "frame_type", drop2, type, 'men');					
					let drop3 = document.getElementsByClassName(`${type}_menuFrameShapesList_men`);menuList(frameShapes, "frame_shape", drop3, type, 'men');					
					let drop4 = document.getElementsByClassName(`${type}_menuPricesList_men`);menuList(framePrices, "price", drop4, type, 'men');			
				}
			}
			updateFramesMenu("computer_glasses");
			updateFramesMenu("frames");
			updateFramesMenu("sunglasses");
			updateFramesMenu("prescription_lens");
			updateFramesMenu("accessories");
		</script>