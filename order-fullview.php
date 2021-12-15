<div class="mx-1 rounded shadow-lg shippingStatusHeader">
    <p>Ordered on: <label id='orderedOn_label'></label></p>
    <p id="orderStatus"></p>
</div>

<div class="row mx-1 rounded shadow-lg">
    <div class="">        
        <table class="table table-sm table-borderless my-3">
            <thead>
                <tr>
                    <th scope="col" width='40%'>Items</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody id="cartList"></tbody>
        </table>
    </div>    
</div>

<div class="modal fade" id="popupMessage" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupLabel">Reason</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea class='form-control' id='returnReason' placeholder='Tell us the reason why you decided to return the product'></textarea><br>
        <button class='btn btn-primary btn-sm' id='returnOrder'>Return</button>
      </div>      
    </div>
  </div>
</div>



<div class="modal fade" id="deletePopupMessage" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupLabel">Are you sure ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button class='btn btn-primary btn-sm' id='confirmCancelOrder'>Confirm</button>
        <button class='btn btn-primary btn-sm'  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
      </div>      
    </div>
  </div>
</div>




<div id='messageToaster' class="toast align-items-center text-white bg-info border-0 position-absolute p-3 bottom-0 start-50 translate-middle-x" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body"></div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

<script type='text/JavaScript' src='assets/dist/js/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function(){
        var orderId = 0;
        $(document).on('click', '.returnOrder', function(){
            orderId = $(this).attr('data-id');               
            if( parseInt(orderId) > 0 ){
                $('#popupMessage').modal('show');                   
            }
        })

        

        $(document).on('click', '#returnOrder', function(){           
            let returnReason = $('#returnReason').val();
            let serve = `./api/returnOrder.php`;
            let data = {orderId:orderId, returnReason:returnReason}
            axios.post(serve, data)
                    .then(response => {
                        const users = response.data;                        
                        if( users.status == true){
                            $('#messageToaster .toast-body').html("Product Returned successfully");
                            $('#popupMessage').modal('hide');  
                        }
                    })
                .catch(error => console.error(error));
        })

        $(document).on('click', '#cancelOrder', function(){
            orderId = $(this).attr('data-id');    
            $('#confirmCancelOrder').attr('data-id', orderId);           
            if( parseInt(orderId) > 0 ){
                $('#deletePopupMessage').modal('show');                   
            }
        })
        $(document).on('click', '#confirmCancelOrder', function(){           
            let cancelId = $(this).attr('data-id');
            let serve = `./api/cancelOrder.php`;
            let data = {id:cancelId};
           
            axios.post(serve, data)
                    .then(response => {
                        const responseData = response.data;                        
                        if( responseData.status == true){
                            $('#messageToaster .toast-body').html("Order Cancelled successfully");
                            $('#deletePopupMessage').modal('hide');  
                        }
                    })
                .catch(error => console.error(error));
        })
        
    });
</script>
<script>

document.addEventListener("DOMContentLoaded", function(){
    var btn = document.getElementById("confirmCancelOrder");
    var element = document.getElementById("messageToaster");

    var btn2 = document.getElementById("returnOrder");
    var element = document.getElementById("messageToaster");


    // Create toast instance
    var myToast = new bootstrap.Toast(element);

    btn.addEventListener("click", function(){
        myToast.show();
    });
    btn2.addEventListener("click", function(){
        myToast.show();
    });
});

    function onCancelOrder(id){
        let serve = `./api/cancelOrder.php`;
        let data = {id:id}
        axios.post(serve, data)
                .then(response => {
                    const users = response.data;
                    let items = "";
                    if( users.status == true){
                        alert('Order Cancelled Successfully !');
                    }
                })
                .catch(error => console.error(error));
    }
    
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
        cartCount: document.getElementById('cartCount'),
        cartList: document.getElementById('cartList'),       
        renderOrders: function(orderInfo, shippingAddress, status, dates, bookingId, proId, returnId, totalAmount){
            document.getElementById('orderedOn_label').innerHTML = moment(dates[0]).format('MMM Do YYYY, h:mm:ss a');
            let orderStatusCycle = "";

            let cancelledDate = "";
            let proStatus = "Status not available";
            let cancelBtn = "";
            let returnBtn = "";
            let iconStatus2 = false;
            let iconStatus3 = false;
            let iconStatus4 = "Delivered";
            if( status == 0 ){
                proStatus = 'Pending';
                // cancelBtn = `<a class='btn btn-sm btn-danger my-2' id='cancelOrder' data-id='${proId}' onClick='onCancelOrder(${proId})' >Cancel <i class='fa fa-times'></i></a>`;               
                cancelBtn = `<a class='btn btn-sm btn-danger my-2' id='cancelOrder' data-id='${proId}' >Cancel <i class='fa fa-times'></i></a>`;               
            }else if(status == 5 ){
                proStatus = 'Processing';
            }else if( status == 6 ){
                proStatus = 'Shipped';
                orderStatusCycle = orderStatusCycle + `Shipped on: ${moment(dates[1]).format('MMM Do YYYY, h:mm:ss a')}<br />`;
                orderStatusCycle = orderStatusCycle + `Tracking Id: ${bookingId}<br />`;
                iconStatus2 = true;
            }else if( status == 7 ){
                proStatus = 'Delivered';
                cancelBtn = '';
                returnBtn = `<a class='btn btn-sm btn-primary returnOrder' data-id='${proId}''>Return</a>`;
                // orderStatusCycle = orderStatusCycle + `Shipped on: ${dates[1]}<br />`;
                orderStatusCycle = orderStatusCycle + `Delivered on: ${moment(dates[2]).format('MMM Do YYYY, h:mm:ss a')}`;
                iconStatus2 = true;
                iconStatus3 = true;
                iconStatus4 = "Delivered";
            }else if( status == 8 ){
                proStatus = 'Cancelled';
                cancelBtn = '';
                orderStatusCycle = orderStatusCycle + `Cancelled on: ${moment(dates[3]).format('MMM Do YYYY, h:mm:ss a')}`;
                iconStatus4 = true;
                iconStatus4 = "Cancelled";
            }else if( status == 9 ){
                proStatus = 'Cancelled & Money Returned';
                iconStatus4 = true;                
                iconStatus4 = "Cancelled";
                orderStatusCycle = orderStatusCycle + `Cancelled on: ${moment(dates[3]).format('MMM Do YYYY, h:mm:ss a')}<br />`;  
            }else if( status == 10 ){
                proStatus = 'Return request sent';
                orderStatusCycle = orderStatusCycle + `Return Requested: ${moment(dates[4]).format('MMM Do YYYY, h:mm:ss a')}`;
                iconStatus4 = false;
                iconStatus2 = true;
                iconStatus3 = false;
                iconStatus4 = "Returning";
            }else if( status == 11 ){
                proStatus = 'Return request Accepted';
                orderStatusCycle = orderStatusCycle + `Accepted on: ${moment(dates[5]).format('MMM Do YYYY, h:mm:ss a')}<br />`;
                orderStatusCycle = orderStatusCycle + `Return Id: ${returnId}<br />`;
                iconStatus2 = true;
                iconStatus3 = false;
                iconStatus4 = false;
                iconStatus4 = "Returning";
            }else if( status == 12 ){
                proStatus = 'Product Returned, money will be returned within 48 hours';   
                iconStatus2 = true;
                iconStatus3 = false;
                iconStatus4 = true;
                iconStatus4 = "Returned";   
                orderStatusCycle = orderStatusCycle + `Return Accepted on: ${moment(dates[5]).format('MMM Do YYYY, h:mm:ss a')}<br />`;          
            }else if( status == 13 ){
                proStatus = 'Money Refunded & Closed';       
                iconStatus2 = true;
                iconStatus3 = true;
                iconStatus4 = true;
                iconStatus4 = "Cancelled"; 
                orderStatusCycle = orderStatusCycle + `Returned on: ${moment(dates[6]).format('MMM Do YYYY, h:mm:ss a')}<br />`;  
            }else{
                proStatus = '-';
            }    


            let stepper = `
            <span class='line'></span>
                <div class='stepper stepperChecks'>
                   
                    <div>
                        <i class="fa fa-check stepperActive" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-check ${iconStatus2 ? "stepperActive" : "stepperInActive"}" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-check ${iconStatus2 ? "stepperActive" : "stepperInActive"}" aria-hidden="true"></i>
                    </div>    
                    <div>
                        <i class="fa fa-check ${iconStatus3 ? "stepperActive" : "stepperInActive"}" aria-hidden="true"></i>
                    </div>
                </div>
                <div class='stepper stepperItems'>
                    <div class='stepperActive'>
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span>Order Processed</span>
                    </div>
                    <div class='${iconStatus2 ? "stepperActive" : "stepperInActive"}'>
                        <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
                        <span>Order Shipped</span>
                    </div>
                    <div class='${iconStatus2 ? "stepperActive" : "stepperInActive"}'>
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <span>Order On the Way</span>
                    </div>    
                    <div class='${iconStatus3 ? "stepperActive" : "stepperInActive"}'>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Order ${iconStatus4}</span>
                    </div>
                </div> `;

            document.getElementById('orderStatus').innerHTML = `${stepper}<p class='alert alert-warning text-center my-3'>${proStatus}</p><br/><span>${orderStatusCycle}</span><br/>${cancelBtn} ${returnBtn}`;
            document.getElementById('cartList').innerHTML = `<tr>
            <td colspan='5' class='text-center'><img src='images/loading.gif' width='25'><br />Please Wait<br />Fetching your orders...</td></tr>`;
            let cartListTr = "";
            if(!orderInfo){
               cartListTr = cartListTr + "<tr><td coslspan='5' class='text-center'>Your cart is empty</td></tr>";                     
            }else{
                let id = 1;  
                let total = 0;   
                orderInfo.filter(function(orderRow){  
                    let indivTotal = orderRow['qty'] * orderRow['price']; 
                    total = total + indivTotal;
                    cartListTr = cartListTr + `<tr>
                        <td><a href='./product.php?id=${orderRow['id']}' >${orderRow['name']}</a></td>
                        <td>${orderRow['qty']} x ${orderRow['price']}</td>
                        <td>${indivTotal}</td>
                    </tr>`;  
                    id++;
                });
                let vat = (total * 5)/100;
                cartListTr = cartListTr + `<tr>
                        <td colspan='2'></td>
                        <td>${total} AED<br>
                        Shipping 13 AED<br>
                        VAT(5%) ${vat} AED<br>
                        <b class='myorders-fullView-finalTotal'>${totalAmount} AED</b></td>
                    </tr>`;                 
            }

            let addr = "<tr><td colspan='5'><div class='addressBlockMyorders'>";
            shippingAddress.filter((address)=>{             
                addr = addr+address['firstname']+"<br />";             
                addr = addr+address['shippingContact1']+"<br /><br>";             
                addr = addr+"#"+address['doorno']+"<br />";
                addr = addr+address['street']+"<br />";
                addr = addr+address['city']+"<br />";
                addr = addr+address['state']+"(";
                addr = addr+address['pincode']+")<br />";
                addr = addr+address['country'];
            });
            addr = addr+"</div></td></tr>";
            document.getElementById('cartList').innerHTML = cartListTr + addr;
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
            let serve = "./get_order.php?id=<?php echo $_GET['id'] ?>";           
            axios.get(serve)
                    .then(response => {
                        const users = response.data;
                        let items = "";
                        cart.renderOrders(JSON.parse(users['cart']), JSON.parse(users['address']), users['status'], [users['initiatedDate'], users['shippingDate'], users['deliveredDate'], users['cancelledDate'], users['returnRequest'], users['returnAcceptedDate'], users['returnReceivedDate']], users['bookingId'], users['id'], users['returnId'], users['totalAmount']);                        
                    })
                    .catch(error => console.error(error));
        },       
        init: function(){
            this.updateOrders();           
        }
    };  
    cart.init();  
   
</script>

<style>
    .stepper{
        width:80%;
        margin:0 auto;
        display:flex
    }
    .stepper div{
        width:25%;
        text-align:center
    }
    .stepperItems div{
        padding:15px 0px 0 0;
    }
    .stepperItems div span{
        display:block
    }
    .stepperItems div i{
        font-size:2em
    }
   .line{   
        width:100%;
        height:5px;
        background:cornflowerblue;
        display:block;     
    }
    .stepperChecks{
        margin-top: -15px
    }
    .stepperChecks div .fa{
        background:white;
        color:cornflowerblue;
        border-radius:50%;
        padding:5px;
        border:1px solid cornflowerblue;
    }
    .stepperActive{
        color:cornflowerblue
    }
    .stepperInActive{
        color:#e1e1e1 !important
    }
</style>