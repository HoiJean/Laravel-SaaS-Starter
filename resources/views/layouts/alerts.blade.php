<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @if (Session::has('flash_success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('flash_success')}}
            </div>
            @endif

            @if (Session::has('flash_info'))
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('flash_info')}}
            </div>
            @endif

            @if (Session::has('flash_error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('flash_error')}}
            </div>
            @endif

            @if (Session::has('flash_warning'))
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('flash_warning')}}
            </div>
            @endif

        </div>
    </div>
</div>
