<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Tests\Unifier;

use PHPUnit\Framework\TestCase;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class SimpleDefault extends TestCase
{

	/**
	 * Method testBool
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testBool()
	{
		$unifier= _\Unifier::make_( [ 'is_ok'=>true, ] );

		$this->assertSame( [ 'is_ok'=>true, ], $unifier->unify( [] ) );
		$this->assertSame( [ 'is_ok'=>false, ], $unifier->unify( [ 'is_ok'=>false, ] ) );
	}

	/**
	 * Method testInt
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testInt()
	{
		$unifier= _\Unifier::make_( [ 'num'=>0, ] );

		$this->assertSame( [ 'num'=>0, ], $unifier->unify( [] ) );
		$this->assertSame( [ 'num'=>7, ], $unifier->unify( [ 'num'=>7, ] ) );
	}

	/**
	 * Method testFloat
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testFloat()
	{
		$unifier= _\Unifier::make_( [ 'point'=>3.2, ] );

		$this->assertSame( [ 'point'=>3.2, ], $unifier->unify( [] ) );
		$this->assertSame( [ 'point'=>8.9, ], $unifier->unify( [ 'point'=>8.9, ] ) );
	}

	/**
	 * Method testString
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testString()
	{
		$unifier= _\Unifier::make_( [ 'name'=>'main', ] );

		$this->assertSame( [ 'name'=>'main', ], $unifier->unify( [] ) );
		$this->assertSame( [ 'name'=>'foo', ], $unifier->unify( [ 'name'=>'foo', ] ) );
	}

}
