<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function __construct() {
    $this->middleware('auth:role_user');
}
    public function index(){
        return view ('approval');
    }
}
