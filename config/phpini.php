<?php
	
	/** [ Errors ] **/
	ini_set ('display_errors', 1);
	error_reporting (E_ALL);



	// Time zone
	ini_set ('date.timezone', 'Africa/Cairo');

	// Charset
	ini_set ('default_charset', 'UTF-8');

	// Memory limit
	ini_set('memory_limit', '128M');

	// URL include
	ini_set ('allow_url_include', 0);



	/** [ Sessions ] **/

	// Allow access to the session ID cookie only when the protocol is HTTPS
	// If a website is only accessible via HTTPS, it should enable this setting
	ini_set ('session.cookie_secure', 0);

	// Specifies whether the module will use cookies to store the session id on the client
	// Most applications should use a cookie for the session ID
	ini_set ('session.use_cookies', 1);

	// Only use cookies to store the session id on the client side
	// Enabling this setting prevents attacks involved passing session ids in URLs
	ini_set ('session.use_only_cookies', 1);

	// Enabling session.use_strict_mode is mandatory for secure sessions
	// This prevents the session module to use an uninitialized session ID
	// The session module only accepts valid session IDs generated by the session module
	ini_set ('session.use_strict_mode', 1);

	// Disabling transparent session ID management improves the general session ID security 
	// by eliminating the possibility of a session ID injection and/or leak
	ini_set ('session.use_trans_sid', 0);

	// Refuses access to the session cookie from JavaScript
	// This setting prevents cookies snatched by a JavaScript injection
	ini_set ('session.cookie_httponly', 1);

	// Specifies the lifetime of the cookie in seconds which is sent to the browser
	// The value 0 means "until the browser is closed
	ini_set ('session.cookie_lifetime', 2678400);

	// Defines the name of the handler which is used for storing and retrieving session data 
	// Defaults to files
	ini_set ('session.save_handler', "files");

	

	/** [ Xdebug ] **/
	ini_set('xdebug.collect_vars', 'on');
	ini_set('xdebug.collect_params', '4');
	ini_set('xdebug.dump_globals', 'on');
	ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
	ini_set('xdebug.show_local_vars', 'on');

	// Limits the maximum execution time, The default limit is 30 seconds
	// If set to zero, no time limit is imposed
	set_time_limit(0);	
?>