<?php
namespace App\Jobs;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class S3FileUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $userId;

    /**
     * Create a new job instance.
     *
     * @param  $file
     * @param  int  $userId
     * @return void
     */
    public function __construct($file, $userId)
    {
        $this->file = $file;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileData = $this->file;
        $fileContents = base64_decode($fileData['data']);
        $fileName = uniqid('', true) . '.' . $fileData['extension'];

        // Upload the file contents to S3
        Storage::disk('s3')->put($fileName, $fileContents);

        // Get the URL of the uploaded file
        $fileUrl = Storage::disk('s3')->url($fileName);

        $userObj = User::find($this->userId);
        $userObj->profileImage = $fileUrl;
        $userObj->save();
    }

    public function failed(\Throwable $exception)
    {
        print_r($exception);
    }



}
