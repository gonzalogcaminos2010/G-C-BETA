<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        // Prepara los datos necesarios para la prueba
        $user = User::factory()->create();
        $product = Product::factory()->create();

        // Actúa como si estuvieras enviando una petición POST a la ruta de 'store'
        $response = $this->actingAs($user)
                         ->post(route('orders.store'), [
                             'product_id' => $product->id,
                             'quantity' => 1,
                             // Incluye cualquier otro campo necesario aquí
                         ]);

        // Asegúrate de que la petición fue redirigida (o cualquier otro comportamiento que esperes)
        $response->assertRedirect(route('orders.index'));

        // Asegúrate de que los datos se guardaron en la base de datos correctamente
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            // Verifica cualquier otro campo aquí
        ]);

        $this->assertDatabaseHas('inventories', [
            'product_id' => $product->id,
            'quantity' => 1,
            'movement_type' => 'OUT',
            // Verifica cualquier otro campo aquí
        ]);
    }
}
