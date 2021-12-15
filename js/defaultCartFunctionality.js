let defaultCartFunctionality = {
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
            this.cartCount.innerText = count;
        }
    },   
    updateShippingAddress: function(){        
        let serve = `../api/fetchShippingAddress.php`;
        axios.post(serve)
                .then(response => {
                    const result = response.data;
                    localStorage.setItem('shippingAddress',JSON.stringify([result]));
                    return result.status;                 
                })
                .catch(error => console.error(error));        
    },
    verifyShippingAddress: function(){
        if( localStorage.getItem('shippingAddress') ){
            let shipping = JSON.parse(localStorage.getItem('shippingAddress'));
            if( 
                shipping.street=="" || 
                shipping.city=="" || 
                shipping.state=="" || 
                shipping.pincode=="" || 
                shipping.country=="" || 
                shipping.firstname=="" || 
                shipping.shippingContact1=="" || 
                shipping.email==""
            ){
               return false; 
            }else{
                return true;
            }
        }else{
            return false;
        }
    },
    userEnquiry: undefined,
    enquiryMessage:undefined,
    enquiryEmail:undefined,
    enquiryAlert:undefined,
    onEnquiry: function(){
        defaultCartFunctionality.userEnquiry.disabled = true;
        enquiryAlert.innerHTML = "Please wait..";
        let message = enquiryMessage.value;
        let mail = enquiryEmail.value;
       
        let data = {mail:mail, message:message};
        if( message.length>0 && mail.length>0 ){
            let serve = `../api/userEnquiry.php`;
            axios.post(serve, data)
                    .then(response => {
                        defaultCartFunctionality.userEnquiry.disabled = false;
                        const result = response.data;                                                                     
                        result.status ? 
                            (          
                                enquiryAlert.innerHTML = "Received ! we will get back to you ASAP",
                                defaultCartFunctionality.enquiryMessage.value = '',
                                defaultCartFunctionality.enquiryEmail.value = ''
                            ) 
                            : enquiryAlert.innerHTML = 'Something went wrong! Try again';
                    })
                    .catch(error => console.error(error));    
        }else{
            defaultCartFunctionality.userEnquiry.disabled = false;
            enquiryAlert.innerHTML = 'All fields are mandatory';
        }
    },
    init: function(){            
        this.refreshCartCount();  
        if( !this.verifyShippingAddress() ){
            defaultCartFunctionality.updateShippingAddress();
        }
        this.userEnquiry = document.querySelector('#onEnquiry');
        this.enquiryMessage = document.querySelector('#enquiryMessage');
        this.enquiryEmail = document.querySelector('#enquiryEmail');
        this.enquiryAlert = document.querySelector('#enquiryAlert');
        this.userEnquiry && this.userEnquiry.addEventListener('click', defaultCartFunctionality.onEnquiry); 
    }
};  
defaultCartFunctionality.init();  