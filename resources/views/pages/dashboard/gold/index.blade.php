@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-md-3 col-md-offset-1">
        @include('pages.dashboard.partials.features')
      </div>

      <div class="col-md-7">
          <div class="panel panel-default">
              <div class="panel-heading">Gold Users Areas</div>

              <div class="panel-body">
                  Gold Users Areas
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
