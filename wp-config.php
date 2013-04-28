<?php
/**
 * WordPress Configuration
 * 
 * Copyright (c) 2013 Josiah Truasheim
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category Configuration
 * @package  SymfonyPress
 * @author   Josiah <josiah@jjs.id.au>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/SymfonyPress/SymfonyPress
 */

/**
 * Composer Autoloader
 *
 * Automatically loads classes from composer packages
 * 
 * @var Composer\Autoload\ClassLoader
 */
($loader = include __DIR__."/vendor/autoload.php") || die ("Composer packages have not been installed");

/**
 * WordPress Kernel
 *
 * This applications implementation of the SymfonyPress kernel.
 *
 * @var WordPressKernel
 */
$kernel = new WordPressKernel('prod', false);

// Database configuration
if (!include_once __DIR__."/db-config.php") require_once __DIR__.'/db-config-sample.php';

// Authentication Unique Keys and Salts
if (!include_once __DIR__."/key-config.php") {
    // NOTE: Don't rely on this fallback for production. You should generate
    // production keys using the WordPress.org secret-key service:
    // https://api.wordpress.org/secret-key/1.1/salt/
    
    // Salts are defined from the md5 sum of the database configuration. This
    // provides some randomness between installations.
    $salt = md5_file(__DIR__."db-config.php");

    foreach ([
        'AUTH_KEY',
        'SECURE_AUTH_KEY',
        'LOGGED_IN_KEY',
        'NONCE_KEY',
        'AUTH_SALT',
        'SECURE_AUTH_SALT',
        'LOGGED_IN_SALT',
        'NONCE_SALT',
    ] as $constant) {
        if (!defined($constant)) {
            define($constant, md5($salt.$constant));
        }
    }
}

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/**
 * Absolute path to the WordPress directory
 *
 * @var string
 */
define('ABSPATH', __DIR__.'/wp/');

// Continue WordPress execution
require_once ABSPATH.'wp-settings.php';