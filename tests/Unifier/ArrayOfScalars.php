<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Tests\Unifier;

use PHPUnit\Framework\TestCase;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class ArrayOfScalars extends TestCase
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
		$unifier= _\Unifier::make_( [ 'are_ok'=>[ 'type'=>'array', 'item'=>[ 'type'=>'bool', ], ], ] );

		$this->assertSame( [ 'are_ok'=>[], ], $unifier->unify( [] ) );
		$this->assertSame( [ 'are_ok'=>[ false, ], ], $unifier->unify( [ 'are_ok'=>false, ] ) );
		$this->assertSame( [ 'are_ok'=>[ true, false, true, false, ], ], $unifier->unify( [ 'are_ok'=>[ 1, 0, true, false, ], ] ) );
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
		$unifier= _\Unifier::make_( [ 'nums'=>[ 'type'=>'array', 'item'=>[ 'type'=>'int', ], ], ] );

		$this->assertSame( [ 'nums'=>[], ], $unifier->unify( [] ) );
		$this->assertSame( [ 'nums'=>[ 0, ], ], $unifier->unify( [ 'nums'=>0, ] ) );
		$this->assertSame( [ 'nums'=>[ 0, 8, 6, 9, 4, ], ], $unifier->unify( [ 'nums'=>[ 0, 8, '6', 9.5, '4.7', ], ] ) );
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
		$unifier= _\Unifier::make_( [ 'points'=>[ 'type'=>'array', 'item'=>[ 'type'=>'float', ], ], ] );

		$this->assertSame( [ 'points'=>[], ], $unifier->unify( [] ) );
		$this->assertSame( [ 'points'=>[ 2.2, ], ], $unifier->unify( [ 'points'=>2.2, ] ) );
		$this->assertSame( [ 'points'=>[ 2.2, 0.0, 6.4, 1.0, ], ], $unifier->unify( [ 'points'=>[ 2.2, 0, '6.4', '1', ], ] ) );
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
		$unifier= _\Unifier::make_( [ 'names'=>[ 'type'=>'array', 'item'=>[ 'type'=>'string', ], ], ] );

		$this->assertSame( [ 'names'=>[], ], $unifier->unify( [] ) );
		$this->assertSame( [ 'names'=>[ 'name', ], ], $unifier->unify( [ 'names'=>'name', ] ) );
		$this->assertSame( [ 'names'=>[ 'foo', 'bar', '1', '9', '', ], ], $unifier->unify( [ 'names'=>[ 'foo', 'bar', true, 9, false, ], ] ) );
	}

}
