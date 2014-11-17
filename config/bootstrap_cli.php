<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Configure;

/**
 * Additional bootstrapping and configuration for CLI environments should
 * be put here.
 */

// Set logs to different files so they don't have permission conflicts.
Configure::write('Log.debug.file', 'cli-debug');
Configure::write('Log.error.file', 'cli-error');

use Symfony\Component\Yaml\Yaml;
$ey_config = '../../shared/config/database.yml';
if (file_exists($ey_config)) {
    $yaml = Yaml::parse($ey_config);
    $config = $yaml[getenv('PHP_ENV')];
    Configure::write('Datasources.default.host', $config['host']);
    Configure::write('Datasources.default.database', $config['database']);
    Configure::write('Datasources.default.username', $config['username']);
    Configure::write('Datasources.default.password', $config['password']);
}