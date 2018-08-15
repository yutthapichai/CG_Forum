@extends('layouts.app')

@section('content')
@include('errors.inputserrors')
@include('errors.sessionerrors')
<div class="card">
    <div class="card-header text-center">Update a reply </div>
    <div class="card-body">
      <form class="" action="{{ route('reply.update', ['id' => $reply->id ]) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="content">Answer a question</label>
          <textarea name="content" rows="8" cols="80" class="form-control">
            {{ $reply->content }}
          </textarea>
        </div>
        <div class="form-group text-center">
          <button type="submit" name="button" class="btn btn-success">Update reply</button>
        </div>
      </form>
    </div>
</div>
@endsection
