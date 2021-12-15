function formMessage(result){
    let formMessage = document.getElementById('formMessage');
    let msg = "";
    let status = false;
    if( result.status ){
        msg = `<div class="alert alert-success" role="alert">${result.msg}</div>`;
        status = true;
    }else{
        msg = `<div class="alert alert-danger" role="alert">${result.msg}</div>`;
    }
    formMessage.innerHTML = msg;
    return status;		
}
function validateInput(input){
    input.classList.remove("inputError");
    if( input.value == "" ){
        input.focus();
        input.classList.add("inputError");
        return false;
    }else{
        return true;
    }
}
function onLogin(){
    let email = document.loginForm.email;
    let password = document.loginForm.password;
    let submit = document.loginForm.submit;		
    
    if (!validateInput(email) || !validateInput(password) ){return false;}		
    submit.disabled = true;
    submit.value = "Please wait...";
    let data = {email:email.value, password:password.value}
    axios.post(`./api/login.php`, data)
        .then(response => {               
            const result = response.data;
            let items = "";                              
            if(response.status==200){       
                if( formMessage(result) ){
                    location.href='./user-login.php'
                }	
                submit.disabled = false;
                submit.value = "Login";           
            }                
        })
        .catch(error => console.error(error));
    return false;

}