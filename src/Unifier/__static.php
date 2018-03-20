<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Unifier;

use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

trait __static
{
	use _\support\TStartWithMetaArray;

	/**
	 * Static method unify_
	 *
	 * @static
	 * @access public
	 *
	 * @param  Unifier\Meta $meta
	 * @param  array $data
	 *
	 * @return array
	 */
	static public function unify_( Meta$meta, array$data ):array
	{
		return $meta->map(
			function( $key, $meta_item )use( $data ){
				return static::unifyItem_( $meta_item, $data[$key]??null );
			}
		);
	}

	/**
	 * Static method unifyItem_
	 *
	 * @static
	 * @access public
	 *
	 * @param  MetaItem $meta
	 * @param  mixed $data
	 *
	 * @return mixed
	 */
	static public function unifyItem_( MetaItem$meta_item, $value )
	{
		switch( $meta_item->type )
		{
			case MetaItem::TYPE_BOOL:
				return !!($meta_item->value ?? $value ?? $meta_item->default ?? false);

			case MetaItem::TYPE_INT:
				return (int)($meta_item->value ?? $value ?? $meta_item->default ?? 0);

			case MetaItem::TYPE_FLOAT:
				return 1.0*($meta_item->value ?? $value ?? $meta_item->default ?? 0.0);

			case MetaItem::TYPE_STRING:
				return (string)($meta_item->value ?? $value ?? $meta_item->default ?? '');

			case MetaItem::TYPE_MAP:
				return static::unify_( $meta_item->items, (array)$value );

			case MetaItem::TYPE_ARRAY:
				if( is_null( $value ) ) return [];
				if(!( is_array( $value ) )) $value= [ $value, ];

				if( $meta_item->slice ) $value= array_slice( $value, ...$meta_item->slice );

				return array_map(
					function( $item )use( $meta_item ){
						return static::unifyItem_( $meta_item->item, $item );
					}
				,
					$value
				);

			case MetaItem::TYPE_NULL:
			default:
				return null;
		}
	}

}
