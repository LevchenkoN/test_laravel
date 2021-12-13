<?php
declare(strict_types=1);
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class PostsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test  */
    public function test_user_posts()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
    }
}
