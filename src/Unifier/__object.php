<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Unifier;

////////////////////////////////////////////////////////////////

trait __Object
{

	/**
	 * Method unify
	 *
	 * @access public
	 *
	 * @param  array $data
	 *
	 * @return array
	 */
	public function unify( array$data ):array
	{
		return static::unify_( $this->meta, $data );
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
