@extends('layouts.app')

@section('content')
@include('errors.sessionerrors')
<div class="card mb-3">
    <div class="card-header bg-info text-warning">
      <img src="{{ asset($d->user->avatar)}}" alt="" width="50px" height="50px">
      <span>&nbsp<b>{{ $d->user->name }} </b>&nbsp{{ $d->created_at->diffForHumans() }}</span>
      <a href="{{ route('discussion.show', ['slug' => $d->slug ]) }}" class="btn btn-secondary btn-sm float-sm-right">view</a>
    </div>

    <div class="card-body text-white bg-secondary">
      <h5 class="card-title text-center">{{ $d->title}}</h5>
      <hr>
      <p class="card-text">{{ $d->content }}</p>
    </div>

    <div class="card-footer text-muted bg-dark">
      <h6 class="card-text">{{ $d->replies->count() }} Repies</h6>
    </div>
</div>
  @foreach($d->replies as $r)
    <div class="card mb-3 ml-5">
        <div class="card-header bg-info text-white">
          <img src="{{ asset($r->user->avatar)}}" alt="" width="50px" height="50px">
          <span>&nbsp<b>{{ $r->user->name }} </b>&nbsp{{ $r->created_at->diffForHumans() }}</span>
        </div>

        <div class="card-body text-white bg-secondary">
          <p class="card-subtitle card-text">{{ $r->content }}</p>
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

  <div class="card mb-3 ml-5">
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
@endsection
