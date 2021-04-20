<?php 
function findFirstStringInBracket($str)
{	
	if(strlen($str) > 0)
	{		
		$firstbracket = strstr($str, '('); 
	}else{
		$firstbracket = '';
	}

	if($firstbracket)
	{					
		$firstbracket = ltrim($firstbracket, '('); 
		if (ltrim($firstbracket, '('))
		{
			return strstr($firstbracket, ')', true);
		}else{
			return '';
		}
		
	}else{
		return '';
	}
	
}
?>