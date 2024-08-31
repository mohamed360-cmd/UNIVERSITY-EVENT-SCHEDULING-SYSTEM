<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\event;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventsController extends Controller
{
    public function index(){//this routes will return all events 
        try{
            $eventsList = event::all();

        }catch(ModelNotFoundException $e){
            error_log("Error in index function".$e);
        }

    }
}
