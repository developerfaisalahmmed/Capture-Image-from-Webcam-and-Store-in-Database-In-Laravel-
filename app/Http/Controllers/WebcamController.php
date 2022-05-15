<?php

namespace App\Http\Controllers;

use App\Models\Webcam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;
class WebcamController extends Controller
{
    public function index()
    {
        $web_images = Webcam::all();
        return view('webcam',compact('web_images'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $img = $request->image;
        $folderPath = "uploads/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
//        Storage::put($file, $image_base64);
//        Storage::disk('public')->put($file, $image_base64);

        $webcam = new Webcam();
        $webcam->image = $file;
        Storage::put($file, $image_base64);
        $webcam->save();
        return redirect('/');
    }
}
