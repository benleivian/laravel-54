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
                <th>Created</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($grants as $grant)
                <tr>
                  <td><a href="grants/{{ $grant->id }}">{{ $grant->description }}</a></td>
                  <td>@currency( $grant->amount )</td>
                  <td>{{ $grant->created_at->diffForHumans() }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>&nbsp;</th>
                <th>@currency( $amount_total )</th>
                <th>&nbsp;</th>
              </tr>
            </tfoot>
          </table>
          <div class="panel-footer">
            <div class="btn-group" role="group" aria-label="...">
              <a href="{{ route('grants.create') }}" role="button" class="btn btn-default">Add New Grant</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
