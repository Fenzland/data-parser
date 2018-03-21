<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Transformer\MetaItem;

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
	 * Method getKeys
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function getKeys():array
	{
		return $this->keys;
	}

	/**
	 * Method getMeta
	 *
	 * @access public
	 *
	 * @return ?_\Unifier\MetaItem
	 */
	public function getMeta():?_\Unifier\MetaItem
	{
		return $this->meta;
	}

	/**
	 * Method getItems
	 *
	 * @access public
	 *
	 * @return ?_\Transformer\Meta
	 */
	public function getItems():?_\Transformer\Meta
	{
		return $this->items;
	}

	/**
	 * Method setType
	 *
	 * @access protected
	 *
	 * @param  string $type
	 *
	 * @return self
	 */
	protected function setType( string$type ):self
	{
		$this->type= $type;

		return $this;
	}

	/**
	 * Method setKeys
	 *
	 * @access protected
	 *
	 * @param  mixed $keys
	 *
	 * @return self
	 */
	protected function setKeys( $keys ):self
	{
		if(!( is_null( $keys ) ))
			$this->keys= (array)$keys;

		return $this;
	}

	/**
	 * Method setMeta
	 *
	 * @access protected
	 *
	 * @param  _\Unifier\MetaItem $meta
	 *
	 * @return self
	 */
	protected function setMeta( _\Unifier\MetaItem$meta ):self
	{
		$this->meta= $meta;

		return $this;
	}

	/**
	 * Method setItems
	 *
	 * @access protected
	 *
	 * @param  _\Transformer\Meta $items
	 *
	 * @return self
	 */
	protected function setItems( _\Transformer\Meta$items ):self
	{
		$this->items= $items;

		return $this;
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
	 * Var keys
	 *
	 * @access protected
	 *
	 * @var    array
	 */
	protected $keys= [];

	/**
	 * Var meta
	 *
	 * @access protected
	 *
	 * @var    _\Unifier\MetaItem
	 */
	protected $meta;

	/**
	 * Var items
	 *
	 * @access protected
	 *
	 * @var    MetaItem
	 */
	protected $items;

}
