@extends('layouts.app')

@section('content')
@include('errors.sessionerrors')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Channels</div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <th width="50%">Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      @foreach($channels as $channel)
                        <tr>
                          <td>{{ $channel->title }}</td>
                          <td>
                            <a href="{{ route('channels.edit', ['channel' => $channel->id]) }}" class="btn btn-sm btn-info">Edit</a>
                          </td>
                          <td>
                            <form class="" action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection
