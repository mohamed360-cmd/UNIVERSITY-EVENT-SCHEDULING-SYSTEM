@section('content')
<div class="mainMyEventContainer">
    @if($length > 0)
        @foreach($Events as $event)
        @if($event->registaration_status != "Deregistared")
            <form class="event-container" id="myEventsForm">
                @csrf
                <div class="HomelogoContainer">
                    <img src="../../Images/KU_logo.png" alt="Logo"/>
                </div>
                <input type="hidden" value="{{$event->id}}" name="eventRegistrationId"/>
                <input type="hidden" value="{{$event->event_id}}" id="event_Id" />

                <h3 class="event-name">{{$event->event_Name}}</h3>
                <p>Registration Status : {{$event->registaration_status}}</p>
                <div>
                <button type="button" class="myEventsBtn deregister" onclick="deregisterEvent()">Deregister</button>
                <button type="button" class="myEventsBtn moreInfo" onclick="moreEventInfo()">More Info</button>                
                </div>
    
            </form>
        @else
        @continue
        @endif
        @endforeach
    @else 
    <p> You Have Not Registered For Any Events </p>
    @endif
    <div  class="DialogAlert SuccessAlert" id="successDialogAlert"> <p id="successDialogMessage">{{session("SuccessMsg")}}</p></div>
    <div  class="DialogAlert ErrorAlert" id="errorDialogAlert"> <p id="ErrorDialogMessage">{{session("ErrorMsg")}}</p></div>
</div>
@endsection
@extends('USers.Layouts.userLayout')