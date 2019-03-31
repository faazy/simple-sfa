<?php

namespace Tests\Feature;

use App\Company;
use App\Repositories\CustomerRepository;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_t_can_create_a_customer()
    {
        $data = [
            'name' => 'Faazi',
            'email' => 'test@mail.com',
            'group_name' => 'customer',
            'address' => 'test address',
            'phone' => '0713221220',
        ];

        $customerRepo = new CustomerRepository(new Company());
        $customer = $customerRepo->create($data);
//dd($customer);
        $this->assertInstanceOf(Company::class, $customer);
        $this->assertEquals($data['name'], $customer->name);
        $this->assertEquals($data['email'], $customer->email);
        $this->assertEquals($data['group_name'], $customer->group_name);
        $this->assertEquals($data['address'], $customer->address);
        $this->assertEquals($data['phone'], $customer->phone);
    }
}
