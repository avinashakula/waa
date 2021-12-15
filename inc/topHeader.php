<div class='container'>
    <ul id="topMenu">
        <li><a href="#">Store Locator</a></li>
        <li><a href="#">UAE</a></li>
        <li><a href="#">Franchise Enquiry</a></li>
        <!-- <li id="lastItem"><a href="#">Contact us</a></li> -->
    </ul>		
    <ul id="logoMenu">
        <li class="logo"><a href="/index.php"><img src='/images/logo.png' width='250'></a></li>
        <li class='menuLinks'>
            <a href="cart.php" class=' position-relative'>Cart <i class="fa fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">
                    <div class="spinner-grow spinner-grow-sm text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </li>
        
        <?php 
            if( isset($_SESSION['SESS_DIT_UID']) ){ 
                echo '<li class="menuLinks">                       
                        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                        <ul class="dropdown-menu profileDropDown" aria-labelledby="dropdownMenu2">
                            <li><a href="/user-orders.php" class="dropdown-item" >My Orders</a></li>
                            <li><a href="/user-profile.php" class="dropdown-item" >Profile</a></li>
                            <li><a href="/user-shipping-address.php" class="dropdown-item" >Shipping Address</a></li>
                            <li><a href="/logout.php" class="dropdown-item" >Logout</a></li>                               
                        </ul>                       
                      </li>';
            }else{
                echo "<li class='menuLinks'><a href='/user-login.php'>Login / Register</a></li>";
            }
        ?>       
        
    </ul>
</div>