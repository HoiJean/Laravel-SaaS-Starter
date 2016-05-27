<div class="pricing-tables pricing-tables-{{ App\Settings::countPlans() }}">

@foreach ( App\Settings::getPlans() as $plan )
  <div class="plan {{ ($plan['most_popular']) ? 'plan-main' : '' }}">
    <h3>{{ $plan['plan_name'] }}</h3>
    <div class="price">
      <span>{{ $plan['currency'] }}</span>{{ $plan['price'] }}
    </div>
    <p>{{ $plan['billing_cycle'] }}</p>
    <a href="#" class="btn">{{ $plan['button_name'] }}</a>
    <ul>
      @foreach( $plan['features'] as $feature )
      <li>{{ $feature }}</li>
      @endforeach
    </ul>
  </div>

@endforeach

</div>
