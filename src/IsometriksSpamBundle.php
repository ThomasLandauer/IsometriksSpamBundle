<?php

namespace Isometriks\SpamBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class IsometriksSpamBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->arrayNode('timed')
                    ->children()
                        ->integerNode('min')->end()
                        ->integerNode('max')->end()
                        ->booleanNode('global')->end()
                        ->stringNode('message')->end()
                    ->end()
                ->end()
                ->arrayNode('honeypot')
                    ->children()
                        ->stringNode('field')->end()
                        ->booleanNode('use_class')->end()
                        ->stringNode('hide_class')->end()
                        ->booleanNode('global')->end()
                        ->stringNode('message')->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        
    }
}
