<?php

class Blue2_Tag
{
	function __construct($tag_name = 'div', $attr = [], $children = [])
	{
		$this->tag_name = $tag_name;
		$this->attr = $attr;
		$this->children = $children;
	}

	function __toString()
	{
		return $this->str();
	}

	function str()
	{
		$str = '<';
		$str .= esc_html($this->tag_name);
		foreach ($this->attr as $key => $values) {
			$str .= ' ';
			$str .= esc_html($key);
			if ($values) {
				$str .= '="';
				if (is_array($values)) {
					foreach ($values as $value) {
						$str .= esc_attr($value);
						$str .= ' ';
					}
				} else {
					$str .= esc_attr($values);
				}
				$str .= '"';
			}
		}

		if (!$this->children) {
			$str .= ' />';
			return $str;
		}

		$str .= '>';

		if (is_array($this->children)) {
			foreach ($this->children as $child) {
				$str .= $child;
			}
		} else {
			$str .= $this->children;
		}

		$str .= '</';
		$str .= esc_html($this->tag_name);
		$str .= '>';

		return $str;
	}
}
