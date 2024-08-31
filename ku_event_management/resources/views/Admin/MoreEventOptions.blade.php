@extends('Admin.layouts.DashboardLayout')
@section("content")
<div class="MainEventMoreOptions">
 @section('navContent')
 <h3>More Options of  Event  id No : {{$Event->id}}</h3>
    <button class="EventMoreOptionsNavbarBtn eventFilterBtn" id="EditPageMoreOptionBtn">Edit Page</button>

    <button class="EventMoreOptionsNavbarBtn eventFilterBtn" id="UsersRegisteredForThisEventBtn">see Users Registered for this event</button>
@endSection 
<div class="EventMoreOptionscontainer" id="EventMoreOptionscontainer">
    <form class="addEventsForm"  id="moreEventsOptionsForm">
        @csrf
        <input type="number" name="Id" value="{{$Event->id}}" class="editEventIdContainer"/>
        <input placeholder="Event Name" type="text" name="eventName" class="addEventInput" value="{{$Event->event_Name}}" required/>
        <label for="EventDescription">Event Description:</label>
        <textarea placeholder="{{$Event->event_Description}}"  name="eventDescription" class="addEventTextarea" value="{{$Event->event_Description}}"></textarea>
        <label for="eventDate"> Event Date:</label>
        <input placeholder="Event Date" type="date" required name="eventDate" class="addEventInput" value="{{$Event->event_Date}}"/>
        <label for="eventTime"> Event Time:</label>
        <input placeholder="Event Time" type="time" required name="eventTime" class="addEventInput" value="{{$Event->even_tTime}}"/>
        <input placeholder="Event Venue" type="text" required name="eventVenue" class="addEventInput" value="{{$Event->event_Venue}}"/>
        <input placeholder="Organizer Name" type="text" required name="organizerName" class="addEventInput" value="{{$Event->organizerName}}"/>
        <input placeholder="Capacity" type="number" required name="capacity" class="addEventInput"value="{{$Event->event_Capacity}}"/>
        <input  placeholder=" Event type eg graduations ,end of year part..." required name="eventType" class="addEventInput" value="{{$Event->event_Type}}"/>
        <label for="registrationDeadline"> registration Deadline:</label>
        <input placeholder="Registration Deadline" type="date" required  name="registrationDeadline" class="addEventInput" value="{{$Event->registration_Deadline}}"/>    
        <div class="MoreEventOptionbuttonContainer">
            <button class="UpdateEventBtn moreEventOptionsBtn" onclick="updateEventBtn()">Update Event</button>
            <button class="DeleteEventBtn moreEventOptionsBtn" onclick="deleteEventBtn()">Delete Event </button>
            <button class="discardEditsBtn moreEventOptionsBtn">Discard Edits</button>             
        </div>
    </form>

</div>
    <div class="usersRegisteredForEventContainer" id="usersRegisteredForEventContainer">
        <p>This is where  the admin will see everybody who has registred for this event</p>
    </div>
</div>
@endsection 