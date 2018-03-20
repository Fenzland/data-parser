<?php

declare( strict_types= 1 );

namespace Fenzland\DataParser\Unifier\MetaItem;

use FenzHelpers\TGetter;
use Fenzland\DataParser as _;

////////////////////////////////////////////////////////////////

trait __object
{
	use TGetter;

	/**
	 * Method getType
	 *
	 * @access public
	 *
	 * @return string
	 */
	public function getType():string
	{
		return $this->type;
	}

	/**
	 * Method getValue
	 *
	 * @access public
	 *
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Method getDefault
	 *
	 * @access public
	 *
	 * @return mixed
	 */
	public function getDefault()
	{
		return $this->default;
	}

	/**
	 * Method getItems
	 *
	 * @access public
	 *
	 * @return ?_\Unifier\Meta
	 */
	public function getItems():?_\Unifier\Meta
	{
		return $this->items;
	}

	/**
	 * Method getItem
	 *
	 * @access public
	 *
	 * @return ?_\Unifier\MetaItem
	 */
	public function getItem():?_\Unifier\MetaItem
	{
		return $this->item;
	}

	/**
	 * Method getSlice
	 *
	 * @access public
	 *
	 * @return ?array
	 */
	public function getSlice():?array
	{
		return $this->slice;
	}

	/**
	 * Method setType
	 *
	 * @access protected
	 *
	 * @param  string $type
	 *
	 * @return self
	 */
	protected function setType( string$type ):self
	{
		switch( strtolower( $type ) )
		{
			case 'bool':
			case 'boolean':
				$this->type= static::TYPE_BOOL;
				$this->default= false;
			break;

			case 'int':
			case 'integer':
				$this->type= static::TYPE_INT;
				$this->default= 0;
			break;

			case 'float':
			case 'double':
				$this->type= static::TYPE_FLOAT;
				$this->default= 0.0;
			break;

			case 'string':
				$this->type= static::TYPE_STRING;
				$this->default= '';
			break;

			case 'array':
				$this->type= static::TYPE_ARRAY;
				$this->default= [];
			break;

			case 'map':
				$this->type= static::TYPE_MAP;
				$this->default= [];
			break;

			case 'null':
			default:
				$this->type= static::TYPE_NULL;
				$this->value= null;
			break;
		}

		return $this;
	}

	/**
	 * Method setValue
	 *
	 * @access protected
	 *
	 * @param  mixed $value
	 *
	 * @return self
	 */
	protected function setValue( $value ):self
	{
		if( isset( $value ) )
			$this->value= $this->convert( $value );

		return $this;
	}

	/**
	 * Method setDefault
	 *
	 * @access protected
	 *
	 * @param  mixed $value
	 *
	 * @return self
	 */
	protected function setDefault( $value ):self
	{
		if( isset( $value ) )
			$this->default= $this->convert( $value );

		return $this;
	}

	/**
	 * Method setItems
	 *
	 * @access protected
	 *
	 * @param  _\Unifier\Meta $items
	 *
	 * @return self
	 */
	protected function setItems( _\Unifier\Meta$items ):self
	{
		$this->items= $items;

		return $this;
	}

	/**
	 * Method setItems
	 *
	 * @access protected
	 *
	 * @param  _\Unifier\MetaItem $item
	 *
	 * @return self
	 */
	protected function setItem( _\Unifier\MetaItem$item ):self
	{
		$this->item= $item;

		return $this;
	}

	/**
	 * Method setSlice
	 *
	 * @access protected
	 *
	 * @param  int $start
	 * @param  ?int $length
	 *
	 * @return self
	 */
	protected function setSlice( int$start, ?int$length=null ):self
	{
		if(!( $start===0 && is_null( $length ) ))
		{
			$this->slice= [ $start, $length, ];
		}
		else
		{
			$this->slice= null;
		}

		return $this;
	}

	/**
	 * Method convert
	 *
	 * @access protected
	 *
	 * @param  mixed $origin
	 *
	 * @return mixed
	 */
	protected function convert( $origin )
	{
		switch( $this->type )
		{
			case static::TYPE_BOOL:
				return !!$origin;

			case static::TYPE_INT:
				return (int)$origin;

			case static::TYPE_FLOAT:
				return 1.0*$origin;

			case static::TYPE_STRING:
				return "$origin";

			case static::TYPE_MAP:
				return (array)$origin;

			case static::TYPE_ARRAY:
				return array_values( (array)$origin );

			case static::TYPE_NULL:
			default:
				return null;
		}
	}

	/**
	 * Var type
	 *
	 * @access protected
	 *
	 * @var    string
	 */
	protected $type;

	/**
	 * Var value
	 *
	 * @access protected
	 *
	 * @var    mixed
	 */
	protected $value;

	/**
	 * Var default
	 *
	 * @access protected
	 *
	 * @var    mixed
	 */
	protected $default;

	/**
	 * Var items
	 *
	 * @access protected
	 *
	 * @var    ?_\Unifier\Meta
	 */
	protected $items;

	/**
	 * Var items
	 *
	 * @access protected
	 *
	 * @var    ?_\Unifier\MetaItem
	 */
	protected $item;

	/**
	 * Var slice
	 *
	 * @access protected
	 *
	 * @var    ?array
	 */
	protected $slice;

}
