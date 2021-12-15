const dropDowns = {  
    data_dropdowns: function(title, list){
        let data = ``;
        for( let i=0; i<list.length; i++ ){
            let item = list[i].replace("_"," ");
            data = data+`<div class='form-check'>
                            <input class='form-check-input' type='checkbox' value='' id='productType_${list[i]}'>
                            <label class='form-check-label' for='productType_${list[i]}'>${item.charAt(0).toUpperCase() + item.slice(1)}</label>
                        </div>`;
        }
        return data;
    }
   
}