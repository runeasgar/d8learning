<?php

namespace Drupal\test\Controller;

use Drupal\test\Form\TestSettingsForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class TestController {

  public function helloworld($name = '') {
    $output = '<p>hello';
    if (!empty($name)) {
     	$output .= " {$name}!</p>"; 
    } else { 
       $output .= " person I don't know!</p>"; 
    }
    if (config('test.settings')->get('test_show_extra_text')) {
    	$output .= '<p>extra text turned on by setting</p>';
    }
    return $output;
  }  
  
  public function onKernelResponse(GetResponseEvent $event) {
    die('kernel response event listener finally worked');
  }

}