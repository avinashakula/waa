 <div class="row mx-1 rounded shadow-lg " id='cartBlock'>
    <div class="">        
        <table class="table table-sm table-borderless table-condensed table-striped my-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th class='text-center' scope="col">Qty</th>
                <th class='text-center' scope="col">Unit Price</th>
                <th class='text-center' scope="col">Price</th>
                </tr>
            </thead>
            <tbody id="cartList"></tbody>
        </table>
    </div>   
    
</div>


<style>
   
</style>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="./js/cart.js"></script>

<script>
    
    // let cart = {
    //     cart: null,
    //     qty:0,
    //     addToCart: function(){            
    //         let itemInfo = {
    //             "id":10,
    //             "name":"Oakly Blue Glasses 11",
    //             "price":281.00,
    //             "qty":1
    //         };
    //         let eyeCart = localStorage.getItem('eyeCart');
    //         if(!eyeCart){
    //             localStorage.setItem('eyeCart', JSON.stringify([itemInfo]));  
    //             cart.increaseCart();      
    //         }else{
    //             let eyeCartOpen = JSON.parse(eyeCart);            
    //             let isExisted = eyeCartOpen.findIndex(function(obj){
    //                 return obj.id==10;
    //             });
    //             if(isExisted == -1){
    //                 eyeCartOpen.push(itemInfo);
    //                 localStorage.setItem('eyeCart', JSON.stringify(eyeCartOpen));
    //                 cart.increaseCart();
    //             }else{
    //                 console.log("isExisted"+isExisted);
    //                 eyeCartOpen[isExisted].qty = eyeCartOpen[isExisted].qty + 1;
    //                 localStorage.setItem('eyeCart', JSON.stringify(eyeCartOpen));
    //                 cart.increaseCart();                    
    //             }                
    //         }
    //     },       
    //     increaseCart: function(){
    //         this.qty = this.qty+1;
    //         this.cartCount.innerText = this.qty;
    //     },
    //     cartCount: document.getElementById('cartCount'),
    //     cartList: document.getElementById('cartList'),
	// 	cartBlock: document.getElementById('cartBlock'),
    //     refreshCartCount: function(){
    //         let eyeCart = localStorage.getItem('eyeCart');
    //         if(!eyeCart){
    //             this.cartCount.innerText = 0;
    //         }else{
    //             let eyeCartOpen = JSON.parse(eyeCart);    
    //             let count = 0;        
    //             eyeCartOpen.filter(function(obj){
    //                 count = count+obj.qty;
    //             });
    //             this.qty = count;
    //             this.cartCount.innerText = count;
    //         }
    //     },
    //     refreshCart: function(){
    //         let cartListTr = "";
    //         let eyeCart = localStorage.getItem('eyeCart');
    //         if(!eyeCart){
    //            cartListTr = cartListTr + "<tr><td colspan='5' class='text-center'>Your cart is empty</td></tr>";                     
    //         }else{
    //             let eyeCartOpen = JSON.parse(eyeCart);  
    //             let id = 1;        
    //             let total = 0;  
    //             eyeCartOpen.filter(function(obj){
    //                 let indivTotal = obj.qty * obj.price;
    //                 total = total + indivTotal;
    //                 cartListTr = cartListTr + `<tr>
    //                     <th scope='row'>${id}</th>
    //                     <td>${obj.name}</td>
    //                     <td class='text-center'>${obj.qty}</td>
    //                     <td class='text-center'>${obj.price}</td>
    //                     <td class='text-center'>${indivTotal}</td>
    //                 </tr>`;  
    //                 id++;
                    
    //             });
                
    //             cartListTr = cartListTr + `<tr><td colspan='4'></td><td class='table-active text-center'><b>${total}</b></td></tr>`;
    //             cartListTr = cartListTr + `<tr><td colspan='5' style='text-align:right'><button class='btn btn-primary btn-lg' id='proceedToPay'>Proceed to Pay</button></td></tr>`;
                
    //             console.log(total);     
    //             cart.totalBill = total;          
    //         }
    //         this.cartList.innerHTML = cartListTr;
    //     },
    //     proceedToPay: function(){            
    //         cart.updateBill();
    //     },
    //     updateBill: function(){
    //         let eyeCart = localStorage.getItem('eyeCart');
    //         let serve = `${mainUrl}/serve_cart.php?amt=${cart.totalBill}&cart=${eyeCart}&user=<?php echo $_SESSION['SESS_DIT_UID']; ?>`;
    //         axios.get(serve)
    //                 .then(response => {
    //                     const users = response.data;
    //                     let items = "";
    //                     console.log("users "+JSON.stringify(users));
    //                     if( users.status == true){
    //                         localStorage.removeItem('eyeCart');
	// 						let successMessage = `<div class='alert alert-success' role='alert' style='margin-bottom:0'>
	// 						  <h4 class='alert-heading'>Order placed successfully!</h4>
	// 						  <p>Thank you for placing order, your order will be received soon.</p>
	// 						  <p>Status of the order will be recieved accordingly through Email and Mobile.</p>
	// 						</div>`;
	// 						this.cartBlock.innerHTML = successMessage;
	// 						this.refreshCartCount();
    //                         //window.location.href = "payment/pay.php?checkout=automatic";
    //                     }
                       
    //                 })
    //                 .catch(error => console.error(error));
    //     },
    //     totalBill: 10,
    //     init: function(){
    //         this.refreshCartCount();
    //         this.refreshCart();
    //         setTimeout(() => {
    //             document.getElementById('proceedToPay').addEventListener('click', this.proceedToPay)     
    //         }, 2000);
    //     }
    // };  
    // cart.init();  
    
</script>