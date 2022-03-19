<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Like extends Component
{
    public Article $article;
    public int $count;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->count = $article->likes_count ?? 0;
    }

    public function like(): void
    {
        if ($this->article->isLiked()) {
            $this->article->removeLike();

            $this->count--;
        } elseif (auth()->user()) {
            $this->article->likes()->create([
                'user_id' => auth()->id(),
            ]);

            $this->count++;
        }
    }

    public function render()
    {
        return view('livewire.like');
    }
}
