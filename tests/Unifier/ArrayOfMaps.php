<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Tests\Unifier;

use PHPUnit\Framework\TestCase;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class ArrayOfMaps extends TestCase
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
		$unifier= _\Unifier::make_(
			[
				'users'=>[ 'type'=>'array', 'item'=>[
					'type'=>'map', 'items'=>[
						'name'=>'Anonymous',
						'age'=>0,
						'value'=>0.0,
						'touched'=>false,
					],
				], ],
			]
		);

		$this->assertSame( [ 'users'=>[], ], $unifier->unify( [] ) );

		$this->assertSame(
			[ 'users'=>[ [ 'name'=>'Anonymous', 'age'=>0, 'value'=>0.0, 'touched'=>false, ], ], ]
		,
			$unifier->unify( [ 'users'=>'who', ] )
		);

		$this->assertSame(
			[ 'users'=>[
				[ 'name'=>'Anonymous', 'age'=>0, 'value'=>0.0, 'touched'=>false, ],
				[ 'name'=>'Named', 'age'=>8, 'value'=>6.4, 'touched'=>true, ],
			], ]
		,
			$unifier->unify(
				[ 'users'=>[
					'who',
					[ 'name'=>'Named', 'age'=>'8', 'value'=>'6.4', 'touched'=>'1', ],
				], ]
			)
		);
	}

}
