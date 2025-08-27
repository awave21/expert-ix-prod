<?php
 
namespace App\Http\Controllers;

use App\Models\Lecturers;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LecturersController extends Controller
{
public function Lecturers(){
    $lecturers = Lecturers::latest()->get();
    return Inertia::render('Lecturers',compact('lecturers'));
}
}
