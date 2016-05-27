@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        @include('pages.settings.partials.settings_tab')
      </div>

      <div class="col-md-7">
          <div class="panel panel-default">
            <div class="panel-heading">Subscription</div>
            <div class="panel-body">
              @if($user->subscribed())
                <p>
                  You are subscribed. Thanks!
                </p>
              @else
                <p>
                  Looks like you're not subscribed. <a href="#">Join now</a>
                </p>
              @endif
            </div>

          </div>
      </div>
    </div>
</div>
@endsection
