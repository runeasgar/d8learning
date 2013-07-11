<?php
/**
 * @file
 * Contains \Drupal\mymodule\EventSubscriber\MaintenanceModeSubscriber.
 */

namespace Drupal\test\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class TestSubscriber implements EventSubscriberInterface {

  /**
   * Does something.
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
   *   The event to process.
   */
  public function onKernelResponse(FilterResponseEvent $event) {
    $request = $event->getRequest();
    $response = $event->getResponse();
    if ($request->attributes->get('_maintenance') == MENU_SITE_OFFLINE) {
			$response->setStatusCode('200');
      $event->setResponse($response);
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = array('onKernelResponse', 31);
    return $events;
  }

}

// }
