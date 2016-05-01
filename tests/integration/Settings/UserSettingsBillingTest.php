<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSettingsBillingTest extends TestCase
{

  use DatabaseTransactions;

  /** @test */
  public function only_free_user_should_see_the_upgrade_button_in_settings()
  {
    $user = $this->createUser('free');
    $this->actingAs($user)
      ->visit('/settings')
      ->click('Upgrade')
      ->seePageIs('settings/upgrade');

    $user = $this->createUser('standard');
    $this->actingAs($user)
      ->visit('/settings')
      ->dontSee('Upgrade');

    $user = $this->createUser('premium');
    $this->actingAs($user)
      ->visit('/settings')
      ->dontSee('Upgrade');


    $user = $this->createUser('gold');
    $this->actingAs($user)
      ->visit('/settings')
      ->dontSee('Upgrade');
  }

  /** @test */
  public function only_free_user_should_able_to_navigate_to_settings_upgrade()
  {
    $user = $this->createUser('free');
    $this->actingAs($user)
      ->visit('/settings/upgrade')
      ->seePageIs('settings/upgrade');

    $user = $this->createUser('standard');
    $this->actingAs($user)
      ->visit('/settings/upgrade')
      ->seePageIs('settings/subscription/change');

    $user = $this->createUser('premium');
    $this->actingAs($user)
      ->visit('/settings/upgrade')
      ->seePageIs('settings/subscription/change');


    $user = $this->createUser('gold');
    $this->actingAs($user)
      ->visit('/settings/upgrade')
      ->seePageIs('settings/subscription/change');
  }

  // /** @test */
  // public function already_paying_users_should_be_able_to_see_the_change_subscription_tab()
  // {
  //   // Given
  //   // When
  //   // Then
  // }

  // /** @test */
  // public function already_paying_users_should_be_able_to_navigate_to_the_change_subscription_page()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function change_subscription_page_should_show_users_current_plan()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function user_should_see_a_list_of_features_for_each_subscription_tier()
  // {
  //   // $user = $this->createUser();
  //   // $this->actingAs($user)
  //   //   ->visit('/settings')
  //   //   ->seePageIs('/settings/upgrade');
  // }
  //
  // /** @test */
  // public function change_subscription_should_show_the_same_features_from_upgrade()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function change_subscription_should_not_be_able_to_choose_same_plan()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function developer_should_be_able_to_determine_the_plans_in_a_config_file()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function user_can_update_their_card_information()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function user_is_taken_to_card_information_after_choosing_plan_if_card_is_not_in_the_database()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function credit_card_form_shows_current_plan_and_pricing()
  // {
  //   // Given
  //   // When
  //   // Then
  // }




}
