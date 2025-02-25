<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostDetail extends Component
{
  public $post;
  public $latestPosts;

  public function mount($id)
  {
    // Fetch the current post
    $this->post = Post::with('category')->findOrFail($id);

    // Fetch the latest posts (limit to 5)
    $this->latestPosts = Post::latest()->take(5)->get();
  }

  public function render()
  {
    return view('livewire.post-detail', [
      'post' => $this->post,
      'latestPosts' => $this->latestPosts
    ])->title($this->post->title);
  }
}