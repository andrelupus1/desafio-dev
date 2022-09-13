<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Tests\TestCase;

class ParseCnabTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $file = FacadesFile::files(public_path('files'));
        $response = $this->post('/upload-file',['file'=> $file]);

        $response->assertStatus(419);
    }
}
