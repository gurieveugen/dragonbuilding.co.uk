<?php

class BulkPricing{
	//                          __              __      
	//   _________  ____  _____/ /_____ _____  / /______
	//  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
	// / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
	// \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
	const CURRENCY_SYMBOL = '£';                                                 
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	private $woocommerce;
	private $product;
	private $post;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct($woocommerce, $product, $post)
	{
		$this->woocommerce = $woocommerce;
		$this->product     = $product;
		$this->post        = $post;
	}

	/**
	 * Get BulkPricing table HTML code
	 * @return string --- HTML code
	 */
	public function getHTML()
	{
		if($this->isVariable())
		{
			return $this->getVariableHTML();
		}
		else
		{
			return $this->getSingleHTML();
		}
	}

	public function getVariableHTML()
	{
		$terms = array();
		$names = array();

		$hide_pricing_table = get_post_meta( $this->post->ID, 'additional_options_hide_prices_table', true );
		$pricing_groups = get_post_meta( $this->post->ID, '_pricing_rules', true );

		if($hide_pricing_table == 'on') return '';
        foreach ($pricing_groups as $pricing_rules) 
        {
        	$var_ids = $pricing_rules['variation_rules']['args']['variations'];
        	if(is_array($var_ids) && count($var_ids))
        	{
        		foreach ($var_ids as $var_id) 
        		{
        			$cfs     = get_post_custom($var_id);
        			$attribute_size = '';
        			if(isset($cfs['attribute_size']))
        			{
        				$attribute_size = sprintf(' (%s)', $cfs['attribute_size'][0]);
        				unset($cfs['attribute_size']);
        			}
        			$slug    = end($cfs);
        			$slug    = $slug[0];
        			$term    = get_term_by('slug', $slug, 'pa_manufacturing-material');
        			$names[] = sprintf('<td>%s</td>', $term->description.$attribute_size);
        		}	
        	}
        }
        return $this->getTableHTML($names);
	}

	public function getSingleHTML()
	{
		$name = sprintf('<td>%s</td>', $this->post->post_title);
		return $this->getTableHTML($name);
	}

	public function getTableHTML($names)
	{
		$pricing_groups = get_post_meta( $this->post->ID, '_pricing_rules', true );
		$table = array();
		
        foreach ($pricing_groups as $pricing_rules) 
        {
        	if(is_array($names))
        		$table[0] = $names;
        	else
        		$table[0][] = $names;
        	$rules = $pricing_rules['rules'];
        	foreach ($rules as $rule)
        	{
        		$interval = sprintf('<td>%s-%s</td>', $rule['from'], $rule['to']);
        		$table[$interval][] = sprintf('<td>%s%s</td>', self::CURRENCY_SYMBOL, $rule['amount']);
        	}
        }
        $table = $this->formatTable($table);
        
        return $this->renderTable($table);
	}

	public function formatTable($table)
	{
		if(!is_array($table)) return false;
		$formated  = array();
		foreach ($table as $key => $values) 
		{
			$formated[0][] = $key === 0 ? '<td></td>' : $key;
			foreach ($values as  $index => $value) 
			{
				$formated[$index+1][] = $value;
			}
		}
		return $formated;
	}

	public function renderTable($table)
	{
		if(!is_array($table)) return '';
		ob_start();
		?>
		<table class="table-backet">
			<tbody>
				<?php
				foreach ($table as $row) 
				{
					printf('<tr>%s</tr>', implode('', $row));
				}
				?>
			</tbody>
		</table>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	/**
	 * Chebk varibale product
	 * @return boolean true if yes | false if not
	 */
	public function isVariable()
	{
		return $this->product->has_child();
	}

}
