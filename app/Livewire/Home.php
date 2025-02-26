<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Category;

class Home extends Component
{
  use WithPagination;

  public $selectedCategory = null;
  public $categories = [];
  public $search = '';
  public $page = 1;

  protected $queryString = [
    'selectedCategory' => ['except' => null], // Sinkronkan kategori dengan URL
    'search' => ['except' => ''], // Sinkronkan pencarian dengan URL
    'page' => ['except' => null], // Sinkronkan paginasi dengan URL
  ];

  public function mount()
  {
    $this->categories = Category::all();
  }

  public function updatedSelectedCategory()
  {
    $this->resetPage(); // Reset halaman ke 1 jika kategori berubah
  }

  public function updatingSearch()
  {
    $this->resetPage(); // Reset halaman ke 1 jika pencarian dilakukan
  }

  public function render()
  {
    $posts = Post::query()
      ->where('is_show', 1)
      ->when($this->selectedCategory, function ($query) {
        $query->where('category_id', $this->selectedCategory);
      })
      ->when($this->search, function ($query) {
        $query->where('title', 'like', '%' . $this->search . '%');
      });

    return view('livewire.home', [
      'posts' => $posts->paginate(9),
    ]);
  }
}