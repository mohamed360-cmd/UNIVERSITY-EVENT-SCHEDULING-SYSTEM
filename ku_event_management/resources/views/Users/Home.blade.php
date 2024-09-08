{{--This is the first page the user will see , i will contain  all the events--}}
@section('content')
    <div class="mainEventsDisplayContainer">
        @if(count($Events) > 0){{--This will check if their is any event --}}
        @foreach ($Events as $event)
        <form class="event-container" id="registerEventForm">
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
            @if($AuthStatus)
            <button type="button" class="registerEventBtn" onclick="registerUserForEvent()">Register for this Event </button>
            @else 
            <button type="button" class="registerEventBtn" onclick="showLoginDialog()">🔒Register for this Event </button>
            @endif
        </form>
        @endforeach
        @else 
        {{--This message will show if theier is not event s--}}
        <div class="ShowOppsMessageContainer">
            <p>Oops! their is nothing to see here </p>
        </div>
        @endif
        <dialog closed id="showAuthScreenDialog"> <p>Please Login To be able to register for this event </p> <a href="/login">Login</a> </dialog>
    </div>
    <div  class="DialogAlert SuccessAlert" id="successDialogAlert"> <p id="successDialogMessage">{{session("SuccessMsg")}}</p></div>
    <div  class="DialogAlert ErrorAlert" id="errorDialogAlert"> <p id="ErrorDialogMessage">{{session("ErrorMsg")}}</p></div>
@endsection
@extends('Users.Layouts.userLayout')
