<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\support\AMeta;

use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

trait __object
{

	/**
	 * Method map
	 *
	 * @access public
	 *
	 * @param  callable $callback
	 *
	 * @return array
	 */
	public function map( callable$callback ):array
	{
		return array_map_better( $this->items, $callback );
	}

	/**
	 * Constructor
	 *
	 * @access protected
	 */
	protected function __construct() {}

	/**
	 * Method addItem
	 *
	 * @access protected
	 *
	 * @param  string $key
	 * @param  _\support\AMetaItem $item
	 *
	 * @return self
	 */
	protected function addItem( string$key, _\support\AMetaItem$item ):self
	{
		static::checkItemType_( $item );

		$this->items[$key]= $item;

		return $this;
	}

	/**
	 * Var items
	 *
	 * @access protected
	 *
	 * @var    array
	 */
	protected $items= [];

}
