@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
          <div class="panel-heading">
            <a href="{{ route('grants.index') }}">Go Back</a>
          </div>
          <div class="panel-body">
            <h2>{{ $grant->description }}</h2>
            <br>
            <ul class="list-group">
              <li class="list-group-item">
                <div>
                  <strong>ID:</strong> <br>
                  {{ $grant->id }}
                </div>
              </li>
              <li class="list-group-item">
                <div>
                  <strong>Amount:</strong> <br>
                  @currency( $grant->amount )
                </div>
              </li>
              <li class="list-group-item">
                <div>
                  <strong>Created:</strong> <br>
                  {{ $grant->created_at->toDayDateTimeString() }}
                  ( {{ $grant->created_at->diffForHumans() }} )
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
