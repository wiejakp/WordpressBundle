<?php
/*
 * This file is part of the Ekino Wordpress package.
 *
 * (c) 2013 Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ekino\WordpressBundle\Listener;

use Ekino\WordpressBundle\Manager\UserManager;
use Ekino\WordpressBundle\Wordpress\Wordpress;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher;

/**
 * Class WordpressRequestListener.
 *
 * This is a listener that loads Wordpress application on kernel request
 *
 * @author Vincent Composieux <composieux@ekino.com>
 */
class WordpressRequestListener
{
    /**
     * @var Wordpress
     */
    protected $wordpress;

    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;

    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @var TraceableEventDispatcher
     */
    protected $eventDispatcher;

    /**
     * WordpressRequestListener constructor.
     * @param Wordpress $wordpress
     * @param TokenStorageInterface $tokenStorage
     * @param UserManager $userManager
     * @param TraceableEventDispatcher $eventDispatcher
     */
    public function __construct(
        Wordpress $wordpress,
        TokenStorageInterface $tokenStorage,
        UserManager $userManager,
        TraceableEventDispatcher $eventDispatcher
    )
    {
        $this->wordpress = $wordpress;
        $this->tokenStorage = $tokenStorage;
        $this->userManager = $userManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * On kernel request method.
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        // Loads Wordpress source code in order to allow use of WordPress functions in Symfony.
        if ('ekino_wordpress_catchall' !== $request->attributes->get('_route')) {
            $this->wordpress->loadWordpress();
        }

        $this->checkAuthentication($request);
    }

    /**
     * Checks if a Wordpress user is authenticated and authenticate him into Symfony security context.
     *
     * @param Request $request
     */
    protected function checkAuthentication(Request $request)
    {
        /*
        if (!$request->hasPreviousSession()) {
            return;
        }
        */

        $wp_user = wp_get_current_user();

        if ($wp_user->ID !== 0) {
            $roles = $wp_user->roles;
            $user = $this->userManager->find($wp_user->ID);

            $firewallName = 'secured_area';

            $token = new UsernamePasswordToken($user, null, $firewallName, $roles);

            $this->tokenStorage->setToken($token);

            $event = new InteractiveLoginEvent($request, $token);

            $this->eventDispatcher->dispatch(SecurityEvents::INTERACTIVE_LOGIN, $event);
        }

        $session = $request->getSession();

        if ($session->has('token')) {
            $token = $session->get('token');
            $this->tokenStorage->setToken($token);
        }
    }
}
