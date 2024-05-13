<?php

namespace Tests\Unit;

use Tests\TestCase;

class UnitConversionTest extends TestCase
{
    public function testLengthConversion()
    {
        $response = $this->get('/convert/length/10/meters');
        $response->assertStatus(200)
            ->assertJson(['result' => 32.8084]);

        $response = $this->get('/convert/length/20/feet');
        $response->assertStatus(200)
            ->assertJson(['result' => 6.096]);
    }

    public function testWeightConversion()
    {
        $response = $this->get('/convert/weight/10/kilograms');
        $response->assertStatus(200)
            ->assertJson(['result' => 22.0462]);

        $response = $this->get('/convert/weight/20/pounds');
        $response->assertStatus(200)
            ->assertJson(['result' => 9.07184]);
    }

    public function testTemperatureConversion()
    {
        $response = $this->get('/convert/temperature/0/celsius');
        $response->assertStatus(200)
            ->assertJson(['result' => 32]);

        $response = $this->get('/convert/temperature/32/fahrenheit');
        $response->assertStatus(200)
            ->assertJson(['result' => 0]);
    }

    public function testVolumeConversion()
    {
        $response = $this->get('/convert/volume/10/liters');
        $response->assertStatus(200)
            ->assertJson(['result' => 2.64172]);

        $response = $this->get('/convert/volume/5/gallons');
        $response->assertStatus(200)
            ->assertJson(['result' => 18.9271]);
    }

    public function testSpeedConversion()
    {
        $response = $this->get('/convert/speed/100/kilometers');
        $response->assertStatus(200)
            ->assertJson(['result' => 62.1371]);

        $response = $this->get('/convert/speed/50/miles');
        $response->assertStatus(200)
            ->assertJson(['result' => 80.4672]);
    }
}