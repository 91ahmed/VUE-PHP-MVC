<?php
	
	namespace System\Mail;

	class Swift
	{
		private $config = [
			'host' => MAIL_HOST,
			'port' => MAIL_PORT,
			'encryption' => MAIL_ENCRYPTION,
			'username' => MAIL_USERNAME,
			'password' => MAIL_PASSWORD,
		];

		private $error;

		private $fromName;
		private $fromAddress;
		private $toName;
		private $toAddress;
		private $subject;
		private $message;
		private $contentType = "text/html";

		public function config (array $config = null)
		{
			if (is_array($config)) {
				foreach ($config as $key => $value) {
					$this->config[$key] = $value;
				}
			}
		}

		public function sendSwiftMail ()
		{
			// Create the SMTP Transport
			$transport = (new \Swift_SmtpTransport($this->config['host'], $this->config['port'], $this->config['encryption']))
				->setUsername($this->config['username'])
				->setPassword($this->config['password']);

			// Create the Mailer using your created Transport
			$mailer = new \Swift_Mailer($transport);

			// Create a message
			$message = new \Swift_Message();
			$message->setSubject($this->subject);
			$message->setFrom([$this->fromAddress => $this->fromName]);
			$message->addTo($this->toAddress, $this->toName);
			$message->setContentType($this->contentType);
			$message->setBody($this->message, $this->contentType);
			$message->addPart($this->message, $this->contentType);
			/*
			$message->attach(
			  Swift_Attachment::fromPath('/path/to/image.jpg', 'image/jpeg')->setFilename('cool.jpg')
			);
			*/
		 
			// Send the message
			$send = $mailer->send($message);
		}

		public function setMessage ($message, $contentType = 'text/html')
		{
			$this->message = $message;
			$this->contentType = $contentType;
		}

		public function setSubject ($subject)
		{
			$this->subject = $subject;
		}

		public function setFrom ($fromAddress, $fromName)
		{
			$this->fromAddress = $fromAddress;
			$this->fromName = $fromName;
		}

		public function setTo ($toAddress, $toName)
		{
			$this->toAddress = $toAddress;
			$this->toName = $toName;
		}

		public function setContentType ($contentType)
		{
			$this->contentType = $contentType;
		}

		public function send ()
		{
			try {
				$this->sendSwiftMail();
			} catch (\Exception $e) {
				$this->error = $e->getMessage();
			}
		}

		public function getError ()
		{
			return $this->error;
		}
	}
?>