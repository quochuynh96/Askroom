<?php
class room
{
	protected $code;
	protected $title;
	protected $info;
	protected $password;

	/**
	 * __construct function
	 *
	 * @param [string] $code
	 * @param [string] $title
	 * @param [string] $info
	 * @param [string] $password
	 */
	public function __construct($code, $title, $info, $password)
	{
		$this->code = $code;
		$this->title = $title;
		$this->info = $info;
		$this->password = $password;
	}	

	/**
	 * Get the value of code
	 */ 
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Set the value of code
	 *
	 * @return  self
	 */ 
	public function setCode($code)
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get the value of title
	 */ 
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @return  self
	 */ 
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get the value of info
	 */ 
	public function getInfo()
	{
		return $this->info;
	}

	/**
	 * Set the value of info
	 *
	 * @return  self
	 */ 
	public function setInfo($info)
	{
		$this->info = $info;

		return $this;
	}

	/**
	 * Get the value of password
	 */ 
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 *
	 * @return  self
	 */ 
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}
}
?>