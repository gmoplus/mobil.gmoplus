<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL38HVY4OFS3 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: 
 *  DOMAIN: mobil.gmoplus.com
 *  FILE: {file}
 *  
 *  The software is a commercial product delivered under single, non-exclusive,
 *  non-transferable license for one domain or IP address. Therefore distribution,
 *  sale or transfer of the file in whole or in part without permission of Flynax
 *  respective owners is considered to be illegal and breach of Flynax License End
 *  User Agreement.
 *  
 *  You are not allowed to remove this information from the file without permission
 *  of Flynax respective owners.
 *  
 *  Flynax Classifieds Software 2024 | All copyrights reserved.
 *  
 *  https://www.flynax.com
 ******************************************************************************/

/* define system variables */

// Docker/Coolify Fixes
ini_set('session.save_path', '/tmp');
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

define('RL_DS', DIRECTORY_SEPARATOR);

// Debug manager - Environment variables support
define('RL_DEBUG', getenv('DEBUG') === 'true' ? true : false);
define('RL_DB_DEBUG', getenv('DB_DEBUG') === 'true' ? true : false);
define('RL_MEMORY_DEBUG', false);
define('RL_AJAX_DEBUG', getenv('AJAX_DEBUG') === 'true' ? true : false);

// MySQL credentials - Environment variables with fallbacks
define('RL_DBPORT', getenv('DB_PORT') ?: '3306');
define('RL_DBHOST', getenv('DB_HOST') ?: 'localhost');
define('RL_DBUSER', getenv('DB_USER') ?: 'gmoplus_mobiluser');
define('RL_DBPASS', getenv('DB_PASS') ?: getenv('DB_PASSWORD') ?: '');
define('RL_DBNAME', getenv('DB_NAME') ?: 'gmoplus_mobil');
define('RL_DBPREFIX', getenv('DB_PREFIX') ?: 'fl_');

// System paths - Docker compatible
define('RL_DIR', '');
define('RL_ROOT', '/var/www/html' . RL_DS . RL_DIR);
define('RL_INC', RL_ROOT . 'includes' . RL_DS);
define('RL_CLASSES', RL_INC . 'classes' . RL_DS);
define('RL_CONTROL', RL_INC . 'controllers' . RL_DS);
define('RL_LIBS', RL_ROOT . 'libs' . RL_DS);
define('RL_TMP', RL_ROOT . 'tmp' . RL_DS);
define('RL_UPLOAD', RL_TMP . 'upload' . RL_DS);
define('RL_FILES', RL_ROOT . 'files' . RL_DS);
define('RL_PLUGINS', RL_ROOT . 'plugins' . RL_DS);
define('RL_CACHE', RL_TMP . 'cache_936129538' . RL_DS);

// System URLs - Environment variable support
$siteUrl = getenv('SITE_URL') ?: 'https://mobil.gmoplus.com';
define('RL_URL_HOME', rtrim($siteUrl, '/') . '/');
define('RL_FILES_URL', RL_URL_HOME . 'files/');
define('RL_LIBS_URL', RL_URL_HOME . 'libs/');
define('RL_PLUGINS_URL', RL_URL_HOME . 'plugins/');

// System admin paths
define('ADMIN', 'admin');
define('ADMIN_DIR', ADMIN . RL_DS);
define('RL_ADMIN', RL_ROOT . ADMIN . RL_DS);
define('RL_ADMIN_CONTROL', RL_ADMIN . 'controllers' . RL_DS);

// Memcache server host and port
define('RL_MEMCACHE_HOST', getenv('MEMCACHE_HOST') ?: '127.0.0.1');
define('RL_MEMCACHE_PORT', getenv('MEMCACHE_PORT') ?: 11211);

// Redis server name, password, host and port
define('RL_REDIS_USER', getenv('REDIS_USER') ?: '');
define('RL_REDIS_PASS', getenv('REDIS_PASS') ?: '');
define('RL_REDIS_HOST', getenv('REDIS_HOST') ?: '127.0.0.1');
define('RL_REDIS_PORT', getenv('REDIS_PORT') ?: 6379);

/* YOU ARE NOT PERMITTED TO MODIFY THE CODE BELOW */
define('RL_SETUP', 'JGxpY2Vuc2VfZG9tYWluID0gIm1vYmlsLmdtb3BsdXMuY29tIjskbGljZW5zZV9udW1iZXIgPSAiRkwzOEhWWTRPRlMzIjs=');
/* END CODE */

/* define system variables end */
