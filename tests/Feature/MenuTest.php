<?php

// tests/Feature/MenuTest.php

namespace Tests\Feature;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_menus_can_be_listed()
    {
        Menu::factory()->count(3)->create();

        $response = $this->get('/menus');

        $response->assertStatus(200);
        $response->assertViewHas('menus');
    }

    public function test_a_menu_can_be_created()
    {
        $response = $this->post('/menus', [
            'name' => 'Test Menu',
        ]);

        $response->assertRedirect('/menus');
        $this->assertDatabaseHas('menus', [
            'name' => 'Test Menu',
        ]);
    }

    public function test_a_menu_can_be_updated()
    {
        $menu = Menu::factory()->create();

        $response = $this->put("/menus/{$menu->id}", [
            'name' => 'Updated Menu',
        ]);

        $response->assertRedirect('/menus');
        $this->assertDatabaseHas('menus', [
            'id' => $menu->id,
            'name' => 'Updated Menu',
        ]);
    }

    public function test_a_menu_can_be_deleted()
    {
        $menu = Menu::factory()->create();

        $response = $this->delete("/menus/{$menu->id}");

        $response->assertRedirect('/menus');
        $this->assertDatabaseMissing('menus', [
            'id' => $menu->id,
        ]);
    }
}