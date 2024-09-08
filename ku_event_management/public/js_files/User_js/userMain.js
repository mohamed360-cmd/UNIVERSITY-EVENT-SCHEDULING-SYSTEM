const registerUserForEvent = ()=>{

    const registerEventForm = document.getElementById('registerEventForm')
    registerEventForm.setAttribute('action',"/registerEvent")
    registerEventForm.setAttribute('method','POST')
    registerEventForm.submit()
}
const showLoginDialog = ()=>{
    const showAuthScreenDialog = document.getElementById('showAuthScreenDialog');
    showAuthScreenDialog.setAttribute("open", true)
    setTimeout(()=>{
        showAuthScreenDialog.removeAttribute("open")
    },5000)
}

function showSuccessAlertDialog(){
    const successDialogAlert = document.getElementById('successDialogAlert')
const successDialogMessage = document.getElementById('successDialogMessage');
    if(successDialogMessage.textContent != ""){
        successDialogAlert.style.display = "block";
        setTimeout(()=>{
            successDialogAlert.style.display = "none";
        },4000)
    }else{
        successDialogAlert.style.display = "none";
    }
}
function showErrorAlertDialog(){
    const errorDialogAlert = document.getElementById('errorDialogAlert')
const ErrorDialogMessage = document.getElementById('ErrorDialogMessage');
    if(ErrorDialogMessage.textContent != ""){
        errorDialogAlert.style.display = "block";
        setTimeout(()=>{
            errorDialogAlert.style.display = "none";
        },4000)
    }else{
        errorDialogAlert.style.display = "none";
    }
}
function gotMyEventsPageBtn(){
    console.log('click')
    window.location.href = "/myEvents"
}
showSuccessAlertDialog()
showErrorAlertDialog()
const deregisterEvent = ()=>{
    const myEventsForm = document.getElementById('myEventsForm')
    myEventsForm.setAttribute("action","/deregister")
    myEventsForm.setAttribute("method", "POST")
    myEventsForm.submit()
}
function gotToHomePage(){
    window.location.href = "/"
}
function moreEventInfo(){
    const event_Id = document.getElementById('event_Id')
     window.location.href = `/moreinfo/${event_Id.value}`
}

function gotMyAccountPageBtn(){
    window.location.href = "/myAccount"

}
function showPasswordField(){
    const passwordFieldContainer = document.getElementById('passwordFieldContainer')
    const showPasswordFieldBtn = document.getElementById('showPasswordFieldBtn')
    showPasswordFieldBtn.style.display = "none"
    passwordFieldContainer.style.display = "block"
}
function updateProfile (){
    const updateProfileForm = document.getElementById('updateProfileForm')
    updateProfileForm.setAttribute('action','/myAccount')
    updateProfileForm.setAttribute('method', 'POST')
    updateProfileForm.submit()
}