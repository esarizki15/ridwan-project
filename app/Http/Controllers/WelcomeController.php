<?php

namespace App\Http\Controllers;

use App\Http\Resources\LokasiResource;
use Illuminate\Http\Request;
use App\Lokasi;
class WelcomeController extends Controller
{
    public function index(){
        $locations = Lokasi::all();
        $locations = LokasiResource::collection($locations)->toJson();

        return view('welcome', compact('locations'));
    }
}
