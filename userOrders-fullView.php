<!-- <div class="row mx-1 rounded shadow-lg">
    <div class="">        
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col">Order Id #</th>
                <th scope="col">Total Bill</th>
				<th scope="col">Status</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="cartList"></tbody>
        </table>
    </div>
    
    
</div> -->

<div class='row mx-1' id="cartList"></div>




<!-- Modal -->
<div class="modal fade" id="viewOrderFullViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





<style>
   
</style>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    let cart = {
        cart: null,
        qty:0,
        monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
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
        cartCount: document.getElementById('cartCount'),
        cartList: document.getElementById('cartList'),
        
        renderOrders: function(cartyy){
            
            document.getElementById('cartList').innerHTML = `<div class='text-center'><img src='images/loading.gif' width='25'><br />Please Wait<br />Fetching your orders...</div>`;
            let cartListTr = "";
            let eyeCart = cartyy;
            if(!eyeCart){
               cartListTr = cartListTr + "<p class='text-center'>Your cart is empty</p>";                     
            }else{
                let eyeCartOpen = eyeCart;  
                let id = 1;   
                eyeCartOpen.filter(function(orderRow){
					console.log("each row "+JSON.stringify(orderRow));
                    var timestamp=new Date(orderRow[3]).getTime();
                    var todate=new Date(timestamp).getDate();
                    var tomonth=new Date(timestamp).getMonth();
                    var toyear=new Date(timestamp).getFullYear();
                    var original_date = orderRow[3]!="0000-00-00 00:00:00" ? (cart.monthNames[tomonth]+' '+todate+' '+toyear) : '-';
                    let status = "";
                    let cancelBtn = "";
                    let returnBtn = "";
                    if( orderRow[5] == 0 ){
                        status = 'Pending';
                        cancelBtn = "<a class='btn btn-sm btn-danger cancelOrder' data-id='${orderRow[0]}' >Cancel <i class='fa fa-times'></i></a>";
                    }else if( orderRow[5] == 5 ){
                        status = 'Processing';
                        cancelBtn = "";
                    }else if( orderRow[5] == 6 ){
                        status = 'Shipped';
                    }else if( orderRow[5] == 7 ){
                        status = 'Delivered';
                        returnBtn = "<a class='btn btn-sm btn-info returnOrder' data-id='${orderRow[0]}'>Return</a>";
                    }else if( orderRow[5] == 8 ){
                        status = 'Cancelled';
                        cancelBtn = "<a class='btn btn-sm btn-secondary disabled'>Cancelled</a>";
                    }else if( orderRow[5] == 9 ){
                        status = 'Closed';
                    }else if( orderRow[5] == 10 ){
                        status = 'Return requested';
                    }else if( orderRow[5] == 11 ){
                        status = 'Return Accepted';
                    }else if( orderRow[5] == 12 ){
                        status = 'Returned';
                    }else if( orderRow[5] == 13 ){
                        status = 'Closed';
                    }else{
                        status = '-';
                    }    
                    cartListTr = cartListTr + `<div class='col-12 shadow-lg rounded my-2 py-2'>
                            <div class='row ordersCards' onclick="location.href='order-view.php?id=${orderRow[0]}'">
                                <div class='oTotal col-10'>
                                    <b>AED ${orderRow[6]}</b>
                                    <span>${status}</span>
                                    <span>#${orderRow[1]}</span>
                                    <span>Placed on ${original_date}</span>
                                </div>    
                                <div class='col-2'>
                                    <a class='btn btn-lg viewOrderDetails pull-right align-items-center d-inline-flex' href='order-view.php?id=${orderRow[0]}' >
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>    
                        </div>`;   
                });               
            }
            document.getElementById('cartList').innerHTML = cartListTr;
        },         
        updateBill: function(){
            let eyeCart = localStorage.getItem('eyeCart');

            let serve = `./serve_cart.php?amt=${cart.totalBill}&cart=${eyeCart}`;

            axios.get(serve)
                    .then(response => {
                        const users = response.data;
                        let items = "";
                        if( users.status == true){
                            localStorage.removeItem('eyeCart');
                        }
                    })
                    .catch(error => console.error(error));
        },
        totalBill: 10,
        updateOrders: function(){
            let serve = "./get_orders.php?id=<?php echo $_SESSION['SESS_DIT_UID'] ?>";           
            axios.get(serve)
                    .then(response => {
                        const users = response.data;
                        let items = "";
                        cart.renderOrders(users);                        
                    })
                    .catch(error => console.error(error));
        },
        init: function(){
            this.updateOrders();
           
        }
    };  
    cart.init();  
   
</script>