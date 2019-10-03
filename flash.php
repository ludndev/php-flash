<?php


class FlashLib
{

	protected $sessionKey = 'flash';
	protected $sleepTime = 1000;
	protected $allowResponseType = [
		'message', // default is on 1st position
		'success',
		'warning',
		'error'
	];


	function __construct()
	{
		return $this;
	}

	public function initSession():void
	{
		@session_start();
		$_SESSION[$this->sessionKey] = [];
	}

	public function checkSession():bool
	{
		return isset($_SESSION[$this->sessionKey]) && count($_SESSION[$this->sessionKey]) > 0 ? TRUE : FALSE ;
	}

	public function responseType($type):string
	{
		if ( in_array($type, $this->allowResponseType) ) {
			return $type;
		} else {
			return $allowResponseType[0];
		}
	}

	public function set(string $type, string $message):void
	{
		$_SESSION[$this->sessionKey][] = [
			'type' => $type,
			'message' => $message,
			'time' => time()
		];
	}

	public function get():array
	{
		return $this->checkSession() ? $_SESSION[$this->sessionKey] : [] ;
	}

	public function display():string
	{
		$display = 'function sleepFlash (time) { return new Promise((resolve) => setTimeout(resolve, time)); }';
		$sleep = 0;

		if ( $this->checkSession() ) {
			foreach ($_SESSION[$this->sessionKey] as $key => $flash) {
				$display .= 'sleepFlash(' . $sleep . ').then(() => { alertify.' . $this->responseType($flash['type']) . '("' . nl2br($flash['message']) . '"); });';
				$sleep = $sleep + $this->sleepTime;
			}
			$this->destroySession();
		}

		return $display;
	}

	public function destroySession():void
	{
		$_SESSION[$this->sessionKey] = [];
	}

}


class Flash extends FlashLib
{

	public function __construct() 
	{
		$flashLib = new FlashLib;
		$flashLib->sessionKey = 'flashes';
		$flashLib->sleepTime = 5000;
		$flashLib->initSession();
		return $sflashLib;
	}

	public static function message(string $message):void
	{
		self::->set('message' , $message);
	}

	public static function success(string $message):void
	{
		$this->set('success' , $message);
	}

	public static function warning(string $message):void
	{
		$this->set('warning' , $message);
	}

	public static function error(string $message):void
	{
		$this->set('error' , $message);
	}

}