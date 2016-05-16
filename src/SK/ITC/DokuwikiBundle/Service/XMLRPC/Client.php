<?php
/**
 * SK ITC Dokuwiki Bundle Service XMLRPC Client
 *
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 */
namespace SK\ITC\DokuwikiBundle\Service\XMLRPC;

use Monolog\Logger;
use PhpXmlRpc\PhpXmlRpc;

class Client extends AbstractService
{

	/**
	 * SK ITC Dokuwiki Bundle Service XMLRPC Client
	 *
	 * @var PhpXmlRpc
	 */
	protected $client;

	/**
	 * SK ITC Dokuwiki Bundle Service XMLRPC Client Host
	 *
	 * @var string
	 */
	protected $host;

	/**
	 * Constructs SK ITC Dokuwiki Bundle Service XMLRPC Client
	 *
	 * @param Logger $logger
	 * @param PhpXmlRpc $client
	 * @param string $host
	 */
	public function __construct( Logger $logger, PhpXmlRpc $client, $host )
	{
		parent::__construct( $logger );

		$this->setClient( $client );
		$this->setHost( $host );
	}

	/**
	 * Gets ITC Dokuwiki Bundle Service XMLRPC Client
	 *
	 * @return the PhpXmlRpc
	 */
	protected function getClient()
	{
		return $this->client;
	}

	/**
	 * Sets ITC Dokuwiki Bundle Service XMLRPC Client
	 *
	 * @param PhpXmlRpc $client
	 */
	protected function setClient( PhpXmlRpc $client )
	{
		$this->client = $client;
		return $this;
	}

	/**
	 * Gets ITC Dokuwiki Bundle Service XMLRPC Client Host
	 *
	 * @return string
	 */
	protected function getHost()
	{
		return $this->host;
	}

	/**
	 * Sets ITC Dokuwiki Bundle Service XMLRPC Client Host
	 *
	 * @param string $host
	 */
	protected function setHost( $host )
	{
		$this->host = $host;
		return $this;
	}

	/**
	 * Name dokuwiki.getPagelist
	 *
	 * Parameters (string) namespace, (array) options
	 * Data (array) list of page items
	 * Description Lists all pages within a given namespace. The options are passed directly to search_allpages().
	 * Since 2009-03-06 (1)
	 *
	 * @param string $namspace
	 * @param array $options
	 * @return array
	 */
	public function getPagelist( $namspace, array $options )
	{
		$request = new Request();
	}

	/**
	 * Name dokuwiki.getVersion
	 * Parameters -
	 * Data (string) version number
	 * Description Returns the DokuWiki version of the remote Wiki.
	 *
	 * @return string
	 */
	public function getVersion()
	{}

	/**
	 * dokuwiki.getTime
	 *
	 * Name dokuwiki.getTime
	 * Parameters -
	 * Data (int) timestamp
	 * Description Returns the current time at the remote wiki server as Unix timestamp
	 * Since 2009-03-06 (1)
	 *
	 * @return (int) timestamp
	 */
	public function getTime()
	{}

	/**
	 * Name dokuwiki.getXMLRPCAPIVersion
	 * Parameters -
	 * Data (int) version number
	 * Description Returns the XML RPC interface version of the remote Wiki.
	 * This is DokuWiki implementation specific and independent of the supported
	 * standard API version returned by wiki.getRPCVersionSupported
	 * Since 2009-03-06 (1)
	 *
	 * @return int version number
	 */
	public function getXMLRPCAPIVersion()
	{}

	/**
	 * dokuwiki.login
	 *
	 * Name dokuwiki.login
	 * Parameters (string) user, (string) password
	 * Data (boolean) login successful
	 * Description Uses the provided credentials to execute a login and will set cookies. This can be used to make authenticated requests afterwards.
	 * Your client needs to support cookie handling. Alternatively use HTTP basic auth credentials.
	 * Since 2009-03-06 (1)
	 *
	 * @param string $user
	 * @param string $password
	 * @return boolean
	 */
	public function login( $user, $password )
	{}

	/**
	 * Name dokuwiki.search
	 *
	 * Description Performs a fulltext search
	 * Since 2010-02-28 (3)
	 *
	 * @param string $query
	 *        	a query string as described on search
	 * @return array Data (array) associative array with matching pages similar to what is returned by dokuwiki.getPagelist, snippets are provided for
	 *         the first 15 results
	 */
	public function search( $query )
	{}

	/**
	 * dokuwiki.getTitle
	 *
	 * Name dokuwiki.getTitle
	 *
	 * Description Returns the title of the wiki
	 * Since 2010-04-18 (4)
	 *
	 * @return string the title of the wiki
	 */
	public function getTitle()
	{}

	/**
	 * dokuwiki.appendPage
	 *
	 * Name dokuwiki.appendPage
	 *
	 * Data (boolean)
	 * Description Appends text to a Wiki Page.
	 * Since 2010-11-20 (5)
	 *
	 * @param string $pagename
	 * @param string $text
	 *        	raw Wiki text
	 * @param array $attr
	 *        	Where attrs can contain the following:
	 *        	$attrs['sum'] = (string) change summary
	 *        	$attrs['minor'] = (boolean) minor
	 * @return boolean
	 */
	public function appendPage( $pagename, $text, array $attr )
	{}

	/**
	 * dokuwiki.setLocks
	 *
	 * Name dokuwiki.setLocks
	 * Parameters (array) list of two lists of page ids
	 * array('lock'=>array(...), 'unlock'=>array(...))
	 * Data (array) array with 4 lists of pageids
	 * array('locked'=>array(...), 'lockfail'=>array(...), 'unlocked'=>array(...), 'unlockfail'=>array(...))
	 * Description Allows you to lock or unlock a whole bunch of pages at once. Useful when you are about to do an operation over multiple pages
	 * Since 2009-03-06 (1)
	 *
	 *
	 * @param array $list
	 * @return array('locked'=>array(...), 'lockfail'=>array(...), 'unlocked'=>array(...), 'unlockfail'=>array(...))
	 */
	public function setLocks( array $list )
	{}

	/**
	 * wiki.getRPCVersionSupported
	 *
	 * Name wiki.getRPCVersionSupported
	 * Parameters -
	 * Data (string) version number
	 * Description Returns 2 with the supported RPC API version.
	 *
	 * @return string
	 */
	public function getRPCVersionSupported()
	{}

	/**
	 * wiki.aclCheck
	 *
	 * Name wiki.aclCheck
	 * Parameters (string) pagename
	 * Data (int) Permissions of given wiki page
	 * Description Returns the permission of the given wikipage.
	 *
	 * @param string $pagename
	 * @return int Permissions of given wiki page
	 */
	public function aclCheck( $pagename )
	{}

	/**
	 * wiki.getPage
	 *
	 * Name wiki.getPage
	 * Parameters (string) pagename
	 * Data (string) raw Wiki text
	 * Description Returns the raw Wiki text for a page.
	 *
	 * @param string $pagename
	 * @return string
	 */
	public function getPage( $pagename )
	{}

	/**
	 * wiki.getPageVersion
	 *
	 * Name wiki.getPageVersion
	 * Parameters (string) pagename, (int) Timestamp
	 * Data (string) raw Wiki text
	 * Description Returns the raw Wiki text for a specific revision of a Wiki page.
	 *
	 * @param string $pagename
	 * @param int $timestamp
	 * @return string
	 */
	public function getPageVersion( $pagename, $timestamp )
	{}

	/**
	 * wiki.getPageVersions
	 *
	 * Name wiki.getPageVersions
	 * Parameters (string) pagename, (int) offset
	 * Data (array) each array item holds the following data:
	 *
	 * $data['user'] = username
	 * $data['ip'] = ip address
	 * $data['type'] = type of change
	 * $data['sum'] = summary
	 * $data['modified'] = modification date as IXR_Date Object
	 * $data['version'] = page version as timestamp
	 * Description Returns the available versions of a Wiki page. The number of pages in the result is controlled via the recent configuration
	 * setting. The offset can be used to list earlier versions in the history.
	 *
	 * @param string $pagename
	 * @param int $offset
	 * @return array
	 */
	public function getPageVersions( $pagename, $offset )
	{}

	/**
	 * wiki.getPageInfo
	 *
	 * Name wiki.getPageInfo
	 * Parameters (string) pagename
	 * Data (array) an array containing the following data:
	 *
	 * $data['name'] = [[:pagename]]
	 * $data['lastModified'] = modification date as IXR_Date Object
	 * $data['author'] = author of the Wiki page.
	 * $data['version'] = page version as timestamp
	 * Description Returns information about a Wiki page.
	 *
	 * @param string $pagename
	 * @return array
	 */
	public function getPageInfo( $pagename )
	{}

	/**
	 * wiki.getPageInfoVersion
	 *
	 * Name wiki.getPageInfoVersion
	 * Parameters (string) pagename, (int) timestamp
	 * Data (array) an array containing the following data:
	 *
	 * $data['name'] = [[:pagename]]
	 * $data['lastModified'] = modification date as UTC timestamp
	 * $data['author'] = author of the Wiki page.
	 * $data['version'] = page version as timestamp
	 * Description Returns information about a specific version of a Wiki page.
	 *
	 * @param string $pagename
	 * @param int $timestamp
	 * @return array
	 */
	public function getPageInfoVersion( $pagename, $timestamp )
	{}

	/**
	 * wiki.getPageHTML
	 *
	 * Name wiki.getPageHTML
	 * Parameters (string) pagename
	 * Data (string) rendered HTML
	 * Description Returns the rendered XHTML body of a Wiki page.
	 *
	 * @param string $pagename
	 * @return string
	 */
	public function getPageHTML( $pagename )
	{}

	/**
	 * wiki.getPageHTMLVersion
	 *
	 * Name wiki.getPageHTMLVersion
	 * Parameters (string) pagename, (int) timestamp
	 * Data (string) rendered HTML
	 * Description Returns the rendered HTML of a specific version of a Wiki page.
	 *
	 * @param string $pagename
	 * @param int $timestamp
	 * @return string
	 */
	public function getPageHTMLVersion( $pagename, $timestamp )
	{}

	/**
	 * wiki.putPage
	 *
	 * Name wiki.putPage
	 * Parameters (string) pagename, (string) raw Wiki text, (array) attrs
	 * Where attrs can contain the following:
	 * $attrs['sum'] = (string) change summary
	 * $attrs['minor'] = (boolean) minor
	 * Data (boolean)
	 * Description Saves a Wiki Page.
	 *
	 * @param string $pagename
	 * @param string $text
	 * @param array $attrs
	 * @return boolean
	 */
	public function putPage( $pagename, $text, array $attrs = null )
	{}

	/**
	 * wiki.listLinks
	 *
	 * Name wiki.listLinks
	 * Parameters (string) pagename
	 * Data (array) each array item holds the following data:
	 *
	 * $data['type'] = local/extern
	 * $data['page'] = the wiki page (or the complete URL if extern)
	 * $data['href'] = the complete URL
	 * Description Returns a list of all links contained in a Wiki page.
	 *
	 * @param string $pagename
	 * @return array
	 */
	public function listLinks( $pagename )
	{}

	/**
	 * wiki.getAllPages
	 *
	 * Name wiki.getAllPages
	 * Parameters -
	 * Data (array) One item for each page, each item containing the following data:
	 *
	 * $data['id'] = id of the page
	 * $data['perms'] = integer denoting the permissions on the page
	 * $data['size'] = size in bytes
	 * $data['lastModified'] = dateTime object of last modification date
	 * Description Returns a list of all Wiki pages in the remote Wiki.
	 *
	 * @return array
	 */
	public function getAllPages()
	{}

	/**
	 * wiki.getBackLinks
	 *
	 * Name wiki.getBackLinks
	 * Parameters (string) pagename
	 * Data (array)
	 * Description Returns a list of backlinks of a Wiki page.
	 *
	 * @param string $pagename
	 * @return array
	 */
	public function getBackLinks( $pagename )
	{}

	/**
	 * wiki.getRecentChanges
	 *
	 * Name wiki.getRecentChanges
	 * Parameters (int) timestamp
	 * Data (array) each array item holds the following data:
	 *
	 * $data['name'] = page id
	 * $data['lastModified'] = modification date as UTC timestamp
	 * $data['author'] = author
	 * $data['version'] = page version as timestamp
	 * Description Returns a list of recent changes since given timestamp.
	 * As stated in recent_changes: Only the most recent change for each page is listed, regardless of how many times that page was changed.
	 *
	 * @param int $timestamp
	 * @return array
	 */
	public function getRecentChanges( $timestamp )
	{}

	/**
	 * wiki.getRecentMediaChanges
	 *
	 * Name wiki.getRecentMediaChanges
	 * Parameters (int) timestamp
	 * Data (array) each array item holds the following data:
	 *
	 * $data['name'] = media id
	 * $data['lastModified'] = modification date as UTC timestamp
	 * $data['author'] = author
	 * $data['version'] = page version as timestamp
	 * $data['perms'] = media permissions
	 * $data['size'] = media size in bytes
	 * Description Returns a list of recent changed media since given timestamp.
	 *
	 * @param int $timestamp
	 * @return array
	 */
	public function getRecentMediaChanges( $timestamp )
	{}

	/**
	 * wiki.getAttachments
	 *
	 * Name wiki.getAttachments
	 * Parameters (String) namespace, (array) options
	 * Data (array) each array item holds the following data:
	 *
	 * $data['id'] = media id
	 * $data['file'] = name of the file
	 * $data['size'] = size in bytes
	 * $data['mtime'] = upload date as a timestamp
	 * $data['lastModified'] = modification date as XML-RPC Date object
	 * $data['isimg'] = true if file is an image, false otherwise
	 * $data['writable'] = true if file is writable, false otherwise
	 * $data['perms'] = permissions of file
	 * Description Returns a list of media files in a given namespace. The options are passed directly to search_media()
	 *
	 * @param string $namespace
	 * @param array $options
	 * @return array
	 */
	public function getAttachments( $namespace, array $options = null )
	{}

	/**
	 * wiki.getAttachment
	 *
	 * Name wiki.getAttachment
	 * Parameters (String) id
	 * Data (string) the data of the file, encoded in base64
	 * Description Returns the binary data of a media file
	 *
	 * @param string $id
	 * @return string
	 */
	public function getAttachment( $id )
	{}

	/**
	 * wiki.getAttachmentInfo
	 *
	 * Name wiki.getAttachmentInfo
	 * Parameters (String) id
	 * Data (array) an array containing the following information about the file:
	 *
	 * $data['size'] = size in bytes
	 * $data['lastModified'] = modification date as XML-RPC Date object
	 * Description Returns information about a media file
	 *
	 * @param string $id
	 * @return array
	 */
	public function getAttachmentInfo( $id )
	{}

	/**
	 * wiki.putAttachment
	 *
	 * Name wiki.putAttachment
	 * Parameters (String) id, (base64) data, (array) params
	 * Data
	 * Description Uploads a file as a given media id. Available parameters are:
	 *
	 * $params['ow'] = true if file is to overwrite an already existing media object of the given id
	 *
	 * @param string $id
	 * @param string $data
	 * @param array $params
	 * @return void
	 */
	public function putAttachment( $id, $data, array $params = null )
	{}

	/**
	 * wiki.deleteAttachment
	 *
	 * Name wiki.deleteAttachment
	 * Parameters (String) id
	 * Data
	 * Description Deletes a file. Fails if the file is still referenced from any page in the wiki.
	 *
	 * @param string $id
	 * @return void
	 */
	public function deleteAttachment( $id )
	{}

	/**
	 * plugin.acl.addAcl
	 *
	 * Name plugin.acl.addAcl
	 * Parameters (String) scope, (String) username, (int) permission
	 * Data (boolean) return true if the rule was correctly added
	 * Description Add an ACL rule. Use @groupname instead of user to add an ACL rule for a group
	 *
	 * @param string $scope
	 * @param string $username
	 * @param int $permission
	 * @return boolean
	 */
	public function addAcl( $scope, $username, $permission )
	{}

	/**
	 * plugin.acl.delAcl
	 *
	 * Name plugin.acl.delAcl
	 * Parameters (String) scope, (String) username
	 * Data (boolean) return true if the rules were correctly deleted
	 * Description Delete any ACL rule matching the given scope and user. Use @groupname instead of user to delete the ACL rules for the group
	 *
	 * @param string $scope
	 * @param string $username
	 * @return boolean
	 */
	public function delAcl( $scope, $username )
	{}
}