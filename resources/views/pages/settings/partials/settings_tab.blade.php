<div class="panel panel-default">
    <div class="panel-heading">Settings</div>

      <div class="list-group">
        <a href="{{ route('settings') }}" class="list-group-item">
          Contact Info
        </a>

        <a href="{{ route('settings.password') }}" class="list-group-item">
          Update Password
        </a>

      </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Billing</div>

      <div class="list-group">
        @if(Auth::user()->free())
        <a href="{{ route('settings.upgrade') }}" class="list-group-item">
          Upgrade
        </a>
        @endif
      </div>
</div>
