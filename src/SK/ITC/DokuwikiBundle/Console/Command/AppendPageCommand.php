<?php
/**
 * SK ITC Dokuwiki Bundle Command Append Page
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

class AppendPageCommand extends AbstractCommand
{

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Symfony\Component\Console\Command\Command::configure()
	 */
	protected function configure()
	{
		parent::configure();
		$this->addOption( "--pagename", "pn", InputOption::VALUE_REQUIRED, "Dokuwiki page name." );
		$this->addOption( "--text", "t", InputOption::VALUE_REQUIRED, "Dokuwiki page text." );
		$this->addOption( "--attr", "at", InputOption::VALUE_REQUIRED, "Dokuwiki page attri." );
	}
}