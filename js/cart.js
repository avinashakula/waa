let cart = {
        cart: null,
        qty:0,
        addToCart: function(){            
            let itemInfo = {
                "id":10,
                "name":"Oakly Blue Glasses 11",
                "price":281.00,
                "qty":1
            };
            let eyeCart = localStorage.getItem('eyeCart');
            if(!eyeCart){
                localStorage.setItem('eyeCart', JSON.stringify([itemInfo]));  
                cart.increaseCart();      
            }else{
                let eyeCartOpen = JSON.parse(eyeCart);            
                let isExisted = eyeCartOpen.findIndex(function(obj){
                    return obj.id==10;
                });
                if(isExisted == -1){
                    eyeCartOpen.push(itemInfo);
                    localStorage.setItem('eyeCart', JSON.stringify(eyeCartOpen));
                    cart.increaseCart();
                }else{
                    console.log("isExisted"+isExisted);
                    eyeCartOpen[isExisted].qty = eyeCartOpen[isExisted].qty + 1;
                    localStorage.setItem('eyeCart', JSON.stringify(eyeCartOpen));
                    cart.increaseCart();                    
                }                
            }
        },       
        increaseCart: function(){
            this.qty = this.qty+1;
            this.cartCount.innerText = this.qty;
        },
        cartCount: undefined,
        cartList: undefined,
		cartBlock: undefined,
        refreshCartCount: function(){
            let eyeCart = localStorage.getItem('eyeCart');
            if(!eyeCart){
                this.cartCount.innerText = 0;
            }else{
                let eyeCartOpen = JSON.parse(eyeCart);    
                let count = 0;        
                eyeCartOpen.filter(function(obj){
                    count = count+obj.qty;
                });
                this.qty = count;
                this.cartCount.innerText = count;
            }
        },
        refreshCart: function(){
            let cartListTr = "";
            let eyeCart = localStorage.getItem('eyeCart');
            if(!eyeCart){
               cartListTr = cartListTr + "<tr><td colspan='5' class='text-center'>Your cart is empty</td></tr>";                     
            }else{
                let eyeCartOpen = JSON.parse(eyeCart);  
                let id = 1;        
                let total = 0;  
                let finalTotal = 0;
                eyeCartOpen.filter(function(obj){
                    let indivTotal = obj.qty * obj.price;
                    total = total + indivTotal;
                    cartListTr = cartListTr + `<tr>
                        <td scope='row'>${id}</td>
                        <td>${obj.name}</td>
                        <td class='text-center'>${obj.qty}</td>
                        <td class='text-center'>${obj.price}</td>
                        <td class='text-center'>${indivTotal}</td>
                    </tr>`;  
                    id++;
                    
                });
                let vat = (total * 5)/100;
                
                finalTotal = total + 13 + vat;
                cartListTr = cartListTr + `<tr><td colspan='4'></td><td class='text-center'>${total} AED</td></tr>`;
                cartListTr = cartListTr + `<tr><td colspan='4'></td><td class='text-center'>Shipping 13 AED</td></tr>`;
                cartListTr = cartListTr + `<tr><td colspan='4'></td><td class='text-center'>VAT(5%) ${vat} AED</td></tr>`;
                cartListTr = cartListTr + `<tr><td colspan='4'></td><td class='table-active text-center'><b>${finalTotal} AED</b></td></tr>`;
                cartListTr = cartListTr + `<tr><td colspan='5' style='text-align:right' class='py-3'><button class='btn btn-primary btn-md' id='proceedToPay'>Proceed to Pay</button></td></tr>`;
                
                console.log(total);     
                cart.totalBill = total + 13;          
                cart.finalTotal = finalTotal; 
                cart.vat = vat;         
            }
            this.cartList.innerHTML = cartListTr;
        },
        getShippingAddress: function(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
              let c = ca[i];
              while (c.charAt(0) == ' ') {
                c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
              }
            }
            return "";
        },
        isLoggedIn: function(){
            let serve = `../api/isLoggedIn.php`;
            axios.post(serve)
                    .then(response => {
                        const users = response.data;
                        if( users.status ){
                            if( cart.verifyShippingAddress() ){
                                cart.payButton.innerText = "Placing Order..";
                                cart.updateBill(users.userid);
                                return users.status;
                            }else{                                
                                location.href='../user-shipping-address.php'
                                cart.payButton.disabled = false;
                                cart.payButton.innerText = "Proceed to Pay";
                            }
                        }else{
                            location.href='../user-login.php'
                        }
                        // if( cart.getShippingAddress('street') !="" ){
                        //     users.status ? (cart.payButton.innerText = "Placing Order..", cart.updateBill(users.userid)) : location.href='../user-login.php'
                        //     return users.status;
                        // }else{
                        //     alert("Shipping Address is empty");
                        //     cart.payButton.disabled = false;
                        //     cart.payButton.innerText = "Proceed to Pay";
                        // }                                         
                    })
                    .catch(error => console.error(error));
        },
        verifyShippingAddress: function(){
            if( localStorage.getItem('shippingAddress') ){
                let shipping = JSON.parse(localStorage.getItem('shippingAddress'));
                if( 
                    shipping[0].street=="" || 
                    shipping[0].city=="" || 
                    shipping[0].state=="" || 
                    shipping[0].pincode=="" || 
                    shipping[0].country=="" || 
                    shipping[0].firstname=="" || 
                    shipping[0].shippingContact1=="" || 
                    shipping[0].email==""
                ){
                   return false; 
                }else{
                    return true;
                }
            }else{
                return false;
            }
        },
        proceedToPay: function(){ 
            cart.payButton.disabled = true;
            cart.payButton.innerText = "Please wait..";
            cart.isLoggedIn()
            //  ? cart.updateBill() : alert("Login First")
        },
        updateBill: function(userid){
            let eyeCart = localStorage.getItem('eyeCart');
            let shippingAddress = localStorage.getItem('shippingAddress');
            let serve = `${mainUrl}/serve_cart.php?amt=${cart.totalBill}&cart=${eyeCart}&user=${userid}&shippingAddress=${shippingAddress}&finalTotal=${cart.finalTotal}&vat=${cart.vat}&shipping=${cart.shipping}`;
            axios.get(serve)
                    .then(response => {
                        const users = response.data;
                        if( users.status == true){
                            localStorage.removeItem('eyeCart');
							let successMessage = `<div class='alert alert-success' role='alert' style='margin-bottom:0'>
							  <h4 class='alert-heading'>Order placed successfully!</h4>
							  <p>Thank you for placing order, your order will be received soon.</p>
							  <p>Status of the order will be recieved accordingly through Email and Mobile.</p>
							</div>`;
							this.cartBlock.innerHTML = successMessage;
							this.refreshCartCount();
                            //window.location.href = "payment/pay.php?checkout=automatic";
                        }                       
                    })
                    .catch(error => console.error(error));
        },
        totalBill: 0,
        finalTotal: 0,
        vat: 0,
        shipping: 13,
        payButton: undefined,
        isLoggedIn2: function(){
            let serve = `../api/isLoggedIn.php`;
            axios.post(serve)
                    .then(response => {
                        const users = response.data;
                        users.status ? window.location.href="./user-shipping-address.php" : window.location.href="./user-login.php";
                    })
                    .catch(error => console.error(error));
        },
        editShippingAddress: undefined,
        init: function(){
            this.cartCount = document.getElementById('cartCount');
            this.cartList = document.getElementById('cartList');
            this.cartBlock = document.getElementById('cartBlock');
            this.refreshCart();
            this.payButton = document.querySelector('#proceedToPay');
            this.payButton && this.payButton.addEventListener('click', cart.proceedToPay); 
            this.editShippingAddress = document.querySelector('#editShippingAddress');
            this.editShippingAddress && this.editShippingAddress.addEventListener('click', cart.isLoggedIn2);
            
        }
    };  
    cart.init();  