<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Tests\Unifier;

use PHPUnit\Framework\TestCase;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class HardValue extends TestCase
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
		$unifier= _\Unifier::make_( [ 'is_ok'=>[ 'type'=>'bool', 'value'=>true, ], ] );

		$this->assertSame( [ 'is_ok'=>true, ], $unifier->unify( [] ) );
		$this->assertSame( [ 'is_ok'=>true, ], $unifier->unify( [ 'is_ok'=>false, ] ) );
		$this->assertSame( [ 'is_ok'=>true, ], $unifier->unify( [ 'is_ok'=>true, ] ) );
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
		$unifier= _\Unifier::make_( [ 'num'=>[ 'type'=>'int', 'value'=>6, ], ] );

		$this->assertSame( [ 'num'=>6, ], $unifier->unify( [] ) );
		$this->assertSame( [ 'num'=>6, ], $unifier->unify( [ 'num'=>0, ] ) );
		$this->assertSame( [ 'num'=>6, ], $unifier->unify( [ 'num'=>7, ] ) );
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
		$unifier= _\Unifier::make_( [ 'point'=>[ 'type'=>'float', 'value'=>4.4, ], ] );

		$this->assertSame( [ 'point'=>4.4, ], $unifier->unify( [] ) );
		$this->assertSame( [ 'point'=>4.4, ], $unifier->unify( [ 'point'=>8.6, ] ) );
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
		$unifier= _\Unifier::make_( [ 'name'=>[ 'type'=>'string', 'value'=>'hard', ], ] );

		$this->assertSame( [ 'name'=>'hard', ], $unifier->unify( [] ) );
		$this->assertSame( [ 'name'=>'hard', ], $unifier->unify( [ 'name'=>'', ] ) );
		$this->assertSame( [ 'name'=>'hard', ], $unifier->unify( [ 'name'=>'soft', ] ) );
	}

}
