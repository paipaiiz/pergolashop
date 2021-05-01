<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function index($any)
    {
        return Storage::response($any);
    }
}
