<?php

namespace Sepehrfci\Category\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Sepehrfci\Category\Models\Category;
use Sepehrfci\User\Models\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use  RefreshDatabase;
    use  WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_authenticated_user_can_see_categories_panel()
    {
        $user = $this->createUser();
        auth()->loginUsingId($user->id);
        $this->assertAuthenticated();
        $this->get(route('categories.index'))->assertOk();
    }

    public function test_authenticated_user_can_create_category()
    {
        $user = $this->createUser();
        auth()->loginUsingId($user->id);
        $this->assertAuthenticated();
        $this->createCategory();
        $this->assertEquals(1,Category::all()->count());
    }

    public function test_authenticated_user_can_update_category()
    {
        $user = $this->createUser();
        auth()->loginUsingId($user->id);
        $this->assertAuthenticated();
        $this->createCategory();
        $this->patch(route('categories.update',$user->id),[
            'title' => 'cat-update',
            'slug' => 'cat'
        ]);
        $this->assertEquals(1,Category::query()
            ->where('title','=','cat-update')->count());
    }

    public function test_authenticated_user_can_delete_category()
    {
        $user = $this->createUser();
        auth()->loginUsingId($user->id);
        $this->assertAuthenticated();
        $this->createCategory();
        $this->delete(route('categories.destroy',$user->id));
        $this->assertEquals(0,Category::all()->count());
    }

    public function createUser()
    {
        return User::query()->create([
            'name' => 'sepehr',
            'email' => 'fa@gmail.com',
            'phone' => '9253657852',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now()
        ]);
    }

    public function createCategory()
    {
        $this->post(route('categories.store'),[
            'title' => 'cat',
            'slug' => 'cat'
        ]);
    }
}
