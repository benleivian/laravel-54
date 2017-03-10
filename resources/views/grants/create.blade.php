@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if ( $errors->any() )
          <div class="alert alert-danger">
            @foreach ( $errors->all() as $error )
              {{ $error }}
            @endforeach
          </div>
        @endif
        <div class="panel panel-default">
          <form class="" action="{{ route('grants.store') }}" method="post">
            {{ csrf_field() }}
            <div class="panel-body">
              <h2>Add Grant</h2>
              <br>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" >
              </div>
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" >
              </div>
            </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <a class="btn btn-default" href="{{ route('grants.index') }}">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
