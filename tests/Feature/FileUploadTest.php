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
    public function testFileUpload()
    {
        Storage::fake('profiles');
        $file = UploadedFile::fake()->image('profile_pic.jpg');

        $response = $this->post('/', [
            'file' => $file,
        ]);

        // Redirect means we passed validation and uploaded file without error.
        $response->assertStatus(302);
    }

}
