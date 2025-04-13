<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_post(): void
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test.jpg');

        $response = $this->post('/blog', [
            'title' => 'Mon premier article',
            'slug' => 'mon-premier-article',
            'content' => 'Contenu de l\'article',
            'image' => $file
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('posts', [
            'title' => 'Mon premier article',
            'slug' => 'mon-premier-article'
        ]);
        Storage::disk('public')->assertExists('posts/' . $file->hashName());
    }

    public function test_can_delete_post(): void
    {
        $post = Post::factory()->create();

        $response = $this->delete('/blog/' . $post->id);

        $response->assertRedirect();
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_can_update_post(): void
    {
        $post = Post::factory()->create();
        Storage::fake('public');
        $file = UploadedFile::fake()->image('updated.jpg');

        $response = $this->put('/blog/' . $post->id, [
            'title' => 'Titre mis à jour',
            'slug' => 'titre-mis-a-jour',
            'content' => 'Contenu mis à jour',
            'image' => $file
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Titre mis à jour',
            'slug' => 'titre-mis-a-jour'
        ]);
    }
}
