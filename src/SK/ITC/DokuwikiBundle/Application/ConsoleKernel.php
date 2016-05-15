<?php
/**
 * SK ITC Dokuwiki Bundle Application Console Kernel
 *
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 */
namespace SK\ITC\DokuwikiBundle\Application;

use SK\ITCBundle\Application\ConsoleKernel as ITConsoleKernel;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\AsseticBundle\AsseticBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use SK\ITC\PivotalTrackerBundle\DokuwikiBundle;

class ConsoleKernel extends ITConsoleKernel
{

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \SK\ITCBundle\Application\ConsoleKernel::registerBundles()
	 */
	public function registerBundles()
	{
		$bundles = array(

			new FrameworkBundle(),
			new MonologBundle(),
			new SwiftmailerBundle(),
			new SecurityBundle(),
			new AsseticBundle(),
			new TwigBundle(),
			new DokuwikiBundle()
		);

		if( in_array( $this->getEnvironment(), array(

			'dev',
			'test'
		), true ) )
		{}

		return $bundles;
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Symfony\Component\HttpKernel\Kernel::getRootDir()
	 */
	public function getRootDir()
	{
		return __DIR__ . '/../../../../..';
	}

	/**
	 *
	 * @param LoaderInterface $loader
	 */
	public function registerContainerConfiguration( LoaderInterface $loader )
	{
		$environment = $this->getEnvironment();
		$config = dirname( __DIR__ ) . sprintf( '/Resources/config/%s/config.xml', $environment );

		if( ! file_exists( $config ) )
		{
			$config = dirname( __DIR__ ) . sprintf( '/Resources/config/config.xml' );
		}

		if( file_exists( $config ) )
		{
			$loader->load( $config );
		}
	}
}