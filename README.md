# yii2-installer
 Database Installing functionality module extention for Yii2.

===========
Database Installer for every Site

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist spanjeta/yii2-install "*"
```

or add

```
"spanjeta/yii2-install": "*"
```

to the require section of your `composer.json` file.



Usage
-----

```

Add to modules
```php
       $config ['modules'] ['install'] = [ 
			'class' => 'app\modules\install\Install',
	];
```

Save your SQL file in **_backup** folder with the name of "db_backup.sql".

Add to web.php file 
```php

defined ( 'SQL_FILE_PATH' ) or define ( 'SQL_FILE_PATH', dirname ( __FILE__ ) .'/../_backup/db_backup.sql' );
defined ( 'DB_CONFIG_PATH' ) or define ( 'DB_CONFIG_PATH', dirname ( __FILE__ ) . '/config/' );
defined ( 'DB_CONFIG_FILE_PATH' ) or define ( 'DB_CONFIG_FILE_PATH', DB_CONFIG_PATH  . 'db' . '.php' );
defined ( 'DB_BACKUP_FILE_PATH' ) or define ( 'DB_BACKUP_FILE_PATH', dirname ( __FILE__ ) );
```

Pretty Url's ```/install```

No pretty Url's ```index.php?r=install```



```
