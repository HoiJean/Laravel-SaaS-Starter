@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-md-3 col-md-offset-1">
        @include('pages.dashboard.partials.features')
      </div>

      <div class="col-md-7">
          <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>

              <div class="panel-body">
                  You are logged in!
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
