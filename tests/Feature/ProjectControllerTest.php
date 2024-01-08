<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    /**
     * Test successful project creation.
     */
    public function testSuccessfulProjectCreation()
    {
        
        $data = [
            'title' => "dfasdf",
            'description' => 'Valid description with three words',
            'number_of_student' => 4, // Valid number of students
            'year' => 2023, // Valid year
            'trimester' => 2, // Valid trimester
          
        ];

        $response = $this->post('/project/create', $data);
        $response->assertStatus(302); // 302 Found, indicating a redirect after successful creation
        $this->assertDatabaseHas('projects', ['title' => $data['title']]);
    }

    /**
     * Test project creation with input validation errors.
     */
    public function testProjectCreationWithValidationErrors()
    {
        $user =  \App\Models\User::factory()->create();
        $this->actingAs($user);

        $data = [
            // Missing 'title' field to trigger validation error
            'description' => 'Invalid description',
            'number_of_student' => 'Invalid number', // Invalid number of students
            'year' => 'Invalid year', // Invalid year
            'trimester' => 'Invalid trimester', // Invalid trimester
            'files' => [UploadedFile::fake()->create('document.txt')], // Invalid file type
        ];

        $response = $this->post('/project/create', $data);
        $response->assertStatus(302); // 302 Found, indicating a redirect after validation error
        $response->assertSessionHasErrors(['title', 'description', 'number_of_student', 'year', 'trimester', 'files.0']);
    }

    /**
     * Test project creation with a duplicate title for the same year and trimester.
     */
    public function testProjectCreationWithDuplicateTitle()
    {
        $user =  \App\Models\User::factory()->create();
        $this->actingAs($user);

        $existingProject =  \App\Models\Project::factory()->create(['year' => 2023, 'trimester' => 2]); // Create a project with the same year and trimester

        $data = [
            'title' => $existingProject->title, // Use the same title to trigger duplicate error
            'description' => 'Valid description with three words',
            'number_of_student' => 4, // Valid number of students
            'year' => 2023, 
            'trimester' => 2, 
           
        ];

        $response = $this->post('/project/create', $data);
        $response->assertStatus(302); // 302 Found, indicating a redirect after validation error
        $response->assertSessionHasErrors('title'); // Assert that 'title' field has validation error
    }
}
