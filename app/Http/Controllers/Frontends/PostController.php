<?php

namespace App\Http\Controllers\Frontends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
class PostController extends Controller
{
    private $postRepository;
    private $categoryRepository;
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function detail($slug, $id){
        $post = $this->postRepository->find($id);
        $this->setTitle($post->name);


        $this->viewParams['popular_posts'] = $this->postRepository->getPopularPost();
        $this->viewParams['categories'] = $this->categoryRepository->all();
        $this->viewParams['nextPost'] = $this->postRepository->getNextPost($id, $post->category_id);
        $this->viewParams['previousPost'] = $this->postRepository->getPreviousPost($id, $post->category_id);
        $this->viewParams['post'] = $post;
        return view('frontends.post.detail', $this->viewParams);
    }
}
