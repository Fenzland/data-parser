<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Transformer;

use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

class MetaItem extends _\support\AMetaItem
{
	const TYPE_VALUE= 'value';
	const TYPE_MAP=   'map';

	use MetaItem\__static;
	use MetaItem\__object;
}
