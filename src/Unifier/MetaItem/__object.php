<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Unifier\MetaItem;

use FenzHelpers\TGetter;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

trait __object
{
	use TGetter;

	/**
	 * Method getType
	 *
	 * @access public
	 *
	 * @return string
	 */
	public function getType():string
	{
		return $this->type;
	}

	/**
	 * Method getValue
	 *
	 * @access public
	 *
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Method getDefault
	 *
	 * @access public
	 *
	 * @return mixed
	 */
	public function getDefault()
	{
		return $this->default;
	}

	/**
	 * Method getItems
	 *
	 * @access public
	 *
	 * @return ?_\Unifier\Meta
	 */
	public function getItems():?_\Unifier\Meta
	{
		return $this->items;
	}

	/**
	 * Method getItem
	 *
	 * @access public
	 *
	 * @return ?_\Unifier\MetaItem
	 */
	public function getItem():?_\Unifier\MetaItem
	{
		return $this->item;
	}

	/**
	 * Method getSlice
	 *
	 * @access public
	 *
	 * @return ?array
	 */
	public function getSlice():?array
	{
		return $this->slice;
	}

	/**
	 * Var type
	 *
	 * @access protected
	 *
	 * @var    string
	 */
	protected $type;

	/**
	 * Var value
	 *
	 * @access protected
	 *
	 * @var    mixed
	 */
	protected $value;

	/**
	 * Var default
	 *
	 * @access protected
	 *
	 * @var    mixed
	 */
	protected $default;

	/**
	 * Var items
	 *
	 * @access protected
	 *
	 * @var    ?_\Unifier\Meta
	 */
	protected $items;

	/**
	 * Var items
	 *
	 * @access protected
	 *
	 * @var    ?_\Unifier\MetaItem
	 */
	protected $item;

	/**
	 * Var slice
	 *
	 * @access protected
	 *
	 * @var    ?array
	 */
	protected $slice;

}
