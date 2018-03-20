<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Tests\Unifier;

use PHPUnit\Framework\TestCase;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class Convert extends TestCase
{

	/**
	 * Method testIntToBool
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testIntToBool()
	{
		$unifier= _\Unifier::make_( [ 'is_ok'=>[ 'type'=>'bool', ], ] );

		$this->assertEquals( [ 'is_ok'=>false, ], $unifier->unify( [ 'is_ok'=>0, ] ) );
		$this->assertEquals( [ 'is_ok'=>true, ], $unifier->unify( [ 'is_ok'=>6, ] ) );
	}

	/**
	 * Method testFloatToBool
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testFloatToBool()
	{
		$unifier= _\Unifier::make_( [ 'is_ok'=>[ 'type'=>'bool', ], ] );

		$this->assertEquals( [ 'is_ok'=>false, ], $unifier->unify( [ 'is_ok'=>0.0, ] ) );
		$this->assertEquals( [ 'is_ok'=>true, ], $unifier->unify( [ 'is_ok'=>9.8, ] ) );
	}

	/**
	 * Method testStringToBool
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testStringToBool()
	{
		$unifier= _\Unifier::make_( [ 'is_ok'=>[ 'type'=>'bool', ], ] );

		$this->assertEquals( [ 'is_ok'=>false, ], $unifier->unify( [ 'is_ok'=>'', ] ) );
		$this->assertEquals( [ 'is_ok'=>true, ], $unifier->unify( [ 'is_ok'=>'abc', ] ) );
		$this->assertEquals( [ 'is_ok'=>false, ], $unifier->unify( [ 'is_ok'=>'0', ] ) );
		$this->assertEquals( [ 'is_ok'=>true, ], $unifier->unify( [ 'is_ok'=>'1', ] ) );
	}

	/**
	 * Method testBoolToInt
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testBoolToInt()
	{
		$unifier= _\Unifier::make_( [ 'num'=>[ 'type'=>'int', ], ] );

		$this->assertEquals( [ 'num'=>0, ], $unifier->unify( [ 'num'=>false, ] ) );
		$this->assertEquals( [ 'num'=>1, ], $unifier->unify( [ 'num'=>true, ] ) );
	}

	/**
	 * Method testFloatToInt
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testFloatToInt()
	{
		$unifier= _\Unifier::make_( [ 'num'=>[ 'type'=>'int', ], ] );

		$this->assertEquals( [ 'num'=>0, ], $unifier->unify( [ 'num'=>0.0, ] ) );
		$this->assertEquals( [ 'num'=>1, ], $unifier->unify( [ 'num'=>1.0, ] ) );
		$this->assertEquals( [ 'num'=>0, ], $unifier->unify( [ 'num'=>0.2, ] ) );
		$this->assertEquals( [ 'num'=>1, ], $unifier->unify( [ 'num'=>1.8, ] ) );
	}

	/**
	 * Method testStringToInt
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testStringToInt()
	{
		$unifier= _\Unifier::make_( [ 'num'=>[ 'type'=>'int', ], ] );

		$this->assertEquals( [ 'num'=>0, ], $unifier->unify( [ 'num'=>'0', ] ) );
		$this->assertEquals( [ 'num'=>1, ], $unifier->unify( [ 'num'=>'1', ] ) );
		$this->assertEquals( [ 'num'=>0, ], $unifier->unify( [ 'num'=>'0.0', ] ) );
		$this->assertEquals( [ 'num'=>1, ], $unifier->unify( [ 'num'=>'1.0', ] ) );
		$this->assertEquals( [ 'num'=>0, ], $unifier->unify( [ 'num'=>'0.4', ] ) );
		$this->assertEquals( [ 'num'=>1, ], $unifier->unify( [ 'num'=>'1.4', ] ) );
		$this->assertEquals( [ 'num'=>0, ], $unifier->unify( [ 'num'=>'abcd', ] ) );
	}

	/**
	 * Method testBoolToFloat
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testBoolToFloat()
	{
		$unifier= _\Unifier::make_( [ 'point'=>[ 'type'=>'float', ], ] );

		$this->assertEquals( [ 'point'=>0.0, ], $unifier->unify( [ 'point'=>false, ] ) );
		$this->assertEquals( [ 'point'=>1.0, ], $unifier->unify( [ 'point'=>true, ] ) );
	}

	/**
	 * Method testIntToFloat
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testIntToFloat()
	{
		$unifier= _\Unifier::make_( [ 'point'=>[ 'type'=>'float', ], ] );

		$this->assertEquals( [ 'point'=>8.0, ], $unifier->unify( [ 'point'=>8, ] ) );
	}

	/**
	 * Method testStringToFloat
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testStringToFloat()
	{
		$unifier= _\Unifier::make_( [ 'point'=>[ 'type'=>'float', ], ] );

		$this->assertEquals( [ 'point'=>8.9, ], $unifier->unify( [ 'point'=>'8.9', ] ) );
		$this->assertEquals( [ 'point'=>8.0, ], $unifier->unify( [ 'point'=>'8', ] ) );
	}

	/**
	 * Method testBoolToString
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testBoolToString()
	{
		$unifier= _\Unifier::make_( [ 'name'=>[ 'type'=>'string', ], ] );

		$this->assertEquals( [ 'name'=>'', ], $unifier->unify( [ 'name'=>false, ] ) );
		$this->assertEquals( [ 'name'=>'1', ], $unifier->unify( [ 'name'=>true, ] ) );
	}

	/**
	 * Method testIntToString
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testIntToString()
	{
		$unifier= _\Unifier::make_( [ 'name'=>[ 'type'=>'string', ], ] );

		$this->assertEquals( [ 'name'=>'945', ], $unifier->unify( [ 'name'=>945, ] ) );
	}

	/**
	 * Method testFloatToString
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testFloatToString()
	{
		$unifier= _\Unifier::make_( [ 'name'=>[ 'type'=>'string', ], ] );

		$this->assertEquals( [ 'name'=>'8.66', ], $unifier->unify( [ 'name'=>8.66, ] ) );
		$this->assertEquals( [ 'name'=>'8', ], $unifier->unify( [ 'name'=>8.0, ] ) );
	}

}
