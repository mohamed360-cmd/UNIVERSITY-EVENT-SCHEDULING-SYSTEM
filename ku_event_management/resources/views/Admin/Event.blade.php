@section('content')
<div class="MainEventContainer">
        @section('navContent')
        <h3>Kenyata University Events</h3>
        <form class="SearchContainer" id="eventSearchForm" >
            <input placeholder="Search Event by name" type="text" name="searchEventName" />
            <button class="eventSearchBtn" type="button" id="eventSearchBtn">Search</button>
        </form>
        <div class="eventFilterContainer">
            <button class="eventFilterBtn">All Events</button>
            <button class="eventFilterBtn">Up Coming</button>
            <button class="eventFilterBtn">Past Events</button>
        </div>
        @endSection
    <div class="MainEventDisplayContainer" >
        <div class="EventDisplayContainer" id="MainEventDisplayContainer">
            @foreach ($eventList as $event)
            <div class="event-container">
                
                <a class="MoreOptionsEventsBtn" href="/admin/event/{{$event->id}}">More Options</a>
                <h3 class="event-name">{{$event->event_Name}}</h3>
                <div class="event-details">
                    <p class="event-type">Type: {{$event->event_Type}}</p>
                    <div class="event-descriptionContainer">
                        <p class="event-description">{{$event->event_Description}}</p>
                    </div>
                    
                    <p class="event-date-time">
                        <span>Date: {{$event->event_Date}}</span> | 
                        <span>Start: {{$event->even_tTime}}</span>
                    </p>
                    <p class="event-venue">Venue: {{$event->event_Venue}}</p>
                    <p class="event-organizers">Organizers: {{$event->organizerName}}</p>
                    <p class="event-capacity">Seats: {{$event->event_Capacity}}</p>
                    <p class="registration-deadline">Registration Deadline: {{$event->registration_Deadline}}</p>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="addEventContainer" id="addEventContainer">
            <form class="addEventsForm" method="POST" action="/admin/addEvent">
                @csrf
                
                <input placeholder="Event Name" type="text" name="eventName" class="addEventInput"/>
                <textarea placeholder="Event Description" name="eventDescription" class="addEventTextarea"></textarea>
                <label for="eventDate"> Event Date:</label>
                <input placeholder="Event Date" type="date" name="eventDate" class="addEventInput"/>
                <label for="eventTime"> Event Time:</label>
                <input placeholder="Event Time" type="time" name="eventTime" class="addEventInput"/>
                <input placeholder="Event Venue" type="text" name="eventVenue" class="addEventInput"/>
                <input placeholder="Organizer Name" type="text" name="organizerName" class="addEventInput"/>
                <input placeholder="Capacity" type="number" name="capacity" class="addEventInput"/>
                <input  placeholder=" Event type eg graduations ,end of year part..." name="eventType" class="addEventInput"/>
                <label for="registrationDeadline"> registration Deadline:</label>
                <input placeholder="Registration Deadline" type="date" name="registrationDeadline" class="addEventInput"/>
                <input type="submit" value="Create Event" class="submitBtn"/>
            </form>
            
        </div>        
    </div>
    <button class="EventsAddFloatingBtn" id="EventsAddFloatingBtn" onclick="showAddEventForm()">Add Event</button>
    <button class="EventsDisacrdFloatingBtn" id="EventsDisacrdFloatingBtn" onclick="hideAddEventForm()">Discard</button>

    <div class="successMsgContainer" id="eventSuccessMsgContainer">
        <p id="eventSuccessmsg">{{session("Smsg")}}</p>
    </div>
    @if(!$status)
    <div>
        <p>Nothing To See here</p>
    </div>
    @endif
    <div class="ErroMsgContainer" id="eventErrorMsgContainer">
        <p id="eventErrormsg">{{session("Emsg")}}</p>
    </div>
</div> 
@endsection
@extends('Admin.layouts.DashboardLayout')


