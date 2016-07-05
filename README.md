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

Add to index.php file 
```php
defined ( 'YII_ENV' ) or define ( 'YII_ENV', 'YOUR_ENVIRONMENT_NAME (dev/prod)' );
defined ( 'SQL_FILE_PATH' ) or define ( 'SQL_FILE_PATH', 'PATH_OF_YOUR_SQL_FILE' );
defined ( 'DB_CONFIG_PATH' ) or define ( 'DB_CONFIG_PATH', dirname ( __FILE__ ) . '/config/' );
defined ( 'DB_CONFIG_FILE_PATH' ) or define ( 'DB_CONFIG_FILE_PATH', DB_CONFIG_PATH . YII_ENV . '-db' . '.php' );
```

Pretty Url's ```/install```

No pretty Url's ```index.php?r=install```



```
