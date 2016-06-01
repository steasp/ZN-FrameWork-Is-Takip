<?php
class __USE_STATIC_ACCESS__Collection
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Protected Data
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $data = array();
	
	//----------------------------------------------------------------------------------------------------
	// Call Undefined Method                                                                       
	//----------------------------------------------------------------------------------------------------
	//
	// __call()
	//																						  
	//----------------------------------------------------------------------------------------------------
	use CallUndefinedMethodTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Error Control
	//----------------------------------------------------------------------------------------------------
	// 
	// $error
	// $success
	//
	// error()
	// success()
	//
	//----------------------------------------------------------------------------------------------------
	use ErrorControlTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Data
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	public function data($data = '')
	{
		if( ! is_array($data) ) 
		{
			return Errors::set('Error', 'arrayParameter', '1.(data)');
		}
		
		$this->data = $data;
		
		return $this;
	}	
	
	//----------------------------------------------------------------------------------------------------
	// Pos Change                                                                       
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Herhangi bir dizi indeksini, istenilen başka bir dizi indeksine 		  
	// eklemeye yarar.  															              
	//																						  
	// Parametreler: 3 parametresi vardır.                                              		  					  				  
	// 1. string/numeric var @poss => Yerleştirme işlemi yapılacak elemanın indeksi.		      
	// 2. string/numeric var @change_pos => Yerleştirme işlemi yapılacağı yeni indeks numarası.
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function posChange($poss = '', $changePos = '')
	{
		 $this->data = Arrays::posChange($this->data, $poss, $changePos);
		 
		 return $this;
	}

	
	//----------------------------------------------------------------------------------------------------
	// Pos Reverse
	//----------------------------------------------------------------------------------------------------
	//
	// Genel Kullanım: Dizi elementlarını kendi içlerinde yer değiştirmek için kullanılır. 	  
	//																						  
	// Parametreler: 3 parametresi vardır.                                              		  						  				  
	// 1. string/numeric var @poss => Yerleştirme işlemi yapılacak elemanın indeksi.		      
	// 2. string/numeric var @change_pos => Yerleştirme işlemi yapılacağı yeni indeks numarası.
	//          																				  
	//----------------------------------------------------------------------------------------------------
	public function posReverse($poss = '', $changePos = '')
	{
		 $this->data = Arrays::posReverse($this->data, $poss, $changePos);
		 
		 return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Casing
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $type  : lower, upper, title
	// @param string $keyval: all, key, val	                          								  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function casing($type = 'lower', $keyval = 'all')
	{
		$this->data = Arrays::casing($this->data, $type, $keyval);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Remove Last
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $count							  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function removeLast($count = 1)
	{
		$this->data = Arrays::removeLast($this->data, $count);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Remove First
	//----------------------------------------------------------------------------------------------------
	//		
	// @param numeric $count			  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function removeFirst($count = 1)
	{
		$this->data = Arrays::removeFirst($this->data, $count);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Add First
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $element						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function addFirst($element = '')
	{
		$this->data = Arrays::addFirst($this->data, $element);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Add Last
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $element						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function addLast($element = array())
	{
		$this->data = Arrays::addLast($this->data, $element);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Delete Element
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $object						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function deleteElement($object = '')
	{
		$this->data = Arrays::deleteElement($this->data, $object);
		 
		return $this;
	}
	
	
	//----------------------------------------------------------------------------------------------------
	// Multikey
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $keySplit:|						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function multikey($keySplit = "|")
	{
		$this->data = Arrays::multikey($this->data, $keySplit);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Keyval
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $keyval: val/value, key, vals/values, keys						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function keyval($keyval = "val")
	{
		$this->data = Arrays::keyval($this->data, $keyval);
		 
		return $this;
	}
		
	//----------------------------------------------------------------------------------------------------
	// Get Last
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $count
	// @param bool	  $preserveKey						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function getLast($count = 1, $preserveKey = false)
	{
		$this->data = Arrays::getLast($this->data, $count, $preserveKey);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Get First
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $count
	// @param bool	  $preserveKey						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function getFirst($count = 1, $preserveKey = false)
	{
		$this->data = Arrays::getFirst($this->data, $count, $preserveKey);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Order
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $type :desc, asc...
	// @param string $flags:regular						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function order($type = '', $flags = 'regular')
	{
		$this->data = Arrays::getFirst($this->data, $type, $flags);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Object Data
	//----------------------------------------------------------------------------------------------------
	//
	// @param void					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function objectData()
	{
		$this->data = Arrays::objectData($this->data);
		 
		return $this;		
	}	
	
	//----------------------------------------------------------------------------------------------------
	// Length
	//----------------------------------------------------------------------------------------------------
	//
	// @param void						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function length()
	{
		$this->data = Arrays::length($this->data);
		 
		return $this;	
	}
	
	//----------------------------------------------------------------------------------------------------
	// Apportion
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $portionCount
	// @param bool	  $preserveKeys						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function apportion($portionCount = 1, $preserveKeys = false)
	{
		$this->data = Arrays::apportion($this->data, $portionCount, $preserveKeys);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Combine
	//----------------------------------------------------------------------------------------------------
	//
	// @param array $values					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function combine($values = array())
	{
		$this->data = Arrays::combine($this->data, $values);
		 
		return $this;	
	}
	
	//----------------------------------------------------------------------------------------------------
	// Count Same Values
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $key					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function countSameValues($key = NULL)
	{
		$this->data = Arrays::countSameValues($this->data, $key);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Flip
	//----------------------------------------------------------------------------------------------------
	//
	// @param void					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function flip()
	{
		$this->data = Arrays::flip($this->data);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Transform
	//----------------------------------------------------------------------------------------------------
	//
	// @param void					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function transform()
	{
		$this->data = Arrays::combine($this->data);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Arguments
	//----------------------------------------------------------------------------------------------------
	//
	// @param array $args				  
	//																						  
	//----------------------------------------------------------------------------------------------------
	protected function _arguments($args)
	{
		$newArgs[0] = $this->data;
		
		foreach( $args as $key => $arg )
		{
			$newArgs[($key + 1)] = $arg;
		}
		
		return $newArgs;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Implement Callback
	//----------------------------------------------------------------------------------------------------
	//
	// @param ...args				  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function implementCallback()
	{
		$this->data = Functions::callArray('array_merge_recursive', $this->_arguments(func_get_args()));
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Recursive Merge
	//----------------------------------------------------------------------------------------------------
	//
	// @param ...args				  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function recursiveMerge()
	{
		$this->data = Functions::callArray('array_merge_recursive', $this->_arguments(func_get_args()));
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Merge
	//----------------------------------------------------------------------------------------------------
	//
	// @param ...args			  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function merge()
	{
		$this->data = Functions::callArray('array_merge', $this->_arguments(func_get_args()));
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Intersect
	//----------------------------------------------------------------------------------------------------
	//
	// @param ...args			  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function intersect()
	{
		$this->data = Functions::callArray('array_intersect', $this->_arguments(func_get_args()));
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Reverse
	//----------------------------------------------------------------------------------------------------
	//
	// @param bool	  $preserveKeys						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function reverse($preserveKeys = false)
	{
		$this->data = Arrays::reverse($this->data, $preserveKeys);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Product
	//----------------------------------------------------------------------------------------------------
	//
	// @param void					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function product()
	{
		$this->data = Arrays::product($this->data);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Sum
	//----------------------------------------------------------------------------------------------------
	//
	// @param void					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function sum()
	{
		$this->data = Arrays::sum($this->data);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Random
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $countRequest					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function random($countRequest = 1)
	{
		$this->data = Arrays::random($this->data, $countRequest);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Search
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $element
	// @param bool	$strict						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function search($element = '', $strict = false)
	{
		$this->data = Arrays::search($this->data, $element, $strict);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Value Exists
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $element
	// @param bool	$strict						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function valueExists($element = '', $strict = false)
	{
		$this->data = Arrays::valueExists($this->data, $element, $strict);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Key Exists
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed $key					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function keyExists($key = '')
	{
		$this->data = Arrays::keyExists($this->data, $key);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Section
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $start
	// @param numeric $length
	// @param bool	  $preserveKey						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function section($start = 0, $length = NULL, $preserveKeys = false)
	{
		$this->data = Arrays::section($this->data, $start, $length, $preserveKeys);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Resection
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $start
	// @param numeric $length
	// @param mixed	  $newElement						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function resection($start = 0, $length = NULL, $newElement = NULL)
	{
		$this->data = Arrays::resection($this->data, $start, $length, $newElement);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Delete Recurrent
	//----------------------------------------------------------------------------------------------------
	//
	// @param string $flags					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function deleteRecurrent($flags = 'string')
	{
		$this->data = Arrays::deleteRecurrent($this->data, $flags);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Series
	//----------------------------------------------------------------------------------------------------
	//
	// @param numeric $start
	// @param numeric $end
	// @param numeric $count						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function series($start = 0, $end = 0, $step = 1)
	{
		$this->data = Arrays::series($start, $end, $step);
		 
		return $this;
	}

	//----------------------------------------------------------------------------------------------------
	// Column
	//----------------------------------------------------------------------------------------------------
	//
	// @param mixed   $columnKey
	// @param mixed	  $indexKey						  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function column($columnKey = 0, $indexKey = false)
	{
		$this->data = Arrays::column($this->data, $columnKey, $indexKey);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// excluding
	//----------------------------------------------------------------------------------------------------
	//
	// @param array   $excluding					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function excluding($excluding = array())
	{
		$this->data = Arrays::excluding($this->data, $excluding);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// including
	//----------------------------------------------------------------------------------------------------
	//
	// @param array   $excluding					  
	//																						  
	//----------------------------------------------------------------------------------------------------
	public function including($including = array())
	{
		$this->data = Arrays::including($this->data, $including);
		 
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Get
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function get()
	{
		$data = $this->data;
		
		$this->data = array();
		
		return $data;
	}
}