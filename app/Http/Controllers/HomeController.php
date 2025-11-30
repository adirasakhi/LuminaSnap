<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;


class HomeController extends Controller
{
    public function explore()
{
    $photos = Photo::latest()->get();
    return view('page.explore', compact('photos'));
}

}
