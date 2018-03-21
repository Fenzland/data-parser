PHP Data Parser
================================

A library for unifying data into specific structure, and transforming data from one structure to another with given meta data.

## Usage

```bash
composer require fenzland/data-parser
```

```php
use Fenzland\DataParser\Unifier;
use Fenzland\DataParser\Transformer;

$unifier= Unifier::make_( $unifying_meta );

$unifier->unify( $data );

$transformer= Transformer::make_( $transforming_meta );

$transformer->transform( $data );
```


## Sturcture of meta data

### Unifying meta

Scalar.

```php
[
	"key"=> [

		// Type of value. Available scalar values are:
		//   'bool', 'boolean',
		//   'int', 'integer',
		//   'float', 'double',
		//   'string',
		//   'auto',
		//   'null',
		'type'=> "string",

		// Default value
		'default'=> "default_value",

		// Hard value
		// 'value'=> "hard_value",
	],
];
```

Simplified form of scalar.

```php
[
	"key"=> true,
	// is simplified form of
	"key"=> [
		'type'=> 'bool',
		'default'=> true,
	],

	"key"=> 5,
	// is simplified form of
	"key"=> [
		'type'=> 'int',
		'default'=> 5,
	],

	"key"=> 1.0,
	// is simplified form of
	"key"=> [
		'type'=> 'float',
		'default'=> 1.0,
	],

	"key"=> "default_value",
	// is simplified form of
	"key"=> [
		'type'=> 'string',
		'default'=> "default_value",
	],

	"key"=> null,
	// is simplified form of
	"key"=> [
		'type'=> 'null',
		'value'=> null,
	],
];
```

Map.

```php
[
	"key"=> [
		'type'=> 'map',
		'items'=> [
			"column_0"=> /* a unifying meta */,
			"column_1"=> /* a unifying meta */,
		],
	],
];
```

Array.

```php
[
	"key"=> [
		'type'=> 'array',
		'item'=> [
			// a unifying meta
			'type'=> ...,
			'default'=> ...,
		],
	],
];
```

Array of maps.

```php
[
	"key"=> [
		'type'=> 'array',
		'item'=> [
			'type'=> 'map',
			'items'=> [
				"column_0"=> /* a unifying meta */,
				"column_1"=> /* a unifying meta */,
			],
		],
	],
];
```

Array slicing.

```php
[
	"key"=> [
		'type'=> 'array',
		'item'=> /* a unifying meta */,
		'slice'=> [ 0, -2 ],  // Will call array_slice( $array, 0, -2 );
	],
];
```

### Transforming meta

Standard.

```php
// meta
[
	"foo"=> [
		'type'=> 'value',
		'keys'=> [ "Foo", "Bar", ],
		'meta'=> [
			// a unifying meta
			'type'=> 'string',
		],
	],
];

// Transform
[
	"Foo"=> [
		"Bar"=> 8,
	],
];
// Into
[
	"foo"=> "8",
];

```

Simplified.

```php
[
	"key"=> "Foo",
	// and
	"key"=> [
		'type'=> 'value',
		'keys'=> "Foo",
		'meta'=> [
			'type'=> 'auto',
		],
	],
	// are simplified form of
	"key"=> [
		'type'=> 'value',
		'keys'=> [ "Foo", ],
		'meta'=> [
			'type'=> 'auto',
		],
	],
];

```

Map.

```php
[
	"key"=> [
		'type'=> 'map',
		'items'=> [
			'column_0'=> /* a transforming meta */,
			'column_1'=> /* a transforming meta */,
		],
	],
];

```

With complex unifying meta.

```php
[
	"key"=> [
		'type'=> 'value',
		'keys'=> [ "foo", "0", "bar", ],
		'meta'=> [
			'type'=> 'map',
			'items'=> [
				"field_0"=> "",
				"field_1"=> 0,
				"field_2"=> [
					'type'=> 'array',
					'item'=> [
						'type'=> 'int',
						'default'=> 0,
					],
				],
			],
		],
	],
];

```
