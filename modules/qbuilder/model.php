<?php
	
	namespace Modules\Qbuilder;

	use Modules\Qbuilder\Storage;
	use Modules\Qbuilder\Builder;

	class Model extends Builder
	{
		public $connect;

		public function __construct ()
		{
			$this->connect = new Storage;
		}

		public function get ()
		{
			$stmt  = $this->connect->open()->prepare($this->query);
			$stmt->execute();

			$data = $stmt->fetchAll();

			return $data;
		}

		public function first ()
		{
			$stmt = $this->connect->open()->prepare($this->query);
			$stmt->execute();

			$data = $stmt->fetchColumn();

			return $data;
		}

		public function save ()
		{
			$stmt = $this->connect->open()->prepare($this->query);

			foreach ($this->data as $column => $value) {
				$stmt->bindValue(':'.$column, $value);
			}

			$stmt->execute();			
		}

		public static function query ()
		{
			return new static();
		}

		public function __destruct ()
		{
			// Close database connection
			$this->connect->close();
			unset($this->connect);
		}
	}
?>