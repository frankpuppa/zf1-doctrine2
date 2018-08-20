<?php
namespace ZC\Helper;
/**
 * TestHelper
 */
class TestHelper{
	/**
	 * Simple variable
	 * @var [type]
	 */
	private $value;
	/**
	 * [__constructor description]
	 * @return [type] [description]
	 */
	function __construct()
	{
		$this->value = 255;
	}
	/**
	 * Return Value
	 * @return [type] [description]
	 */
	function getValue()
	{
		return $this->value;
	}
}
