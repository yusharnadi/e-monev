<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}


function uploadFile($file)
{
    $name = $file->hashName();

    try {
//        $file->move('uploads', $name);
        $file->move(public_path("uploads/"), $name);
    } catch (\Exception $th) {
        Log::error($th->getMessage());
    }

    return $name;
}

function deleteFile($file)
{
    return File::delete(public_path("uploads/" . $file));
}
