@extends('app')

@section('title', '記事一覧')

@section('content')
@include('nav')
<div class="container">
    @foreach($articles as $article)
    <div class="mt-3 card">
        <div class="flex-row card-body d-flex">
            <i class="mr-1 fas fa-user-circle fa-3x"></i>
            <div>
                <div class="font-weight-bold">
                    {{ $article->user->name }}
                </div>
                <div class="font-weight-lighter">
                    {{ $article->created_at->format('Y/m/d H:i') }}
                </div>
            </div>
        </div>
        <div class="pt-0 pb-2 card-body">
            <h3 class="h4 card-title">
                {{ $article->title }}
            </h3>
            <div class="card-text">
                {!! nl2br(e( $article->body )) !!}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection