<?php

/**
 * Question class 
 */
class question
{
	protected $code;
	protected $author;
	protected $content;
	protected $available;
	protected $roomcode;

	/**
	 * Undocumented function
	 *
	 * @param [string] $code
	 * @param [string] $author
	 * @param [string] $content
	 * @param [int] $available
	 * @param [string] $roomcode
	 */
	public function __construct($code, $author, $content, $available, $roomcode)
	{
		$this->code = $code;
		$this->author = $author;
		$this->content = $content;
		$this->available = $available;
		$this->roomcode = $roomcode;
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
	 * Get the value of author
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * Set the value of author
	 *
	 * @return  self
	 */
	public function setAuthor($author)
	{
		$this->author = $author;

		return $this;
	}

	/**
	 * Get the value of content
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Set the value of content
	 *
	 * @return  self
	 */
	public function setContent($content)
	{
		$this->content = $content;

		return $this;
	}

	/**
	 * Get the value of available
	 */
	public function getAvailable()
	{
		return $this->available;
	}

	/**
	 * Set the value of available
	 *
	 * @return  self
	 */
	public function setAvailable($available)
	{
		$this->available = $available;

		return $this;
	}

	/**
	 * Get the value of roomcode
	 */
	public function getRoomcode()
	{
		return $this->roomcode;
	}

	/**
	 * Set the value of roomcode
	 *
	 * @return  self
	 */
	public function setRoomcode($roomcode)
	{
		$this->roomcode = $roomcode;

		return $this;
	}
}
?>