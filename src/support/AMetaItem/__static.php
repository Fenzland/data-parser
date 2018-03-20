<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\support\AMetaItem;

////////////////////////////////////////////////////////////////

trait __static
{

	/**
	 * Static method make_
	 *
	 * @abstract
	 * @static
	 * @access public
	 *
	 * @param  mixed $meta
	 *
	 * @return self
	 */
	abstract static public function make_( $meta ):self;

}
