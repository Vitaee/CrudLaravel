<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class S3FileUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $file;
    private $user_id;

    public function __construct(UploadedFile $file, $user_id)
    {
        $this->file = $file;
        $this->user_id = $user_id;
    }


    public function handle()
    {
        $fileName = uniqid('', true) . '.' . $this->file->getClientOriginalExtension();

        // Upload the file to S3
        Storage::disk('s3')->put($fileName, file_get_contents($this->file), 'public');

        // Get the URL of the uploaded file
        $fileUrl = Storage::disk('s3')->url($fileName);

        $userObj = new User;
        $userObj->find($this->user_id);
        $userObj->profileImage = $fileUrl;
        $userObj->save();
    }

    public function failed(\Throwable $exception)
    {
        print_r($exception);
    }
}
