<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Transformer;

use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

trait __static
{
	use _\support\TStartWithMetaArray;

	/**
	 * Static method transform_
	 *
	 * @static
	 * @access public
	 *
	 * @param  Unifier\Meta $meta
	 * @param  array $data
	 *
	 * @return array
	 */
	static public function transform_( Meta$meta, array$data ):array
	{
		return $meta->map(
			function( $key, $meta_item )use( $data ){
				return static::transformItem_( $meta_item, $data );
			}
		);
	}

	/**
	 * Static method transformItem_
	 *
	 * @static
	 * @access public
	 *
	 * @param  MetaItem $meta
	 * @param  mixed $data
	 *
	 * @return mixed
	 */
	static public function transformItem_( MetaItem$meta_item, $value )
	{
		switch( $meta_item->type )
		{
			case MetaItem::TYPE_VALUE:
				foreach( $meta_item->keys as $key )
				{
					$value= $value[$key]??null;

					if( is_null( $value ) ) break;
				}

				return _\Unifier::unifyItem_( $meta_item->meta, $value );

			case MetaItem::TYPE_MAP:
				return static::transform_( $meta_item->items, (array)$value );
		}
	}

}
