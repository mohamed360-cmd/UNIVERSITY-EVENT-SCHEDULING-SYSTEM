const addEventContainer = document.getElementById('addEventContainer')
const EventsAddFloatingBtn =  document.getElementById('EventsAddFloatingBtn')
const EventsDisacrdFloatingBtn = document.getElementById('EventsDisacrdFloatingBtn')
const MainEventDisplayContainer = document.getElementById('MainEventDisplayContainer')
const EditPageMoreOptionBtn = document.getElementById('EditPageMoreOptionBtn')
const UsersRegisteredForThisEventBtn = document.getElementById('UsersRegisteredForThisEventBtn')
const goToEventsPageBtn = document.getElementById('goToEventsPageBtn');
const EventMoreOptionscontainer = document.getElementById('EventMoreOptionscontainer')
const usersRegisteredForEventContainer = document.getElementById('usersRegisteredForEventContainer')
const eventSuccessMsgContainer = document.getElementById('eventSuccessMsgContainer')
const eventSuccessmsg = document.getElementById('eventSuccessmsg')
const moreEventsOptionsForm = document.getElementById('moreEventsOptionsForm')
const eventSearchForm = document.getElementById('eventSearchForm')
const eventErrorMsgContainer = document.getElementById('eventErrorMsgContainer');
const eventErrormsg = document.getElementById('eventErrormsg')
function logout(){
    window.location.href = "/admin/logout";
}
const showAddEventForm = ()=>{
   addEventContainer.style.display = "block"
   EventsDisacrdFloatingBtn.style.display = "block"
   EventsAddFloatingBtn.style.display = "none"
   MainEventDisplayContainer.style.display = "none"
}
const hideAddEventForm = ()=>{
    addEventContainer.style.display = "none"
    EventsDisacrdFloatingBtn.style.display = "none"
    EventsAddFloatingBtn.style.display = "block"
    MainEventDisplayContainer.style.display = "block"
}
goToEventsPageBtn.addEventListener('click',()=>{
    window.location.href = "/admin/dashboard"
})
 EditPageMoreOptionBtn.addEventListener('click',()=>{
    EditPageMoreOptionBtn.style.display = 'none'
    usersRegisteredForEventContainer.style.display = "none"
    UsersRegisteredForThisEventBtn.style.display = 'block'
    EventMoreOptionscontainer.style.display = "block"

 })
 UsersRegisteredForThisEventBtn.addEventListener('click',()=>{
    EditPageMoreOptionBtn.style.display = 'block'
    usersRegisteredForEventContainer.style.display = "block"
    UsersRegisteredForThisEventBtn.style.display = 'none'
    EventMoreOptionscontainer.style.display = "none"

 })
 const updateEventBtn = ()=> {
    moreEventsOptionsForm.setAttribute('action',"/admin/event/updateEvent")
    moreEventsOptionsForm.setAttribute('method',"POST")
    moreEventsOptionsForm.submit()
} 
const deleteEventBtn = ()=>{
    moreEventsOptionsForm.setAttribute('action',"/admin/event/deleteEvent")
    moreEventsOptionsForm.setAttribute('method','POST')
    moreEventsOptionsForm.submit();
}
 const eventSuccessmsgFunction = ()=>{
    if(eventSuccessmsg.textContent == ""){
        eventSuccessMsgContainer.style.display = "none"
    }else{
        eventSuccessMsgContainer.style.display = "block"
        setTimeout(()=>{
            eventSuccessMsgContainer.style.display = "none"
        },5000)
    }
 }
 const eventErrormsgFunction = ()=>{
    if(eventErrormsg.textContent === ""){
        eventErrorMsgContainer.style.display = "none"
    }else{
        eventErrorMsgContainer.style.display = "block"
        setTimeout(()=>{
            eventErrorMsgContainer.style.display = "none"
        },5000)
    }
 }
 eventSuccessmsgFunction()
 const searchEvent = ()=>{
    eventSearchForm.setAttribute("method","POST")
    eventSearchForm.setAttribute("action","/admin/event/searchEvent")
    eventSearchForm.submit()
 }
 