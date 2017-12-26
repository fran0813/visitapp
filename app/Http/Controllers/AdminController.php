<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use File;
use \Response;
use App\Answer;
use App\Department;
use App\Information;
use App\Question;
use App\Region;
use App\Survey;
use App\Town;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
