<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Unifier;

use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class MetaItem extends _\support\AMetaItem
{
	const TYPE_BOOL=   'bool';
	const TYPE_INT=    'int';
	const TYPE_FLOAT=  'float';
	const TYPE_STRING= 'string';
	const TYPE_NULL=   'null';
	const TYPE_MAP=    'map';
	const TYPE_ARRAY=  'array';

	use MetaItem\__static;
}
