
 function showErrorDialog(){
const ErrorMessageContainer = document.getElementById('ErrorMessageContainer')
 const ErrorMessage = document.getElementById('ErrorMessage')
    if(ErrorMessage.textContent == ""){
        ErrorMessageContainer.style.display = 'none'
    }else{
        ErrorMessageContainer.style.display = 'block'
        setTimeout(()=>{
            ErrorMessageContainer.style.display = 'none'
        },5000)
    }
 }
 showErrorDialog()