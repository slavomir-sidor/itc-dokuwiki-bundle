<?php
/**
 * SK ITC Dokuwiki Bundle Command Login
 *
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 */
namespace SK\ITC\DokuwikiBundle\Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Monolog\Logger;
use SK\ITCBundle\Command\TableCommand;
use SK\ITC\DokuwikiBundle\Console\Command\AbstractCommand;

class LoginCommand extends AbstractCommand
{

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Symfony\Component\Console\Command\Command::configure()
	 */
	protected function configure()
	{
		parent::configure();

		$this->addOption( "--user", "u", InputOption::VALUE_REQUIRED, "Dokuwiki user name." );
		$this->addOption( "--password", "p", InputOption::VALUE_REQUIRED, "Dokuwiki user password." );
		$this->addOption( "--passwordFile", "pf", InputOption::VALUE_REQUIRED, "Dokuwiki user password file." );
	}
}