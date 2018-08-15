@extends('layouts.app')

@section('content')
@include('errors.sessionerrors')
<div class="card mb-3">
    <div class="card-header bg-info text-warning">
      <img src="{{ asset($d->user->avatar)}}" alt="" width="50px" height="50px">
      <span>&nbsp<b>{{ $d->user->name }} </b>( {{ $d->user->points }} )&nbsp{{ $d->created_at->diffForHumans() }}</span>
      @if(Auth::id() == $d->user->id)
        @if(!$d->hasBestAnswer())
          <a href="{{ route('discussion.edit', ['$slug' => $d->slug ]) }}" class="btn alert-info btn-sm float-right ml-2">edit</a>
        @endif
      @endif
      @if($d->is_being_watched_by_auth_user())
        <a href="{{ route('discussion.unwatch', ['$id' => $d->id ]) }}" class="btn btn-warning btn-sm float-right">Watched</a>
      @else
        <a href="{{ route('discussion.watch', ['$id' => $d->id ]) }}" class="btn btn-secondary btn-sm float-right">Watch</a>
      @endif
    </div>

    <div class="card-body text-white bg-secondary">
      <h5 class="card-title text-center">{{ $d->title}}</h5>
      <hr>
      <p class="card-text">{!! Markdown::convertToHtml($d->content) !!}</p>

      @if($best_answer)
      <hr>
        <div class="card text-white">
          <div class="card-header bg-info">
            <div class="float-left">
              <img src="{{ asset($best_answer->user->avatar)}}" alt="" width="50px" height="50px">
              <span>&nbsp<b>{{ $best_answer->user->name }} ( {{ $best_answer->user->points }} )</b></span>
              <span>&nbsp{{ $best_answer->created_at->toFormattedDateString() }}</span>
            </div>

            @if(Auth::id() == $d->user->id)
            <a href="{{ route('discussion.unbest.answer',['id' => $best_answer->id]) }}" class="btn btn-sm btn-warning float-right">
              Cancel answer
            </a>
            @endif
          </div>
          <div class="card-body alert-info">
            <blockquote class="blockquote mb-0">
               <p class="text-center">{!! Markdown::convertToHtml($best_answer->content) !!}</p>
               <footer class="blockquote-footer">this comment is<cite title="Source Title"> the best answer</cite></footer>
             </blockquote>
          </div>
        </div>
      @endif

    </div>

    <div class="card-footer text-muted bg-dark">
      <span class="card-text">{{ $d->replies->count() }} Repies</span>
      <a href="{{ route('channel', ['slug' => $d->channel->slug ]) }}" class="btn btn-secondary btn-sm float-right">
        {{ $d->channel->title }}
      </a>
    </div>
</div>
  @foreach($d->replies as $r)
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
          <img src="{{ asset($r->user->avatar)}}" alt="" width="50px" height="50px">
          <span>&nbsp<b>{{ $r->user->name }} </b>( {{ $r->user->points }} )&nbsp{{ $r->created_at->diffForHumans() }}</span>

          @if(Auth::id() == $r->user->id)
            @if(!$r->best_answer)
            <a href="{{ route('reply.edit',['id' => $r->id]) }}" class="btn btn-sm alert-info float-right ml-2">
              Edit reply
            </a>
            @endif
          @endif
          @if(!$best_answer)
            @if(Auth::id() == $d->user->id)
              <a href="{{ route('discussion.best.answer',['id' => $r->id]) }}" class="btn btn-sm btn-secondary float-right">
                Mark a best answer
              </a>
            @endif
          @endif
        </div>

        <div class="card-body text-white bg-secondary">
          <p class="card-subtitle card-text">{!! Markdown::convertToHtml($r->content) !!}</p>
        </div>

        <div class="card-footer text-muted bg-dark">
          <h6 class="card-text">
            @if($r->is_liked_by_auth_user())
              <a href="{{ route('reply.unlike', ['id' => $r->id]) }}" class="btn btn-danger btn-sm">Unlike&nbsp<span class="badge badge-pill badge-light">{{ $r->likes->count() }}</span></a>
            @else
              <a href="{{ route('reply.like', ['id' => $r->id]) }}" class="btn btn-primary btn-sm">Like&nbsp<span class="badge badge-pill badge-light">{{ $r->likes->count() }}</span></a>
            @endif
          </h6>
        </div>
    </div>
  @endforeach

  @if(Auth::check())
  <div class="card mb-3">
      <div class="card-header bg-info text-white">
        <img src="{{ asset(Auth::user()->avatar)}}" alt="" width="50px" height="50px">
        <span>&nbsp<b>{{ Auth::user()->name }} </b></span>
      </div>

      <div class="card-body text-white bg-secondary">
        <form class="" action="{{ route('discussion.reply', ['id' => $d->id ]) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="reply">Leave a reply...</label>
            <textarea name="reply" id="reply" rows="5" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-info float-right">Leave a reply</button>
          </div>
        </form>
      </div>
  </div>
  @else
  <div class="float-right my-3">
    <h5>Sign in to leave a reply -></h5>
  </div>
  @endif
@endsection
