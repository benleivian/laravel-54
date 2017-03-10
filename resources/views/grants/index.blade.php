@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        {{-- Available Grants --}}
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2>Grants</h2>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Age</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($grants as $grant)
                <tr>
                  <td><a href="grants/{{ $grant->id }}">{{ $grant->description }}</a></td>
                  <td>{{ $grant->amount }}</td>
                  <td>{{ $grant->created_at or '&nbsp;' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
