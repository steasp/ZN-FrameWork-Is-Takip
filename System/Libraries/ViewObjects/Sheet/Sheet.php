<?php
class __USE_STATIC_ACCESS__Sheet implements SheetInterface
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
	// Call Method
	//----------------------------------------------------------------------------------------------------
	// 
	// __call()
	//
	//----------------------------------------------------------------------------------------------------
	use CallUndefinedMethodTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Style Sheet Trait
	//----------------------------------------------------------------------------------------------------
	// 
	// traits()
	//
	//----------------------------------------------------------------------------------------------------
	use SheetTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Animation
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function animation($tag = false)
	{
		return uselib('Sheet\Animation', array($tag));
	}
	
	//----------------------------------------------------------------------------------------------------
	// Manipulation
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function manipulation()
	{
		return uselib('Sheet\Manipulation');
	}
	
	//----------------------------------------------------------------------------------------------------
	// Shadow
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function shadow($tag = false)
	{
		return uselib('Sheet\Shadow', array($tag));
	}
	
	//----------------------------------------------------------------------------------------------------
	// Transform
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function transform($tag = false)
	{
		return uselib('Sheet\Transform', array($tag));
	}
	
	//----------------------------------------------------------------------------------------------------
	// Transition
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function transition($tag = false)
	{
		return uselib('Sheet\Transition', array($tag));
	}
}