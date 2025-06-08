<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Students;

class StudentRegistrationTest extends TestCase
{
    use RefreshDatabase; 

    public function test_student_can_register_successfully()
    {
    

        $response = $this->post('/register', [
            'full_name' => 'Ahmed Ali',
            'user_name' => 'ahmed123',
            'phone' => '0101010101',
            'whatsapp' => '0101010101',
            'address' => 'Cairo',
            'email' => 'ahmed@test.com',
            'password' => 'password@123',
            'password_confirmation' => 'password@123',
            'user_image' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $response->assertSessionHasNoErrors(); 
        $response->assertRedirect(); 

        $this->assertDatabaseHas('students', [
            'email' => 'ahmed@test.com',
            'user_name' => 'ahmed123',
        ]);
    }

    public function test_registration_fails_with_invalid_password()
    {
        $response = $this->post('/register', [
            'full_name' => 'Test',
            'user_name' => 'test123',
            'phone' => '12345',
            'whatsapp' => '12345',
            'address' => 'Test Address',
            'email' => 'test@domain.com',
            'password' => 'short',
            'password_confirmation' => 'short'
        ]);

        $response->assertSessionHasErrors(['password']);
    }

    public function test_registration_fails_if_email_or_username_exists()
{
   
    \App\Models\Students::create([
        'full_name' => 'Old User',
        'user_name' => 'duplicateUser',
        'phone' => '0111111111',
        'whatsapp' => '0111111111',
        'address' => 'Cairo',
        'email' => 'duplicate@example.com',
        'password' => bcrypt('Password@123'),
        'user_image' => 'default.png'
    ]);

   
    $response = $this->post('/register', [
        'full_name' => 'New User',
        'user_name' => 'duplicateUser',
        'phone' => '0123456789',
        'whatsapp' => '0123456789',
        'address' => 'Alex',
        'email' => 'duplicate@example.com',
        'password' => 'Test@1234',
        'password_confirmation' => 'Test@1234',
    ]);

    $response->assertSessionHasErrors(['email', 'user_name']);
}

public function test_registration_fails_with_short_username()
{
   
    $data = [
        'user_name' => 'ab', 
        'email' => 'test@example.com',
        'password' => 'Test@1234',
        'user_image' => \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg'), 
        'phone' => '0123456789',
        'full_name' => 'John Doe', 
        'whatsapp' => '0123456789',
        'address' => 'Alex',
        'password_confirmation' => 'Test@1234',];

    $response = $this->post('/register', $data);

    $response->assertSessionHasErrors('user_name');
}



public function test_register_routing_correct()
{
    $response = $this->get('/register');

    $response->assertStatus(200);
}

}
