<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;


class PostsSearch extends Component
{
    public $searchText = '';
    public $posts;
    public $categories;

    public $selectedCategories = [];

    public function render()
    {
        if($this->selectedCategories == null) {
            $this->posts = Post::search('post_title', $this->searchText)
                ->orWhere('post_content', 'like', '%' . $this->searchText . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $this->posts = Post::search('post_title', $this->searchText)
                ->orWhere('post_content', 'like', '%' . $this->searchText . '%')
                ->whereHas('categories', function (Builder $query) {
                    $query->whereIn('category_id', $this->selectedCategories);
                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('livewire.posts-search', [
            'categories' => $this->categories
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}

