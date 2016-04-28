@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading">Settings</div>

                <div class="list-group">
                  <a href="{{ route('settings') }}" class="list-group-item">
                    Contact Info
                  </a>

                </div>
          </div>
      </div>

      <div class="col-md-7 ">
          <div class="panel panel-default">
              <div class="panel-heading">Update Contact Information</div>

                <div class="panel-body">

                  @if (Session::has('flash_success'))
                  <div class="alert alert-success" role="alert">{{Session::get('flash_success')}}</div>
                  @endif

                  <form class="form-horizontal" role="form" method="POST" action="{{ route('settings.contact.post') }}">
                      {!! csrf_field() !!}


                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Name</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">E-Mail Address</label>

                          <div class="col-md-6">
                              <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
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
