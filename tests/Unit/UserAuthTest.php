<?php

namespace Tests\Unit;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use function Pest\Laravel\json;

class UserAuthTest extends TestCase {
    use RefreshDatabase;
    public function test_register_user() {
        $random_int = rand(1,150);
        Storage::fake('avatars');

        $this->post('api/v1/user/register', [
            'email' => "test{$random_int}@gmail.com",
            'name' => 'test',
            'password' => 'string1',
            'profileImage' =>  UploadedFile::fake()->image('avatar.png')
        ])->assertStatus(200);
    }
    public function test_login_user() {

        $user = User::factory()->create(['profileImage'=> 'empty' ]);

        $response = $this->post('api/v1/user/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }
    public function test_users_can_not_authenticate_with_invalid_password() {
        $user = User::factory()->create(['profileImage' => 'empty']);

        $this->post('api/v1/user/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ])->assertStatus(404);

    }
    public  function test_name_is_required_when_registration() {
        $this->post('api/v1/user/register', [
            'email' => "test@gmail.com",
            'name' => null,
            'password' => 'string1',
            'profileImage' =>  UploadedFile::fake()->image('avatar.png')
        ])->assertStatus(422);
    }

    public function test_users_authenticate_with_correct_credentials() {
        $user = User::factory()->create(['profileImage' => 'empty']);

        $res = $this->json('POST', 'api/v1/user/login', ['email' => $user->email, 'password' => 'password'
            ])->assertStatus(200);

        $res_in_string =  $res->json()['data'];
        $res = explode("|", $res_in_string);
        $this->assertTrue(count($res) == 2);
    }
}
