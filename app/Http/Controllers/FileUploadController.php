<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    /**
     * Show the file upload form and list in one action.
     */
    public function index() {
        $files = session("files") ?: null;
        if ($files) {
            // Reverse sort to show recent uploads first.
            rsort($files);
        }
        return view('home', ['files' => $files]);
    }

    /**
     * Create file upload.
     */
    public function store(UploadFileRequest $request) {

        $files = session("files") ?: [];

        // Optional caption.
        $caption = $request->input('caption');

        // Save the file to local disk.
        // This could just as easily be saved to S3 or another cloud storage
        // by changing config/filesystems.php and supplying the AWS
        // credentials in the .env file.
        $next_id = count($files) ?: 0;
        $f = $request->file('myfile');
        $name = "file" . $next_id . "." . $f->extension();
        $path = $f->storeAs('public/uploads', $name);

        if ($path) {
            $new = (object) [
                'name' => $name,
                'path' => '/storage/uploads/' . $name,
                'created' => date('m/d/Y h:i:s a', time()),
                'type' => strToUpper($f->extension()),
                'caption' => $caption
            ];
            array_push($files, $new);
            session(['files' => $files]);
        }




        return redirect()->route('front')->with('status', 'Congrats! Your file was saved.');

    }

    /**
     * Get existing file to show.
     */
    public function show(Request $request, string $id) {

    }


}
