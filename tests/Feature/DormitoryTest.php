<?php

namespace Tests\Feature;

use App\Models\Dormitory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DormitoryTest extends TestCase
{
    use RefreshDatabase;
    const URL_TEST = '/dashboard/dormitory';
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_dormitory_page_loads()
    {
        $response = $this->get(DormitoryTest::URL_TEST);

        $response->assertStatus(200);
    }

    public function test_empty_dormitory_page()
    {
        $response = $this->get(DormitoryTest::URL_TEST);

        $response->assertSeeText('Tidak ada Data Penghuni');
    }

    public function test_add_data_at_dormitory(){
        $dormitory = Dormitory::factory()->create([
            'name' => 'dahyun nico',
            'address' => 'test data adress',
            'phone_number' => '081234567890',
        ]);
-
        $response = $this->get(DormitoryTest::URL_TEST);
        $response->assertSeeText('dahyun nico');
        $response->assertSeeText('test data adress');
        $response->assertSeeText('081234567890');
    }

    public function test_edit_data_at_dormitory_by_id(){
        $data = Dormitory::factory()->create([
            'name' => 'dahyun nico',
            'address' => 'test data adress',
            'phone_number' => '081234567890',
        ]);

        $response = $this->followingRedirects()
            ->put(DormitoryTest::URL_TEST.'/'.$data->id, [
                'name' => 'dahyun nico 1',
                'address' => 'test data adress 2',
                'phone_number' => '081234567100',
                ])
            ->assertSeeText('Data penghuni berhasil diedit');
    }

    public function test_read_data_at_dormitory(){
        $dormitory = Dormitory::factory()->create([
            'name' => 'dahyun nico',
            'address' => 'test data adress',
            'phone_number' => '081234567890',
        ]);

        $response = $this->get(DormitoryTest::URL_TEST.'/'.$dormitory->id);
        $response->assertSeeText('dahyun nico');
        $response->assertSeeText('test data adress');
        $response->assertSeeText('081234567890');
    }

    public function test_delete_data_at_dormitory_by_id(){
        $data = Dormitory::factory()->create([
            'name' => 'dahyun nico',
            'address' => 'test data adress',
            'phone_number' => '081234567890',
        ]);

        $this->followingRedirects()
            ->from(DormitoryTest::URL_TEST)
            ->delete(DormitoryTest::URL_TEST.'/'.$data->id)
            ->assertSeeText('Tidak ada Data Penghuni');
    }
}
