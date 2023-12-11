<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function recommendedVideos() {
        // Obtener todos los videos desde la base de datos
        $videos = Video::all();
    
        // Mostrar el resultado de la consulta SQL
        // dd($videos);
    
        // Renderizar la vista 'Dashboard' y pasar los videos como datos
        return Inertia::render('Dashboard', [
            'videos' => $videos,
        ]);
    }

    public function showVideo($id) {
        $video = Video::find($id);
        $user = DB::table('users')->where('id', '=', $video->user_id)->first();

        // return dd($video);

        return Inertia::render("WatchVideo", [
            'video' => $video,
            'user' => $user,
        ]);
    }
}
