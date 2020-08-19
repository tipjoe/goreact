<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    /**
     * Test a successful jpg file upload.
     */
    public function testValidFileUpload()
    {
        Storage::fake('profiles');
        $file = UploadedFile::fake()->image('profile_pic.jpg');

        $response = $this->post('/', [
            'file' => $file,
        ]);

        // Should be a 201 response - successful creation.
        // Would have rejected an unauthorized file type.
        $response->assertStatus(201);

        // File was uploaded.
        Storage::disk('profiles')->assertExists($file->hashName());
    }

    /**
     * Test a invalid file upload (gif)
     */
    public function testInvalidFileUpload()
    {
        Storage::fake('profiles');
        $file = UploadedFile::fake()->image('logo.gif');

        $response = $this->post('/', [
            'file' => $file,
        ]);

        // Should be a 403 response - forbidden.
        $response->assertStatus(403);

        // File was uploaded.
        Storage::disk('profiles')->assertMissing($file->hashName());
    }

}
