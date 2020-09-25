<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function create_company_test(){
         $formdata = [
             'name',
             'email',
             'logo',
             'website',
         ];

         $this->get(route('companies.index'))->assertStatus(201);
    }
}
