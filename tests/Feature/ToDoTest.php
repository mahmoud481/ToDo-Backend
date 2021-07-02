<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToDoTesting extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_store_new_note()
    {
        $data = [
            'title' => 'Complete Laravel Task',
            'description' => 'use new features'
        ];

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post(route('note.store'), $data);

        $response->assertStatus(201);
    }

    public function test_can_retrieve_one_note()
    {
        $id = 666;
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get(route('note.show', $id));

        $response->assertStatus(200);
    }
}
