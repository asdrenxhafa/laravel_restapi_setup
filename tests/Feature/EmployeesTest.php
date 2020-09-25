<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexExample()
    {
        $this->get(route('employees.index'))->assertStatus(200);
    }

    public function testShow_employee()
    {
        $this->get(route('employees.show',5))->assertStatus(200);
    }

    public function testCreate_employee()
    {
        $formData = [
            'first_name' => 'aasaad',
            'last_name' => 'asaad',
            'company' => '1',
            'email' => 'asdkikk@gmail.com',
            'phone' => '1234522',
        ];

        $this->post(route('employees.store',$formData))->assertStatus(422);
    }

    public function testUpdate_employee()
    {
        $formData = [
            'first_name' => 'asaad',
            'last_name' => 'asaad',
            'company' => '2',
            'email' => 'asdkkkklllk@gmail.com',
            'phone' => '132444',
        ];

        $this->put(route('employees.update',5),$formData)->assertStatus(422);
    }

    public function testDelete_employee()
    {
        $this->delete(route('employees.delete',96))->assertStatus(404);
    }
}
