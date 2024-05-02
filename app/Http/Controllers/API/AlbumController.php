<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Support\Facades\Auth;


class AlbumController extends Controller
{

    public function index(Request $request){

        $userId = $request->userId;
        $album = Album::where('userId', $userId)->get();
        return response([
            'status_code' => '200',
            'status' => 'Success',
            'message' => 'Album fetched successfully',
             'data' => $album
            ], 200);
    }

    public function store(Request $request){

        $albumName = $request->album_name;
        $album = Album::create(['userId' =>  $request->userId,'albumName' => $albumName]);
        return response([
            'status_code' => '200',
            'status' => 'Success',
            'message' => 'Album created successfully'
            ], 200);
    }

    public function get_photos(Request $request) {
        $albumId = $request->albumId;
        $userId = $request->userId;
        $albumImages = AlbumImage::where(['userId' =>  $userId,'albumId' => $albumId])->get();
        return response([
            'status_code' => '200',
            'status' => 'Success',
            'message' => 'Album Images fetched successfully',
             'data' => $albumImages
            ], 200);
    }

}
