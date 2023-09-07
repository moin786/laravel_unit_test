<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Peal\CorePackages\Suppliers\Task\SupplierTask;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Facades\Response;

class SupplierTest extends TestCase
{
    use DatabaseMigrations;

    private $supplier;

    public function setUp(): void
    {
        parent::setUp();

        $this->supplier = new SupplierTask();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * Insert supplier data test and check the collective input is an array
     * check the valid name and email address
     *
     * @return void
     */
    public function supplier_data_must_be_an_array()
    {
        $this->withoutExceptionHandling();

        $response = $this->supplier->add([
            'name' => 'name test',
            'mobile' =>  '014546588',
            'email' => 'test_email@gmail.com',
            'address' => 'Wari, Dhaka',
            'landphone' => '014546588',
            'contact_person' => 'test contact',
            'contact_person_mobile' => '014546588',
            'contact_person_email' => 'test_contact_email@gmail.com',
        ]);

        $this->assertEquals('Supplier insertd successfully', $response->getData()->msg);

       
    }

    /**
     * Update supplier record
     *
     * @test
     * @return void
     */
    public function check_the_valid_supplier_recrod_is_updated()
    {

        $this->withoutExceptionHandling();


        $response = $this->supplier->add([
            'name' => 'name test',
            'mobile' =>  '014546588',
            'email' => 'test_email@gmail.com',
            'address' => 'Wari, Dhaka',
            'landphone' => '014546588',
            'contact_person' => 'test contact',
            'contact_person_mobile' => '014546588',
            'contact_person_email' => 'test_contact_email@gmail.com',
        ]);

        $this->assertEquals('Supplier insertd successfully', $response->getData()->msg);

        $response_update = $this->supplier->update([
            'name' => 'name test',
            'mobile' =>  '014546588',
            'email' => 'test_email@gmail.com',
            'address' => 'Wari, Dhaka',
            'landphone' => '014546588',
            'contact_person' => 'test contact',
            'contact_person_mobile' => '014546588',
            'contact_person_email' => 'test_contact_email@gmail.com',
        ], @$response->getData()->data->id);

        $this->assertEquals('Supplier updated successfully', $response_update->getData()->msg);

    }

}
