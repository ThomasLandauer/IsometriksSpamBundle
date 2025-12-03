<?php

namespace Isometriks\SpamBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('isometriks_spam');

        $treeBuilder
            ->getRootNode()
            ->children()
                ->arrayNode('timed')
                    ->canBeDisabled()
                    ->children()
                        ->integerNode('min')->defaultValue(7)->end()
                        ->integerNode('max')->defaultValue(3600)->end()
                        ->booleanNode('global')->defaultFalse()->end()
                        ->stringNode('message')->defaultValue('You are doing that too quickly')->end()
                    ->end()
                ->end()

                ->arrayNode('honeypot')
                    ->canBeDisabled()
                    ->children()
                        ->stringNode('field')->defaultValue('email_address')->end()
                        ->booleanNode('use_class')->defaultFalse()->end()
                        ->stringNode('hide_class')->defaultValue('hidden')->end()
                        ->booleanNode('global')->defaultFalse()->end()
                        ->stringNode('message')->defaultValue('Form fields are invalid')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
