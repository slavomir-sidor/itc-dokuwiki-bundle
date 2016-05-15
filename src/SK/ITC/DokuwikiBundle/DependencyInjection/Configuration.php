<?php
/**
 * SK ITC Dokuwiki Bundle Dependency Injection Configuration
 *
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 *
 */
namespace SK\ITC\DokuwikiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

	/**
	 *
	 * {@inheritdoc}
	 *
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root( 'itc_pivotaltracker' );
		$rootNode->children()
			->scalarNode( 'token' )
			->end()
			->scalarNode( 'url' )
			->end()
			->end();
		return $treeBuilder;
	}
}