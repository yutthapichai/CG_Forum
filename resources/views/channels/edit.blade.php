@extends('layouts.app')

@section('content')
@include('errors.inputserrors')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit channel: {{ $channel->title }}</div>

                <div class="card-body">

                    <form class="" action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div class="form-group">
                        <input type="text" name="channel" value="{{ $channel->title }}" class="form-control">
                      </div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="submit" name="button" class="btn btn-success">Update channel</button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
