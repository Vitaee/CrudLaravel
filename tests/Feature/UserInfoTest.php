<?php

use App\Models\User;

it('get user profile', function () {
    $user = User::factory()->create(['profileImage' => 'empty']);
    $this->actingAs($user, 'sanctum')->getJson('/api/v1/user/')->assertStatus(200);
});

it('user profile response should have key profileImage', function ()  {
    $user = User::factory()->create(['profileImage' => 'empty']);

    $user = $this->actingAs($user, 'sanctum');
    $response = $this->json('GET', '/api/v1/user/', [ $user ]);
    expect($response->json()['data'])->toHaveKey('profileImage');
});