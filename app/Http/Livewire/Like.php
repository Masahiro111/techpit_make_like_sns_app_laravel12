<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Like as ModelsLike;
use Livewire\Component;

class Like extends Component
{
    public $article;
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
            ModelsLike::create([
                'user_id' => auth()->id(),
                'article_id' => 1,
            ]);

            $this->count++;
        }
    }

    public function render()
    {
        return view('livewire.like');
    }
}
