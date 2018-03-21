<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Tests\Transformer;

use PHPUnit\Framework\TestCase;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class Main extends TestCase
{

	/**
	 * Method testBase
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testSimple()
	{
		$transformer= _\Transformer::make_( [ 'foo'=>'foo', 'bar'=>'barbar', 'baz'=>'foo', ] );

		$this->assertSame( [ 'foo'=>1, 'bar'=>null, 'baz'=>1, ], $transformer->transform( [ 'foo'=>1, 'bar'=>'chch', 'baz'=>'8888', ] ) );
	}

	/**
	 * Method testBase
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testBase()
	{
		$transformer= _\Transformer::make_(
			[
				'foo'=>[ 'type'=>'value', 'keys'=>'foo', 'meta'=>[ 'type'=>'string', ], ],
				'bar'=>[ 'type'=>'value', 'keys'=>'barbar', 'meta'=>[ 'type'=>'string', 'default'=>'---', ], ],
				'baz'=>[ 'type'=>'value', 'keys'=>'foo', 'meta'=>0, ],
			]
		);

		$this->assertSame( [ 'foo'=>'1', 'bar'=>'---', 'baz'=>1, ], $transformer->transform( [ 'foo'=>1, 'bar'=>'chch', 'baz'=>'8888', ] ) );
	}

	/**
	 * Method testMap
	 *
	 * @access public
	 *
	 * @return viod
	 */
	public function testMap()
	{
		$transformer= _\Transformer::make_(
			[
				'map'=>[ 'type'=>'map', 'items'=>[
					'foo'=>[ 'type'=>'value', 'keys'=>'foo', 'meta'=>[ 'type'=>'string', ], ],
					'bar'=>[ 'type'=>'value', 'keys'=>[ 'bar', ],
						'meta'=>[ 'type'=>'array', 'item'=>[
							'type'=>'map', 'items'=>[ 'name'=>'', 'age'=>0, ],
						], ],
					],
					'baz'=>[ 'type'=>'map', 'items'=>[
						'u'=>[ 'type'=>'value', 'keys'=>[ 'bar', '0', 'name', ], ],
						'v'=>'foo',
					], ],
				], ],
			]
		);

		$this->assertSame(
			[
				'map'=>[
					'foo'=>'1',
					'bar'=>[
						[ 'name'=>'Jack', 'age'=>85, ],
						[ 'name'=>'John', 'age'=>42, ],
					],
					'baz'=>[
						'u'=>'Jack',
						'v'=>1,
					],
				],
			],
			$transformer->transform(
				[
					'foo'=>1,
					'bar'=>[
						[ 'name'=>'Jack', 'age'=>85, ],
						[ 'name'=>'John', 'age'=>'42', ],
					],
					'baz'=>'8888',
				]
			)
		);
	}

}
