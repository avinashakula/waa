import data from './data.js';
// import axios from 'https://unpkg.com/axios/dist/axios.min.js';
let [DATA_BRANDS, DATA_PRODUCT_TYPES, DATA_IFOR, DATA_FRAME_SHAPES, DATA_FRAME_MATERIAL, DATA_BRANDS_CONTACT_LENS, DATA_BRANDS_ALL] = [ data[0], data[1], data[2], data[3], data[4], data[5], data[6] ];

const filtersSpace = {  
    searchFilter: {},
    getUrlParameter: function(sParam) {
        let sPageURL = window.location.search.substring(1),
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
    },
    renderFilters: function(title, list){
        let data = ``;
        for( let i=0; i<list.length; i++ ){
            let item = list[i].replaceAll("_"," ");
            data = data+`<div class='form-check' filter-catetory='${title}'>
                            <input class='form-check-input filterCheckBoxes' type='checkbox' value='${list[i]}' id='${list[i]}'>
                            <label class='form-check-label' for='${list[i]}'>${item.charAt(0).toUpperCase() + item.slice(1)}</label>
                        </div>`;
        }
        return data;
    },
    filtersList: document.querySelectorAll('.filterCheckBoxes'),
    updateSearch: function(data){        
        if( !filtersSpace.searchFilter.hasOwnProperty(data[0]) ){
            filtersSpace.searchFilter[data[0]] = [data[1]];
        }else{
            let category = filtersSpace.searchFilter[data[0]];
            let index = category.indexOf(data[1]);
            if(category[index] == data[1]){
                category.splice(index,1);
            }else{
                category.push(data[1]);
            }
        }
        localStorage.setItem("eyeFilter", JSON.stringify(filtersSpace.searchFilter));
    },
    events: async function(){
        filtersSpace.filtersList.forEach((list)=>{
            list.addEventListener('click', function(e){
                let parent = e.target.parentNode.getAttribute('filter-catetory');
                let val = e.target.value;                                  
                filtersSpace.updateSearch([parent,val,e.target.checked]);
                if(parent == "product_type" ){
                    filtersSpace.reRenderFilterBrands(val, e.target.checked);   
                    filtersSpace.events();                                                          
                }
            }); 
        });
        if(document.getElementById('applyFilters') !== null) {
            document.getElementById('applyFilters').addEventListener('click', function(e){
                filtersSpace.applyFilter();
            });        
        }
    },
    noOfProductTypes: 0,
    clearUnwantedBrands: async function(){
        let existedFilters = JSON.parse(localStorage.getItem("eyeFilter"));
        delete existedFilters.brand;
        alert(JSON.stringify(existedFilters));

        localStorage.setItem("eyeFilter", JSON.stringify(existedFilters));
        filtersSpace.searchFilter = JSON.stringify(existedFilters);
        alert(filtersSpace.searchFilter);
    },
    reRenderFilterBrands: async function(productType, status){   
        
        if( status ){
            // filtersSpace.clearUnwantedBrands(); 
            document.getElementById('filter_brands').innerHTML = filtersSpace.renderFilters("brand",productType=="contact_lens" ? DATA_BRANDS_CONTACT_LENS : DATA_BRANDS_ALL); // showing filters brands list            
            filtersSpace.filtersList = document.querySelectorAll('.filterCheckBoxes');
            // await filtersSpace.events();   
        }else{
            document.getElementById('filter_brands').innerHTML = filtersSpace.renderFilters("brand",DATA_BRANDS_ALL); // showing filters brands list            
            filtersSpace.filtersList = document.querySelectorAll('.filterCheckBoxes');
            // await filtersSpace.events();   
        }              
               
    },
    applyFilter: async function(){
        let selectedFilters = filtersSpace.searchFilter;
        var str = "index.php?loc=uae";
        for (var selectedFilter in selectedFilters) {            
            str += "&"+selectedFilter+"=";
            if( selectedFilter == "product_type" ){
                filtersSpace.noOfProductTypes = selectedFilters[selectedFilter].length;
                // filtersSpace.clearUnwantedBrands();
            }
            for (let i=0; i<selectedFilters[selectedFilter].length; i++) {            
                // if( selectedFilter == "brand" && filtersSpace.noOfProductTypes>1 ){
                   
                // }else{
                    str += encodeURIComponent(selectedFilters[selectedFilter][i])+"+";
                // }
            }
            str = str.slice('+',-1);
        }
        location.href=str;
    },
    item: async function(){
        let frame_productTypes_drops = filtersSpace.renderFilters("product_type",DATA_PRODUCT_TYPES); 
        let filter_brands_drops = filtersSpace.renderFilters("brand",DATA_BRANDS);

        if( filtersSpace.getUrlParameter('product_type') ){
            let selectedProductTypes = filtersSpace.getUrlParameter('product_type').split("+");
            if( selectedProductTypes.length == 0  ){
                filter_brands_drops = filtersSpace.renderFilters("brand",DATA_BRANDS_ALL);
            }else if( selectedProductTypes.length > 1  ){
                filter_brands_drops = filtersSpace.renderFilters("brand",DATA_BRANDS_ALL);
            }else if( filtersSpace.getUrlParameter('product_type') == "contact_lens" ){
                filter_brands_drops = filtersSpace.renderFilters("brand",DATA_BRANDS_CONTACT_LENS);
            }else{
                filter_brands_drops = filtersSpace.renderFilters("brand",DATA_BRANDS);
            }
        }
        
        let filter_ifor_drops = filtersSpace.renderFilters("ifor",DATA_IFOR);
        let filter_frameShapes_drops = filtersSpace.renderFilters("frame_shape",DATA_FRAME_SHAPES);
        let filter_framematerials_drops = filtersSpace.renderFilters("frame_material",DATA_FRAME_MATERIAL);
        return [frame_productTypes_drops, filter_brands_drops, filter_ifor_drops, filter_frameShapes_drops, filter_framematerials_drops];
    },
    isFiltersChecked: async function(type){
        let filter_type = filtersSpace.getUrlParameter(type); 
        filtersSpace.current_product_type = filter_type;
        if(filter_type != "all" && filter_type!=false){
            let productsArray = filter_type.split("+");
            for( let i=0; i<productsArray.length; i++ ){
                let target = document.getElementById(productsArray[i]);
                target.checked = true;
                let parent = target.parentNode.getAttribute('filter-catetory');
                filtersSpace.updateSearch([parent,target.value,target.checked]);
            }
        }
    },
    start: async function(){       
        await filtersSpace.item().then(function(value){   
            if(document.getElementById('filter_product_type') !== null)        
                document.getElementById('filter_product_type').innerHTML = value[0]; // showing filters product types list
            if(document.getElementById('filter_brands') !== null)       
                document.getElementById('filter_brands').innerHTML = value[1]; // showing filters brands list
            if(document.getElementById('filter_ifors') !== null)    
                document.getElementById('filter_ifors').innerHTML = value[2]; // showing ideal for list
            if(document.getElementById('filter_frame_shapes') !== null)
                document.getElementById('filter_frame_shapes').innerHTML = value[3]; // showing filters brands list
            if(document.getElementById('filter_frame_materials') !== null)
                document.getElementById('filter_frame_materials').innerHTML = value[4]; // showing filters brands list
            filtersSpace.filtersList = document.querySelectorAll('.filterCheckBoxes');
            filtersSpace.events();
            // here try to check and prepolulate checkboxs if URL params exists
            filtersSpace.isFiltersChecked('product_type');
            filtersSpace.isFiltersChecked('brand');
            filtersSpace.isFiltersChecked('ifor');
            filtersSpace.isFiltersChecked('frame_shape');
            filtersSpace.isFiltersChecked('frame_material');
        });                     
    },
    init: function(){
        localStorage.removeItem("eyeFilter");
        filtersSpace.start();   
    }
}

filtersSpace.init();