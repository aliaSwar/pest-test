<?php

use App\Models\User;



it('user has login', function () {
    $response = $this->post('/api/login', [
        'email'      =>  'user@app.com',
        'password'   =>  '123456789'
    ])/* ->assertSessionHasErrors(['email', 'password']) */;

    $response->assertStatus(200);
    $this->assertDatabaseHas('users', [
        'email'      =>  'user@app.com',
    ]);
});
