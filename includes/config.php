<?php
error_reporting(0);

$CONF = $TMPL = array();

// The MySQL credentials
$CONF['host'] = 'localhost';
$CONF['user'] = 'YOURDBUSER';
$CONF['pass'] = 'YOURDBPASS';
$CONF['name'] = 'YOURDBNAME';

// The Installation URL
$CONF['url'] = 'http://yourdomain.com';

// The Notifications e-mail
$CONF['email'] = 'notifications@yourdomain.com';

// The themes directory
$CONF['theme_path'] = 'themes';

$action = array('admin'			=> 'admin',
				'explore'		=> 'explore',
				'stream'		=> 'stream',
				'settings'		=> 'settings',
				'messages'		=> 'messages',
				'track'			=> 'track',
				'playlist'		=> 'playlist',
				'upload'		=> 'upload',
				'recover'		=> 'recover',
				'profile'		=> 'profile',
				'stats'			=> 'stats',
				'pro'			=> 'pro',
				'notifications'	=> 'notifications',
				'search'		=> 'search',
				'page'			=> 'page',
				'welcome'		=> 'welcome'
				);
?>