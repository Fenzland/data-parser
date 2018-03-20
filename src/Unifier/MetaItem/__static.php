<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Unifier\MetaItem;

use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

trait __static
{

	/**
	 * Static method make_
	 *
	 * @static
	 * @access public
	 *
	 * @param  mixed $meta
	 *
	 * @return self
	 */
	static public function make_( $meta ):parent
	{
		$instance= new static;

		if(!( is_array( $meta ) ))
		{
			$instance
				->setType( gettype( $meta ) )
				->setDefault( $meta )
			;
		}
		else
		{
			$instance->setType( (string)($meta['type']??'null') );

			switch( $instance->type )
			{
				case static::TYPE_MAP:
					$instance->setItems( _\Unifier\Meta::make_( $meta['items']??[] ) );
				break;

				case static::TYPE_ARRAY:
					$instance
						->setItem( _\Unifier\MetaItem::make_( $meta['item']??[] ) )
						->setSlice( ...($meta['slice']??[ 0, null, ]) )
					;
				break;

				default:
					$instance
						->setValue( $meta['value']??null )
						->setDefault( $meta['default']??null )
					;
				break;
			}
		}

		return $instance;
	}

}
