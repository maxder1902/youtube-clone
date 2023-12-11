<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function showChannel($email) {
        $user = DB::table('users')->where('email', '=', $email)->first();
        $videos = DB::table('videos')->select('*')->where('user_id', '=', $user->id)->get();
        return Inertia::render("Channel", [
            'user' => $user,
            'videos' => $videos,
        ]);
    }
}
