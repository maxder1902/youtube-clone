<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;
use getID3;


class ScanMediaDirectory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:media';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan the media folder to insert these as records in the DB.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $directory = base_path('public/media');
        $contents = scandir($directory);

        $getId3 = new GetId3();

        foreach ($contents as $item) {
            if ($item != "." && $item != "..") {
                $title = pathinfo($item, PATHINFO_FILENAME);
                $defDescription = "Auto generated description of the video by scan:media command of a video in the media folder from MaxTube";
                $url = asset("media/{$item}");
                $filePath = "{$directory}/{$item}";

                //GetID3 to get the duration of the video
                $fileInfo = $getId3->analyze($filePath);
                $durationInSeconds = $fileInfo['playtime_seconds'];

                //Insert records in DB

                Video::create([
                    "title" => $title,
                    "description" => $defDescription,
                    "video_url" => $url,
                    "duration" => $durationInSeconds,
                    "user_id" => 2,
                ]);

                $this->info("Video inserted - Title: {$title}");
            }
        }


        
        return Command::SUCCESS;
    }

}