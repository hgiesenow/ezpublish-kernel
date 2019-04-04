<?php

/**
 * File containing the RoutingExtension class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\MVC\Symfony\Templating\Twig\Extension;

use eZ\Publish\Core\MVC\Symfony\Routing\Generator\RouteReferenceGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RoutingExtension extends AbstractExtension
{
    /**
     * @var \eZ\Publish\Core\MVC\Symfony\Routing\Generator\RouteReferenceGeneratorInterface
     */
    private $routeReferenceGenerator;

    public function __construct(RouteReferenceGeneratorInterface $routeReferenceGenerator)
    {
        $this->routeReferenceGenerator = $routeReferenceGenerator;
    }

    public function getFunctions()
    {
        return array(
            new TwigFunction(
                'ez_route',
                array($this, 'getRouteReference')
            ),
        );
    }

    public function getName()
    {
        return 'ezpublish.routing';
    }

    /**
     * @param mixed $resource
     * @param array $params
     *
     * @return \eZ\Publish\Core\MVC\Symfony\Routing\RouteReference
     */
    public function getRouteReference($resource = null, $params = array())
    {
        return $this->routeReferenceGenerator->generate($resource, $params);
    }
}
