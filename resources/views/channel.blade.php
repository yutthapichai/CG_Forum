@extends('layouts.app')

@section('content')
  @foreach($discussions as $d)
  <div class="card mb-3">
      <div class="card-header bg-info text-warning">
        <img src="{{ asset($d->user->avatar)}}" alt="" width="50px" height="50px">
        <span>&nbsp{{ $d->user->name }} <b>{{ $d->created_at->diffForHumans() }}</b></span>
        <a href="{{ route('discussion.show', ['slug' => $d->slug ]) }}" class="btn btn-secondary btn-sm float-sm-right">view</a>
      </div>

      <div class="card-body text-white bg-secondary">
        <h5 class="card-title text-center">{{ $d->title}}</h5>
        <hr>
        <p class="card-text">{{ str_limit($d->content, 200) }}</p>
      </div>

      <div class="card-footer text-muted bg-dark">
        <span class="card-text">{{ $d->replies->count() }} Repies</span>
        <a href="{{ route('channel', ['slug' => $d->channel->slug ]) }}" class="btn btn-warning btn-sm float-right">
          {{ $d->channel->title }}
        </a>
      </div>
  </div>
  @endforeach
  <div class="">
    {{ $discussions->links() }}
  </div>
@endsection
