<?php

namespace Drupal\test\Controller;

use Drupal\test\Form\TestSettingsForm;

class TestController {

  public function helloworld() {
    $output = '<p>hello world</p>';    
    if (config('test.settings')->get('test_show_extra_text')) {
    	$output .= '<p>extra text turned on by setting</p>';
    }
    return $output;
  }

}