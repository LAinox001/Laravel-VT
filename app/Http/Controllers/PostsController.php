<?php

namespace App\Http\Controllers;

use App\Forms\PostForm;
use App\Post;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class PostsController extends Controller
{
    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    public function index(){
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        $form = $this->getForm();
        return view('posts.create', compact('form'));
    }

    public function store(){
        $form = $this->getForm();
        $form->redirectIfNotValid();
        $form->getModel()->save();
        return redirect()->route('posts.index');
    }

    public function edit(Post $post){
        $form = $this->getForm($post);
        return view('posts.edit', compact('form'));
    }

    public function update(Post $post){
        $form = $this->getForm($post);
        $form->redirectIfNotValid();
        $post->save();
        return redirect()->route('posts.index');
    }

    public function getForm(?Post $post = null){
        $post = $post ?: new Post();
        return $this->formBuilder->create(PostForm::class, [
            'model' => $post
        ]);
    }
}
