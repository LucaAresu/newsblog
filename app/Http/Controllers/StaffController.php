<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index(User $user)
    {
        return view('staff.template.template');
    }
}
