<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use GuzzleHttp\Psr7\UploadedFile;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Storage;

class BlogController extends Controller
{
    public function create(): View
    {
        return view('blog.create', [
            'categories' => Category::select(['id', 'name'])->get(),
            'tags' => Tag::select(['id', 'name'])->get()
        ]);
    }



    public function store(CreatePostRequest $request){
        $post = new Post();
        $post=Post::create($this->extraData($post,$request));
        $post->tags()->sync($request->validated('tags'));
        return redirect()
        ->route('blog.show',['slug'=>$post->slug, 'post'=>$post->id])
        ->with('success',"l'article a bien été sauvegadé");
    }

    public function edit(Post $post): View
    {
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select(['id', 'name'])->get(),
            'tags' => Tag::select(['id', 'name'])->get()
        ]);
    }
    public function update(CreatePostRequest $request, Post $post)
    {


        $post->update($this->extraData($post,$request));
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ['post' => $post->id, 'slug' => $post->slug])
            ->with('success', 'L\'article a bien été modifié.');
    }
    private function extraData( Post $post,CreatePostRequest $request){

        $data = $request->validated();
        /** @var HttpUploadedFile|null $image */
        $image = $request->validated('image');
        if ($image===null|| $image->getError()) {
            return $data;

        }
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $data['image'] = $image->store('images', 'public');
        return $data;

    }



    public function index(): View
{


    return view('blog.index', [
        'posts' => Post::with('tags', 'category')
                       ->orderBy('created_at', 'desc')
                       ->paginate(5)
    ]);
}
    public function voir(string $slug, Post $post ): RedirectResponse | View{
        if ($post->slug !== $slug ) {
            return to_route('blog.show',['slug'=>$post->slug, 'post'=>$post->id ] );
        }
        return view('blog.show',[
            'post'=>$post
        ]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('blog.index')
            ->with('success', 'L\'article a bien été supprimé.');
    }
}
