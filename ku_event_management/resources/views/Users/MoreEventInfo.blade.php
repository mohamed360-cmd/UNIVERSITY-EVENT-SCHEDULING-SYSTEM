@section('content')
<div>
    <div class="event-container">
        @csrf
        <div class="HomelogoContainer">
            <img src="../../Images/KU_logo.png" alt="Logo"/>
        </div>
        <input type="hidden" value="{{$event->id}}" name="eventId"/>
        <input type="hidden" value="{{$event->event_Name}}" name="eventName"/>
        <h3 class="event-name" id="event-Name">{{$event->event_Name}}</h3>
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
        <button type="button" class="registerEventBtn" onclick="gotToHomePage()">Back Home</button>
    </div>
</div>
@endsection
@extends("Users.Layouts.userLayout")