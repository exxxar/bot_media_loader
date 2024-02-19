<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Models\Bot;
use App\Models\BotMedia;
use Illuminate\Support\Facades\Http;

$router->get('/{fileId}', function ($fileId) use ($router) {

    $media = BotMedia::query()
        ->where("file_id", $fileId)
        ->first();

    if (is_null($media))
        return null;

    $bot = Bot::query()
        ->withTrashed()
        ->where("id", $media->bot_id)
        ->first();

    if (is_null($bot))
        return null;

    $data = Http::get("https://api.telegram.org/bot" . $bot->bot_token . "/getFile?file_id=$fileId");

    $data = $data->json();

    if (!$data["ok"])
        return null;

    $type = explode("/", $data["result"]["file_path"]);


    switch ($type[0]) {
        case "photo":
        default:
            $file = "image.jpg";
            $contentType = "image/jpeg";
            break;
        case "videos":
        case "video_notes":
            $contentType = "video/mpeg";
            $file = "video.mp4";
            break;

    }


    $data = Http::get("https://api.telegram.org/file/bot" . $bot->bot_token . "/" . $data["result"]["file_path"]);

    return response($data)->withHeaders([
        'Content-disposition' => 'attachment; filename=' . $file,
        'Access-Control-Expose-Headers' => 'Content-Disposition',
        'Content-Type' => $contentType,
    ]);

});
