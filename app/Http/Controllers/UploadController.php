<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    //

    function index(Request $req){

        $req->validate([
            'file'=> 'required',
            'id'=> 'required'
        ]);

        // ensure it has file before we attempt anything else.
        if($req->hasFile('file')){

            $req->validate([
                'image' => 'mimes:jpeg,png,jpg,gif,bmp'
            ]);

            // save the file locally storage/public/ folder under a new folder named /pot
            $req->file->store('pot', 'public');

            $file_path = $req->file->hashName();

            $Updatter = DB::table('matches')
                                ->where('id', $req->id)
                                ->update(['pot' => $file_path]);

        }

        return $Updatter;
        //return $req->file('file')->store('pot');
    }
}
