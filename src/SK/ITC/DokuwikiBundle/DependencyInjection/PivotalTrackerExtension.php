<?php
/**
 * SK ITC Dokuwiki Bundle Dependency Injection Configuration
 *
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 *
 */
namespace SK\ITC\DokuwikiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class PivotalTrackerExtension extends Extension
{

	/**
	 *
	 * {@inheritdoc}
	 *
	 */
	public function load( array $configs, ContainerBuilder $container )
	{
		$configuration = new Configuration();
		$config = $this->processConfiguration( $configuration, $configs );

		$loader = new Loader\XmlFileLoader( $container, new FileLocator( __DIR__ . '/../Resources/config' ) );
		$loader->load( 'parameters.xml' );
		$loader->load( 'services.xml' );
	}
}