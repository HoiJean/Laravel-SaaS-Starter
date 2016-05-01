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

@if(Auth::user()->client())
<div class="panel panel-default">
    <div class="panel-heading">Billing</div>

      <div class="list-group">
        @if(Auth::user()->free())
        <a href="{{ route('settings.upgrade') }}" class="list-group-item">
          Upgrade
        </a>
        @else
        <a href="{{ route('settings.subscription.change') }}" class="list-group-item">
          Subscription
        </a>
        @endif
      </div>
</div>
@endif
