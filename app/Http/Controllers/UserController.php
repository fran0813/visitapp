<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use \Response;
use App\Answer;
use App\Department;
use App\Information;
use App\Question;
use App\Region;
use App\Survey;
use App\Town;
use App\User;

class UserController extends Controller
{
	public function index(Request $request)
    {
        return view('user.index');
    }
}
