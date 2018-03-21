<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Transformer\MetaItem;

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
				->setType( static::TYPE_VALUE )
				->setKeys( $meta )
				->setMeta( _\Unifier\MetaItem::make_( [ 'type'=>'auto', ] ) )
			;
		}
		else
		{
			$instance->setType( (string)($meta['type']??'null') );

			switch( $instance->type )
			{
				case static::TYPE_MAP:
					$instance
						->setType( static::TYPE_MAP )
						->setItems( _\Transformer\Meta::make_( $meta['items']??[] ) )
					;
				break;

				default:
					$instance
						->setType( static::TYPE_VALUE )
						->setKeys( $meta['keys']??null )
						->setMeta( _\Unifier\MetaItem::make_( $meta['meta']??[ 'type'=>'auto', ] ) )
					;
				break;
			}
		}

		return $instance;
	}

}
