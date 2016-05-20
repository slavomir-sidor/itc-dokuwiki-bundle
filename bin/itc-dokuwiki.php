<?php

/**
 * SK ITC Dokuwiki Bundle Application
 *
 * @licence ITC
 *
 * @author Slavomir Kuzma <slavomir.kuzma@actionplanner.com>
 */

/**
 * SK ITC Dokuwiki Bundle Application Loader
 *
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

/**
 * SK ITC Dokuwiki Bundle Application Doctrine Annotation
 *
 * @var \Doctrine\Common\Annotations\AnnotationRegistry
 */
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(
	array(
		$loader,
		'loadClass'
	)
);

/**
 * SK ITC Dokuwiki Bundle Application Arg Input
 *
 * @var \Symfony\Component\Console\Input\ArgvInput
 */
$input = new \Symfony\Component\Console\Input\ArgvInput();

/**
 * SK ITC Dokuwiki Bundle Application Environment
 *
 * @var string
 */
$env = $input->getParameterOption(
	array('--env', '-e'),
	getenv('SYMFONY_ENV') ?: 'dev'
);

/**
 * SK ITC Dokuwiki Bundle Application Debugging
 *
 * @var string
 */
$debug = getenv('SYMFONY_DEBUG') !== '0'
	&& !$input->hasParameterOption(array('--no-debug', ''))
	&& $env !== 'prod';

if ($debug)
{
	\Symfony\Component\Debug\Debug::enable();
}

/**
 * SK ITC Dokuwiki Bundle Application Run
 */
(new SK\ITC\DokuwikiBundle\Application\Console(
    new SK\ITC\DokuwikiBUndle\Application\ConsoleKernel( $env, $debug )
))->run ();
