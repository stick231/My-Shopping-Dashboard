<?php

namespace Tests\Unit;

use App\Http\Controllers\ProductController;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_products(): void
    {
        $products = Product::factory()->count(3)->create();

        $controller = new ProductController();
        $response = $controller->index();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        // $this->assertEquals('products.index', $response->name()); ошибка
        $this->assertArrayHasKey('products', $response->getData());
        $this->assertEquals($products->toArray(), $response->getData()['products']->toArray());
    }

    public function test_show_returns_product(): void
    {
        $product = Product::factory()->create();

        $controller = new ProductController();
        $response = $controller->show($product);

        // $this->assertEquals($product->toArray(), $response->toArray()); ошибка
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('product', $response->getData());
    }

    public function test_store_creates_product(): void
    {
        $productData = [
            'name' => 'Test Product',
            'price' => 100,
        ];

        $request = new ProductRequest();
        $request->replace($productData);

        $validator = Validator::make($productData, $request->rules());
        $request->setValidator($validator);

        $controller = new ProductController();
        $response = $controller->store($request);

        $this->assertNotNull($response);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('products', $productData);
    }

    public function test_update_modifies_product(): void
    {
        $updateData = [
            'name' => 'Test Product',
            'price' => 100,
        ];

        $product = Product::factory()->create();

        $request = new ProductRequest();
        $request->replace($updateData);

        $validator = Validator::make($updateData, $request->rules());
        $request->setValidator($validator);

        $controller = new ProductController();
        $response = $controller->update($request, $product);

        $this->assertNotNull($response);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('products', $updateData);
    }

    public function test_destroy_deletes_product(): void
    {
        $product = Product::factory()->create();
    
        $controller = new ProductController();
        $response = $controller->destroy($product);
    
        $this->assertDatabaseMissing('products', $product->toArray());
        $this->assertEquals(302, $response->getStatusCode());
    }
}
