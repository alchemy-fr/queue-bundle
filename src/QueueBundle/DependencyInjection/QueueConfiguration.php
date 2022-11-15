<?php

/*
 * This file is part of queue-bundle.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alchemy\QueueBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class QueueConfiguration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();

        $builder->root('alchemy_queue')
            ->children()
                ->scalarNode('logger')->defaultNull()->end()
                ->arrayNode('queues')
                    ->useAttributeAsKey('name', true)
                    ->prototype('array')
                        ->children()
                            ->scalarNode('registry')->defaultValue(null)->end()
                            ->scalarNode('name')->end()
                            ->scalarNode('host')->end()
                            ->scalarNode('port')->defaultValue(5672)->end()
                            ->scalarNode('ssl')->defaultValue(false)->end()
                            ->scalarNode('vhost')->defaultValue('/')->end()
                            ->scalarNode('user')->defaultValue('guest')->end()
                            ->scalarNode('password')->defaultValue('guest')->end()
                            ->scalarNode('timeout')->defaultValue(0)->end()
                        ->end()
                    ->end()
                ->end();

        return $builder;
    }
}
