<?php

return  [

    'billing' => [
      'free' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => true,
        'currency' => '€',
        'price' => '27',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

      'standard' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => false,
        'currency' => '€',
        'price' => '99',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

      'premium' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => true,
        'currency' => '€',
        'price' => '299',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

      'gold' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => false,
        'currency' => '€',
        'price' => '399',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

    ],

];
