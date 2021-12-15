<div class='row border mx-1 rounded shadow-lg'>
    <div class='col-md-7 col-sm-7' id="productsImageSlider">
    <!-- <?php  echo renderImageSlider($_GET['id'], "miniSlider"); ?> -->
    </div>
    <div class='col-md-5 col-sm-5 my-3'>
        <div id='product_info'></div> 
    </div>
    <div class='col-md-12 col-sm-12 my-3'>
        <img src='images/rayban.jpg' width='100%'>
    </div>    
</div>

<style>
    .technicalInformation{
        text-align:center;
        border: 1px solid #f3f3f3;
        padding:5px
    }
    .technicalInformation p, .technicalInformation b{
        margin:0;
        font-size: 0.9em;
    }
    
    .price span{
        font-size:2em
    }
</style>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    let cart = {        
        cart: undefined,
        qty:0,
        addToCart: function(e){     
           
            let itemInfo = {
                "id":document.getElementById('addtocart').getAttribute('data-id'),
                "name":document.getElementById('addtocart').getAttribute('data-name'),
                "price":document.getElementById('addtocart').getAttribute('data-p'),
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
        getItem: function(){
            let serve = `./api/serve_default.php?id=`+<?php echo $_GET['id'] ?>;
            let sliderUrl = `./api/product_slider.php?id=`+<?php echo $_GET['id'] ?>+`&purpose=miniSlider`;
            // let serve = `http://localhost/eyeecommerce/ui/serve_default.php`;
            const renderProduct = (item) => {
                return `                
                    <div class='product-content'>
                        <h3 class='title'>${item.name}</h3>
                        <div class='price'><span>AED ${item.sellingPrice}</span></div>
                        <button class='btn btn-primary btn-md' id='addtocart' data-id='${item.id}' data-name='${item.name}' data-p='${item.sellingPrice}'>Add to Cart <i class='fa fa-shopping-cart'></i></button>
                    </div><br />
                    <div class='accordion' id='productFullInformation'>
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='technicalInfo'>
                            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                                Technical Information
                            </button>
                            </h2>
                            <div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='technicalInfo' data-bs-parent='#productFullInformation'>
                                <div class='accordion-body'>
                                    <div class='row'>                       
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Type</p>
                                            <b>${item.frame_type}</b>
                                        </div>    
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Shape</p>
                                            <b>${item.frame_shape}</b>
                                        </div>                                          
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Size</p>
                                            <b>${item.frame_size}mm</b>
                                        </div>
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Width</p>
                                            <b>${item.frame_width}mm</b>
                                        </div>                                            
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Dimensions</p>
                                            <b>${item.frame_dimensions}mm</b>
                                        </div>
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Colour</p>
                                            <b>${item.frame_colour}</b>
                                        </div>                                                
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Weight</p>
                                            <b>${item.weight}</b>
                                        </div>
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Group</p>
                                            <b>${item.weight_group}gm</b>
                                        </div>                                                
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Height</p>
                                            <b>${item.frame_height}cm</b>
                                        </div>
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Frame Material</p>
                                            <b>${item.frame_material}</b>
                                        </div>                                                
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Temple Material</p>
                                            <b>${item.temple_material}</b>
                                        </div>
                                        <div class='technicalInformation col-md-4 col-sm-6 col-xs-6'>
                                            <p>Temple Colour</p>
                                            <b>${item.temple_colour}</b>
                                        </div>                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='info_productDescription'>
                            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#info_product_Desc' aria-expanded='false' aria-controls='info_product_Desc'>
                                Product Description
                            </button>
                            </h2>
                            <div id='info_product_Desc' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#info_productDescription'>
                            <div class='accordion-body'>
                                ${item.description}<br><br>
                                <a class='btn btn-sm btn-primary' href='${item.link}' target='_blank'>Read more</a>
                            </div>
                            </div>
                        </div>
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='info_otherInformation'>
                            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#info_otherInfo' aria-expanded='false' aria-controls='info_otherInfo'>
                                Other Information
                            </button>
                            </h2>
                            <div id='info_otherInfo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#info_otherInformation'>
                            <div class='accordion-body'>
                            <div class='row'>                       
                                        <div class='technicalInformation col-md-4 col-sm-2'>
                                            <p>Brand</p>
                                            <b>${item.brand_name}</b>
                                        </div>    
                                        <div class='technicalInformation col-md-4 col-sm-2'>
                                            <p>Model No.</p>
                                            <b>${item.model_no}</b>
                                        </div>                                          
                                        <div class='technicalInformation col-md-4 col-sm-2'>
                                            <p>Gender</p>
                                            <b>${item.gender}mm</b>
                                        </div>
                                        <div class='technicalInformation col-md-4 col-sm-2'>
                                            <p>Condition</p>
                                            <b>${item.condition}mm</b>
                                        </div>                                            
                                        <div class='technicalInformation col-md-4 col-sm-2'>
                                            <p>Actual Price</p>
                                            <b>${item.actual_price}mm</b>
                                        </div>
                                        <div class='technicalInformation col-md-4 col-sm-2'>
                                            <p>Warranty</p>
                                            <b>${item.warranty}</b>
                                        </div>                                                
                                                             
                                    </div>
                            </div>
                            </div>
                        </div>
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='info_reviewsRatings'>
                            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#info_reviews_ratings' aria-expanded='false' aria-controls='info_reviews_ratings'>
                                Reviews & Ratings
                            </button>
                            </h2>
                            <div id='info_reviews_ratings' class='accordion-collapse collapse' aria-labelledby='reviewsRatings' data-bs-parent='#info_reviewsRatings'>
                            <div class='accordion-body'>
                                No Ratings
                            </div>
                            </div>
                        </div>
                    </div>
               
                `;
            }
            const fetchItems = () => {
                axios.get(serve)
                    .then(response => {
                        const users = response.data;
                        let items = "";
                        console.log(response);
                        users.filter(function(item){
                            items = items+renderProduct(item);
                        });
                        document.getElementById('product_info').innerHTML = items;
                        cart.cart = document.querySelector('#addtocart');
                        cart.cart && cart.cart.addEventListener('click', cart.addToCart); 
                    })
                    .catch(error => console.error(error));
            };
            const fetchSlider = () => {
                axios.get(sliderUrl)
                    .then(response => {
                        const users = response.data;
                        let items = "";
                        console.log(response);
                        // users.filter(function(item){
                        //     items = items+renderProduct(item);
                        // });
                        document.getElementById('productsImageSlider').innerHTML = users.slider;
                    })
                    .catch(error => console.error(error));
            };
            fetchItems();
            fetchSlider();
                       
        },
        init: function(){
            this.getItem();           
            this.refreshCartCount();
        }
    };  
    cart.init();  
    // let addtocart = document.getElementById('addtocart').addEventListener('click', addToCard);
    // function addToCard(){
    //     // let itemInfo = [{
    //     //     "id":10,
    //     //     "name":"Oakly Blue Glasses",
    //     //     "price":28.00,
    //     //     "qty":1
    //     // },
    //     // {
    //     //     "id":13,
    //     //     "name":"Oakly Blue Glasses 13",
    //     //     "price":68.00,
    //     //     "qty":1
    //     // }];
    //     let itemInfo = {
    //         "id":10,
    //         "name":"Oakly Blue Glasses 11",
    //         "price":281.00,
    //         "qty":1
    //     };
    //     let eyeCart = localStorage.getItem('eyeCart');
    //     if(!eyeCart){
    //         localStorage.setItem('eyeCart', JSON.stringify(itemInfo));            
    //     }else{
    //         let eyeCartOpen = JSON.parse(eyeCart);            
    //         let isExisted = eyeCartOpen.findIndex(function(obj){
    //             return obj.id==10;
    //         });
    //         if(isExisted == -1){
    //             eyeCartOpen.push(itemInfo);
    //             localStorage.setItem('eyeCart', JSON.stringify(eyeCartOpen));
    //         }else{
    //             console.log(isExisted);
    //             eyeCartOpen[isExisted].qty = eyeCartOpen[isExisted].qty + 1;
    //             localStorage.setItem('eyeCart', JSON.stringify(eyeCartOpen));
    //         }
            
    //     }
    // }
</script>