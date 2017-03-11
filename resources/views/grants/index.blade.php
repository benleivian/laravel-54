@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        {{-- Available Grants --}}
        <div class="panel panel-default">
          <div class="panel-heading">
            <div style="display:flex; align-items:baseline;">
              <h2>Grants</h2>
              <h4 style="margin-left:1rem;color:{{ $remaining_amount < 1 ? '#a94442;' : '#0A8' }}">
                ( @currency( $remaining_amount ) remaining )
              </h4>
            </div>
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
                <th colspan="2">@currency( $grants_total )</th>
              </tr>
            </tfoot>
          </table>
            <div class="panel-footer">
              <div class="btn-group" role="group" aria-label="...">
                @if ( $remaining_amount > 0 )
                  <a href="{{ route('grants.create') }}" role="button" class="btn btn-default">Add New Grant</a>
                @else
                  <span role="button" class="btn btn-disabled" disabled>Additional Funds Needed For New Grants<span>
                @endif
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
