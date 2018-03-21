<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Transformer;

////////////////////////////////////////////////////////////////

trait __Object
{

	/**
	 * Method transform
	 *
	 * @access public
	 *
	 * @param  array $data
	 *
	 * @return array
	 */
	public function transform( array$data ):array
	{
		return static::transform_( $this->meta, $data );
	}

	/**
	 * Constructor
	 *
	 * @access public
	 *
	 * @param  Meta $meta
	 */
	public function __construct( Meta$meta )
	{
		$this->meta= $meta;
	}

	/**
	 * Var meta
	 *
	 * @access protected
	 *
	 * @var    Meta
	 */
	protected $meta;

}
