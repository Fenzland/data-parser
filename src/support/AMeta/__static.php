<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\support\AMeta;

////////////////////////////////////////////////////////////////

trait __static
{

	/**
	 * Static method make_
	 *
	 * @static
	 *
	 * @access public
	 *
	 * @param  array $meta_array
	 *
	 * @return self
	 */
	static public function make_( array$meta_array ):self
	{
		$instance= new static;

		foreach( $meta_array as $key=>$meta_item_array )
		{
			$instance->addItem(
				$key
			,
				static::getItemClass_()::make_( $meta_item_array )
			);
		}

		return $instance;
	}

	/**
	 * Static method getItemClass_
	 *
	 * @static
	 *
	 * @access protected
	 *
	 * @return class
	 */
	static protected function getItemClass_():string
	{
		return static::class.'Item';
	}

	/**
	 * Static method checkItemType
	 *
	 * @static
	 *
	 * @access protected
	 *
	 * @param  mixed $item
	 *
	 * @return viod
	 */
	static protected function checkItemType_( $item ):void
	{
		$item_class= static::getItemClass_();

		if(!( $item instanceof $item_class )){
			throw new \TypeError(
				'Argument 2 passed to '.__METHOD__.' must be an instance of '.$item_class
			);
		}
	}

}
