@extends('layouts.app')

@section('content')
@include('errors.inputserrors')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new channel</div>

                <div class="card-body">

                    <form class="" action="{{ route('channels.store') }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <input type="text" name="channel" class="form-control">
                      </div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="submit" name="button" class="btn btn-success">Save channel</button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
