@extends('layouts.app')

@section('content')
@include('errors.sessionerrors')
<div class="card">
    <div class="card-header text-center">Create a new Discussion </div>
    <div class="card-body">
      <form class="" action="{{ route('discussion.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title"></label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="channel_id">Pick a channel</label>
          <select class="form-control" name="channel_id">
              @foreach($channels as $channel)
                <option value="{{ $channel->id }}"> {{ $channel->title }}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="content">Ask a quesrion</label>
          <textarea name="content" rows="8" cols="80" class="form-control"></textarea>
        </div>
        <div class="form-group text-center">
          <button type="submit" name="button" class="btn btn-success">Create discussion</button>
        </div>
      </form>
    </div>
</div>
@endsection
