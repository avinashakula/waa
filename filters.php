<!-- <div class="accordion" id="accordionExample"> -->
<div id="filtersAccordionResponsiveBlock">Search by <button class='btn btn-sm btn-primary' id="filtersAccordionResponsiveButton"><i class="fa fa-sliders"></i> filters</button></div>    
<div class="accordion" id="filtersAccordion">

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            Product Type
        </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" >
            <div class="accordion-body">
                <div id="filter_product_type"><div align='center'><img src='images/loading.gif' width='40'></div></div>                               
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="filter_brands_list">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter_brand" aria-expanded="false" aria-controls="filter_brand">
            Brand
        </button>
        </h2>
        <div id="filter_brand" class="accordion-collapse collapse" aria-labelledby="filter_brands_list">
        <div class="accordion-body">
            <div id="filter_brands"></div>      
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="filter_ifors_list">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter_ifor" aria-expanded="false" aria-controls="filter_ifor">
            Ideal For
        </button>
        </h2>
        <div id="filter_ifor" class="accordion-collapse collapse" aria-labelledby="filter_ifors_list">
        <div class="accordion-body">
            <div id="filter_ifors"></div>      
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="filter_frame_shapes_list">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter_frame_shape" aria-expanded="false" aria-controls="filter_frame_shape">
            Frame Shape
        </button>
        </h2>
        <div id="filter_frame_shape" class="accordion-collapse collapse" aria-labelledby="filter_frame_shapes_list" >
        <div class="accordion-body">
        <div id="filter_frame_shapes"></div>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="filter_frame_materials_list">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter_frame_material" aria-expanded="false" aria-controls="filter_frame_material">
            Frame Material
        </button>
        </h2>
        <div id="filter_frame_material" class="accordion-collapse collapse" aria-labelledby="filter_frame_materials_list" >
        <div class="accordion-body">
        <div id="filter_frame_materials"></div>
        </div>
        </div>
    </div>
    <!-- <div class="accordion-item">
        <h2 class="accordion-header" id="filter_frame_colour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter_frame_colours" aria-expanded="false" aria-controls="filter_frame_colours">
            Frame Color
        </button>
        </h2>
        <div id="filter_frame_colours" class="accordion-collapse collapse" aria-labelledby="headingFour" >
        <div class="accordion-body">
            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="filter_price">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter_prices" aria-expanded="false" aria-controls="filter_prices">
            Price
        </button>
        </h2>
        <div id="filter_prices" class="accordion-collapse collapse" aria-labelledby="filter_price" >
        <div class="accordion-body">
            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
        </div>
        </div>
    </div> -->
    <button class='btn btn-primary btn-sm my-2 pull-right rounded-0' id='applyFilters'>Apply Filters <i class="fa fa-arrow-circle-right"></i> </button>
</div>

<script>
    let filtersBlock = document.getElementById('filtersAccordion');
    document.getElementById('applyFilters').addEventListener('click', function(e){
        // alert();
    });
    let responsiveButtonState = false;
    document.getElementById('filtersAccordionResponsiveButton').addEventListener('click', function(e){
        responsiveButtonState ? responsiveButtonState=false : responsiveButtonState=true;
        showHideFilters();
    });
    function showHideFilters(){
        responsiveButtonState ? filtersBlock.style.display = 'block' : filtersBlock.style.display = 'none';
    }
</script>
<style>      
    #filtersAccordion .accordion-body{
        padding: 5px 10px
    }
    #filtersAccordion .accordion-body .form-check-label{
        font-size: 14px;
    }
    #filtersAccordion.accordion-button {
        padding: 5px 10px;
        font-size: 15px;
    }
    #filtersAccordionResponsiveBlock{
        text-align: right;
    }

    @media only screen and (max-width: 767px) {
        #filtersAccordion{
            display:none;
        }
        #filtersAccordionResponsiveBlock{
            display:block;
        }
    }
    @media only screen and (min-width: 767px) {
        #filtersAccordionResponsiveBlock{
            display:none;
        }
    }
</style>