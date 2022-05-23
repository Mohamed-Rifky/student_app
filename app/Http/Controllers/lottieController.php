<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lottieController extends Controller
{
    public function getLoadingImage(){
        $path = resource_path('js/lottie_files/loading.json');

        if (!File::exists($path)) {
            return response()->json(['message' => 'Image not found.'], 404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response()->make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
