# Http Module

#### Response Class

```php
	$data = [
		array(
			'username' => 'ahmed', 
			'email' => 'ahmedh12491@gmail.com'
		),
		array(
			'username' => 'muhamed', 
			'email' => 'momo833@gmail.com'
		),
	]; 
	
	$res = new Response();
	$res->type('json')
		->status(200)
		->header('Content-Type', 'application/json')
		->send($data);
```
