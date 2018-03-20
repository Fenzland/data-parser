<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Tests\Unifier;

use PHPUnit\Framework\TestCase;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class ArraySlicing extends TestCase
{

	/**
	 * Method testBool
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testMain()
	{
		$unifier= _\Unifier::make_( [ 'nums'=>[ 'type'=>'array', 'item'=>[ 'type'=>'int', ], 'slice'=>[ 1, 2, ], ], ] );

		$this->assertSame( [ 'nums'=>[], ], $unifier->unify( [ 'nums'=>[ 0, ], ] ) );
		$this->assertSame( [ 'nums'=>[ 1, 2, ], ], $unifier->unify( [ 'nums'=>[ 0, 1, 2, 3, 4, 5, ], ] ) );

		$unifier= _\Unifier::make_( [ 'nums'=>[ 'type'=>'array', 'item'=>[ 'type'=>'int', ], 'slice'=>[ -2, null, ], ], ] );

		$this->assertSame( [ 'nums'=>[ 0, ], ], $unifier->unify( [ 'nums'=>[ 0, ], ] ) );
		$this->assertSame( [ 'nums'=>[ 4, 5, ], ], $unifier->unify( [ 'nums'=>[ 0, 1, 2, 3, 4, 5, ], ] ) );
	}

}
