<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;

class CompaniesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexExample()
    {
        $this->get(route('companies.index'))->assertStatus(200);
    }

    public function testShow_company()
    {
        $this->get(route('companies.show',2))->assertStatus(200);
    }

    public function testCreate_company()
    {
        $formData = [
            'name' => 'asadfvd',
            'email' => 'asdklsdklffklkaaalk@gmail.com',
            'logo' => 'https://lorempixel.com/200/200/?76711',
            'website' => 'http://www.grimes.info/',
        ];


        $this->post(route('companies.store',$formData))->assertStatus(422);
    }

    public function testUpdate_company()
    {
        $formData = [
            'name' => 'asdksdlklkl',
            'email' => 'asdklsdklklk@gmail.com',
            'logo' => 'https://lorempixel.com/200/200/?76711',
            'website' => 'http://www.grimes.info/',
        ];

        $this->put(route('companies.update',2),$formData)->assertStatus(422);
    }

    public function testDelete_company()
    {
        $this->delete(route('companies.delete',94))->assertStatus(404);
    }
}
