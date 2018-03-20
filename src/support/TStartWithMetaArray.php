<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\support;

////////////////////////////////////////////////////////////////

trait TStartWithMetaArray
{

	/**
	 * Static method make_
	 *
	 * @static
	 * @access public
	 *
	 * @param  array $meta_array
	 *
	 * @return self
	 */
	static public function make_( array$meta_array ):self
	{
		return new self( static::getMetaClass_()::make_( $meta_array ) );
	}

	/**
	 * Static method parse_
	 *
	 * @static
	 * @access public
	 *
	 * @param  array $meta_array
	 * @param  array $data
	 *
	 * @return array
	 */
	static public function parse_( array$meta_array, array$data ):array
	{
		return static::{static::PARSE_METHOD}( static::getMetaClass_()::make_( $meta_array ), $data );
	}

	/**
	 * Static method getMetaClass_
	 *
	 * @static
	 *
	 * @access protected
	 *
	 * @return class
	 */
	static protected function getMetaClass_():string
	{
		return static::class.'\Meta';
	}

}
