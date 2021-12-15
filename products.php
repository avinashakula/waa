 <div class='row' id="productsGrid"></div>
<div id='itemsSkeleton' class='row'></div>




<div class='text-center'><button class='btn btn-primary btn-md rounded-0' id="ItemsFetcher" onclick="fetchItems()">Load more <i class="fa fa-arrow-down"></i></button></div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };
    // alert(getUrlParameter('ifor'));
    // alert(getUrlParameter('type'));
    // alert(getUrlParameter('product_type'));


    var urlParams = new URLSearchParams(window.location.search);
</script>
<script>
    // let columns = 0;
    // if (window.innerWidth  >= 992 ){
    //     columns = 4;
    // }else if (window.innerWidth  >= 768 ){
    //     columns = 3;
    // }else {
    //     columns = 2;   
    // }                       
    
    var page = 1;
    let skeleton = `<div class='col-lg-3 col-md-6 col-sm-12'>
                        <div class='product-grid skeletonBlocks'>
                            <div class='animate-pulse skeletonImg'></div>
                            <div class='productTextBox'>
                                <div class='animate-pulse skeletonTxt'></div>        
                                <div class='animate-pulse skeletonTxt'></div>        
                                <div class='text-center'><button class='btn btn-default animate-pulse skeletonBtn'></button></div>        
                            </div>
                        </div>
                    </div>`;
    function showSkeleton(num){
        let skeletons = "";
        for(let i=0; i<num; i++){
            skeletons += skeleton;
        }
        return skeletons;
    }
    
    function renderProduct(item){        
        return `
            <div class='col-lg-3 col-md-6 col-sm-12'>
                <div class='product-grid'>
                    <div class='product-image'>
                        <a href='./product.php?id=${item.id}&name=${item.name}&price=${item.sellingPrice}' class='image'>                            
                            <img class='pic-1' src='data:image/jpg;base64, ${item.pic1}' onerror="if (this.src != './images/default.jpg') this.src = './images/default.jpg';">
                            <img class='pic-2' src='data:image/jpg;base64, ${item.pic2}' onerror="if (this.src != './images/default.jpg') this.src = './images/default.jpg';">
                        </a>
                        <!-- <span class='product-sale-label'>sale!</span> -->
                        <ul class='social'>
                            <li><a href='#' data-tip='Quick View'><i class='fa fa-eye'></i></a></li>
                            <li><a href='#' data-tip='Add to wishlist'><i class='fa fa-heart'></i></a></li>
                        </ul>
                        <div class='product-rating'>
                            <ul class='rating'>
                                <li class='fa fa-star'></li>
                                <li class='fa fa-star'></li>
                                <li class='fa fa-star'></li>
                                <li class='fa fa-star'></li>
                                <li class='fa fa-star'></li>
                            </ul>
                            <a class='add-to-cart' href='./product.php?id=${item.id}&name=${item.name}&price=${item.sellingPrice}'> VIEW ITEM </a>
                        </div>
                    </div>
                    <div class='product-content'>
                        <h3 class='title'><a href='./product.php?id=${item.id}&name=${item.name}&price=${item.sellingPrice}'>${item.name}</a></h3>
                        <div class='price'><span>AED ${item.actualPrice}</span>AED ${item.sellingPrice}</div>
                    </div>
                </div>
            </div>
        `;
    }
    const fetchItems = () => {
        const paramsList = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(paramsList);
        console.log("params >>> "+JSON.stringify(params));
        const ifor_filters = params.ifor ? params.ifor : "all";
        const type_filters = params.type ? params.type : "";
        const producttype_filters = params.product_type ? params.product_type : "";
        const brand_filters = params.brand ? params.brand : "";
        const frameshapes_filters = params.frame_shape ? params.frame_shape : "";
        const framematerials_filters = params.frame_material ? params.frame_material : "";
        const frame_type = params.frame_type ? params.frame_type : "";
        const item_price = params.price ? params.price : "";
        const arrival = params.arrival ? params.arrival : "";
        const clearduration = params.clearduration ? params.clearduration : "";
        const clearbrand = params.clearbrand ? params.clearbrand : "";
        const clearsolution = params.clearsolution ? params.clearsolution : "";
        const colorduration = params.colorduration ? params.colorduration : "";
        const colorbrand = params.colorbrand ? params.colorbrand : "";
        const contactlenscolor = params.contactlenscolor ? params.contactlenscolor : "";
        const prescription_lens = params.prescription_lens ? params.prescription_lens : "";

        document.getElementById('itemsSkeleton').innerHTML = showSkeleton(8);
        document.getElementById('itemsSkeleton').style.display = 'flex';
        axios.get(`./serve_defaults.php?page=${page}&ifor=${ifor_filters}&type=${type_filters}&product_type=${producttype_filters}&brand=${brand_filters}&frame_type=${frame_type}&item_price=${item_price}&arrival=${arrival}&frame_shape=${frameshapes_filters}&frame_material=${framematerials_filters}&clearduration=${clearduration}&clearbrand=${clearbrand}&clearsolution=${clearsolution}&colorduration=${colorduration}&colorbrand=${colorbrand}&contactlenscolor=${contactlenscolor}&prescription_lens=${prescription_lens}`)
            .then(response => {               
                const users = response.data;
                let items = "";               
                users.filter(function(item){
                    items = items+renderProduct(item);
                });
                if(response.status==200){                   
                    document.getElementById('itemsSkeleton').style.display = 'none';                        
                    document.getElementById('productsGrid').innerHTML += items;
                }
                if( response.data.length < 4  ){
                    if( page==1 && response.data.length==0 ){
                        document.getElementById('productsGrid').innerHTML += "<div class='col-md-12 text-center'><div class='alert alert-default'><i class='fa fa-exclamation-triangle'></i><br>No Products Available</div></div>";
                    }else{
                        document.getElementById('productsGrid').innerHTML += "<div class='col-md-12 text-center'><div class='alert alert-default'><i class='fa fa-exclamation-triangle'></i><br>Thats All</div></div>";
                    }
                    document.getElementById('ItemsFetcher').style.visibility = 'hidden';
                }
                page++;
            })
            .catch(error => console.error(error));
    };
    fetchItems();    
</script>