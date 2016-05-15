<?php
/**
 * SK ITC Dokuwiki Bundle Command
 *
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 *
 *         <pre>
 *         XML-RPC Error Codes
 *
 *         Since XML-RPC API Version 7 (API Version 7 is since Release Adora Belle (2012-10-13)) useful hierarchical error codes have been introduced.
 *         The
 *         following error codes can be returned by the XML-RPC Interface:
 *
 *         Italic rows are just categories. Only normal printed rows are returned by the interface.
 *
 *         100 → Page errors
 *         110 → Page access errors
 *         111 → User is not allowed to read the requested page
 *         112 → User is not allowed to edit the page
 *         113 → manager permission is required
 *         114 → superuser permission is required
 *         120 → Page existence errors
 *         121 → The requested page does not exist
 *         130 → Page edit errors
 *         131 → Empty page id
 *         132 → Empty page content
 *         133 → Page is locked
 *         134 → Positive wordblock check
 *         200 → Media errors
 *         210 → Media access errors
 *         211 → User is not allowed to read the requested media
 *         212 → User is not allowed to delete media
 *         215 → User is not allowed to list media
 *         220 → Media existence errors
 *         221 → The requested media does not exist
 *         230 → Media edit errors
 *         231 → Filename not given
 *         232 → File is still referenced
 *         233 → Could not delete file
 *         300 → Search errors
 *         310 → Argument errors
 *         311 → The provided value is not a valid timestamp
 *         320 → Search result errors
 *         321 → No changes in specified timeframe
 *         Additionally there are some server error codes that indicate some kind of server or XML-RPC failure. The codes are the following:
 *
 *         -32600 → Invalid XML-RPC request. Not conforming to specification.
 *         -32601 → Requested method does not exist.
 *         -32602 → Wrong number of parameters or invalid method parameters.
 *         -32603 → Not authorized to call the requested method (No login or invalid login data was given).
 *         -32604 → Forbidden to call the requested method (but a valid login was given).
 *         -32700 → Parse Error. Request not well formed.
 *         -32800 → Recursive calls to system.multicall are forbidden.
 *         -99999 → Unknown server error.
 *         </pre>
 */
namespace SK\ITC\DokuwikiBundle\Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Monolog\Logger;
use SK\ITCBundle\Command\TableCommand;
use SK\ITCBundle\Service\Table\Table;

abstract class AbstractCommand extends TableCommand
{

	/**
	 * SK ITC Dokuwiki Bundle Abstract Command XMLRPC
	 *
	 * @var XMLRPC
	 */
	protected $xmlrpc;

	/**
	 * SK ITC Dokuwiki Bundle Abstract Command
	 *
	 * @param string $name
	 * @param unknown $description
	 * @param Logger $logger
	 * @param Table $table
	 * @param Reflection $reflection
	 * @param XMLRPC $xmlrpc
	 */
	public function __construct( $name, $description, Logger $logger, Table $table, XMLRPC $xmlrpc )
	{
		parent::__construct( $name, $description, $logger, $table );

		$this->setXmlrpc( $xmlrpc );
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Symfony\Component\Console\Command\Command::configure()
	 */
	protected function configure()
	{
		$this->addOption( "--user", "u", InputOption::VALUE_REQUIRED, "Dokuwiki user name." );
		$this->addOption( "--password", "p", InputOption::VALUE_REQUIRED, "Dokuwiki user password." );
		$this->addOption( "--passwordFile", "pf", InputOption::VALUE_REQUIRED, "Dokuwiki user password file." );
	}

	/**
	 * Gets SK ITC Dokuwiki Bundle Command Abstract Command XMLRPC
	 *
	 * @return XMLRPC
	 */
	public function getXmlrpc()
	{
		return $this->xmlrpc;
	}

	/**
	 * Sets SK ITC Dokuwiki Bundle Abstract Command XMLRPC
	 *
	 * @param XMLRPC $xmlrpc
	 */
	public function setXmlrpc( XMLRPC $xmlrpc )
	{
		$this->xmlrpc = $xmlrpc;
		return $this;
	}
}