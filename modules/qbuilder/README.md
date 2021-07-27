# Query Builder

#### Storage

```php
	// Connect database
 	$connect = new Storage;
 	$connect->open();

 	// Change database configurations (OR) connect to another database
 	$connect = new Storage;
 	$connect->setDriver('');
 	$connect->setHost('');
 	$connect->setDatabase('');
 	$connect->setUsername('');
 	$connect->setPassword('');
 	$connect->setPort('');
 	$connect->setCharset('');
 	$connect->open();

	// Change sqlite file path
	$connect = new Storage;
 	$connect->setSqlitePath('');
 	$connect = open();

 	// Close database connection
 	$connect = new Storage;
 	$connect = close();
```

#### Model

```php
	/* MODEL */
	namespace App\Model;

	use Modules\QBuilder\Model;

	class User extends Model
	{
		public static $table = 'users';
	}

	/* GET DATA */
	$users = User::query()
				 ->select('id')
				 ->orderBy('username', 'asc')
				 ->get();

	$users = User::query()
				 ->all()
				 ->where('id', '=', 2)
				 ->first();

	/* TRUNCATE */
	User::query()->truncate()->save();

	/* INSERT */
	User::query()->insert([
		'id' => 1,
		'username' => 'ahmed',
	])->save();

	/* UPDATE */
	User::query()->update([
		'username' => 'sayed',
		'email' => 'sayed@gmail.com',
	])->where('id', '=', 5)->save();

	/* DELETE */
	User::query()->delete()->where('id', '=', 3)->save();

	/* CUSTOM QUERY */
	$trunc = User::query()->custom('TRUNCATE TABLE users')->get();
	$users = User::query()->custom('SELECT * FROM users')->get();
```
