<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase; // Ensures a fresh DB for each test

    /** @test */
    public function it_can_create_a_product()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'price' => 100,
            'description' => 'This is a test product',
        ]);

        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }

    /** @test */
    public function it_can_read_a_product()
    {
        $product = Product::factory()->create();

        $foundProduct = Product::find($product->id);

        $this->assertNotNull($foundProduct);
        $this->assertEquals($product->name, $foundProduct->name);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        $product = Product::factory()->create();

        $product->update(['name' => 'Updated Product']);

        $this->assertDatabaseHas('products', ['name' => 'Updated Product']);
    }

    /** @test */
    // public function it_can_delete_a_product()
    // {
    //     $product = Product::factory()->create();

    //     $product->delete();

    //     $this->assertDatabaseMissing('products', ['id' => $product->id]);
    // }
}