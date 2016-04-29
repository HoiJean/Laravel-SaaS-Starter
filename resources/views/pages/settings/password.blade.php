@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        @include('pages.settings.partials.settings_tab')
      </div>

      <div class="col-md-7 ">
          <div class="panel panel-default">
              <div class="panel-heading">Update Password</div>
                <div class="panel-body">

                  @if (Session::has('flash_success'))
                  <div class="alert alert-success" role="alert">{{Session::get('flash_success')}}</div>
                  @endif

                  <form class="form-horizontal" role="form" method="POST" action="{{ route('settings.password.post') }}">
                      {!! csrf_field() !!}


                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Password</label>

                          <div class="col-md-6">
                              <input type="password" class="form-control" name="password">

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Confirm Password</label>

                          <div class="col-md-6">
                              <input type="password" class="form-control" name="password_confirmation">

                              @if ($errors->has('password_confirmation'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                Update
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
          </div>
      </div>
    </div>
</div>
@endsection
