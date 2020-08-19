<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    /**
     * Show the file upload form and list in one action.
     */
    public function index() {
        return view('home');
    }

    /**
     * Create file upload.
     */
    public function store() {

    }

    /**
     * Get existing file to show.
     */
    public function show(Request $request, string $id) {

    }


}
