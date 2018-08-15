@extends('layouts.app')

@section('content')
@include('errors.inputserrors')
@include('errors.sessionerrors')
<div class="card">
    <div class="card-header text-center">Updatew Discussion </div>
    <div class="card-body">
      <form class="" action="{{ route('discussion.update', ['id' => $discussion->id ]) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="content">Ask a quesrion</label>
          <textarea name="content" rows="8" cols="80" class="form-control">
            {{ $discussion->content }}
          </textarea>
        </div>
        <div class="form-group text-center">
          <button type="submit" name="button" class="btn btn-success">Update discussion</button>
        </div>
      </form>
    </div>
</div>
@endsection
