<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| TAGS HELPERS
|--------------------------------------------------------------------------
*/
if ( ! function_exists('script'))
{
	function script($src = '', $type = null, $attr = array())
	{
		$attr['src'] = ( ! preg_match('!^\w+://! i', $src))
			? base_url($src)
			: $src;
		
		$content = '';
		foreach($attr as $k => $v) $content .= ' '.$k.'="'.$v.'"';
		
		return "<script ".$content."></script>\n";
	}
}

if ( ! function_exists('img'))
{
	function img($src = '', $index_page = FALSE, $attributes = '')
	{
		if ( ! is_array($src) )
			$src = array('src' => $src);

		// If there is no alt attribute defined, set it to an empty string
		$src['alt'] = isset($src['alt'])
			? htmlspecialchars($src['alt'])
			: '';
		
		$src['loading'] = 'lazy';

		$img = '<img';

		foreach ($src as $k => $v)
		{
			if ($k === 'src' && ! preg_match('#^(data:[a-z,;])|(([a-z]+:)?(?<!data:)//)#i', $v))
			{
				if ($index_page === TRUE)
				{
					$img .= ' src="'.get_instance()->config->site_url($v).'"';
				}
				else
				{
					$img .= ' src="'.get_instance()->config->base_url($v).'"';
				}
			}
			else
			{
				$img .= ' '.$k.'="'.$v.'"';
			}
		}

		return $img._stringify_attributes($attributes).' />';
	}
}

if ( ! function_exists('anchor'))
{
	function anchor($uri = '', $title = '', $attributes = '')
	{
		$title = (string) $title;
		
		if($uri == 'js' || $uri == 'javascript:void(0)')
		{
			$site_url = 'javascript:void(0)';
			
		} else {
			
			$site_url = is_array($uri)
				? site_url($uri)
				: (preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri));
		}
		
		if ($title === '')
		{
			$title = $site_url;
		}
		
		if ($attributes !== '')
		{
			$attributes = _stringify_attributes($attributes);
		}
		
		return '<a href="'.$site_url.'" '.$attributes.' >'.$title.'</a>';
	}
}

if ( ! function_exists('itemprop'))
{
	function itemprop($name, $content = null)
	{
		$html = '<meta ';
		$params = [
			'itemprop' => $name,
		];

		if(!is_array($content))
		{
			$params['content'] = $content;
		} else {
			$params = array_merge($params, $content);
		}

		foreach ($params as $k => $v)
		{
			$html .= $k . '="' . htmlspecialchars($v) . '" ';
		}

		return $html . '/>'."\r\n";
	}
}


/*
|--------------------------------------------------------------------------
| HTML HELPERS
|--------------------------------------------------------------------------
*/

if ( ! function_exists('fa'))
{
	function fa($class, $attr = array())
	{
		$icon = '<i class="fa fa-' . $class . '" ';
		foreach($attr as $k => $v)
		{
			$icon .= $k . '="'. $v .'" ';
		}
		$icon .= '></i>';
		return $icon;
	}
}

if ( ! function_exists('fa5'))
{
	function fa5($attr, $type = 'r')
	{
		$class = '';
		$attrs = '';
		if(is_array($attr))
		{
			if(array_key_exists('class', $attr))
			{
				$class = $attr['class'];
				unset($attr['class']);
			}
			
			foreach($attr as $k => $v) $attrs .= $k . '="'. $v .'" ';
		} else {
			$class = $attr;
		}
		return '<i class="fa5 fa'.$type.' fa-' . $class . '" '.$attrs.'></i>';
	}
}

if ( ! function_exists('fa5r'))
{
	function fa5r($attr) {return fa5($attr, 'r');}
}

if ( ! function_exists('fa5s'))
{
	function fa5s($attr) {return fa5($attr, 's');}
}

if ( ! function_exists('fa5l'))
{
	function fa5l($attr) {return fa5($attr, 'l');}
}

if ( ! function_exists('fa5d'))
{
	function fa5d($attr) {return fa5($attr, 'd');}
}

if ( ! function_exists('fa5b'))
{
	function fa5b($attr) {return fa5($attr, 'b');}
}

if ( ! function_exists('icon'))
{
	function icon($class, $attr = array())
	{
		$attr_html = '';
		foreach($attr as $k => $v) $attr_html .= $k . '="'. $v .'" ';
		
		$icon = '<i class="icon icon-' . $class . '" ' . $attr_html . '></i>';
		return $icon;
	}
}

if ( ! function_exists('action_result'))
{
	function action_result($status = false, $text = "", $close = false)
	{
		$status = $status ? 'note-'.$status : "";
		$close = $close ? '<div class="note-close"></div>' : "";
		$return = '<div class="note '.$status.'">'.$close.$text.'</div>';
		return $return;
	}
}


/*
|--------------------------------------------------------------------------
| FORMAT HELPERS
|--------------------------------------------------------------------------
*/

if ( ! function_exists('price'))
{
	function price($price)
	{
		$price = floatval($price);
		return number_format($price, 2, '.', ' ');
	}
}

if ( ! function_exists('mask'))
{
	function mask($str, $pattern)
	{
		$return = '';
		$j = 0;
		for($i = 0; $i < strlen($pattern); $i++)
		{
			if($pattern[$i] == '?' and isset($str[$j]))
			{
				$return .= $str[$j];
				$j++;
			} else {
				$return .= $pattern[$i];
			}
		}
		return $return;
	}
}


/*
|--------------------------------------------------------------------------
| DATE HELPERS
|--------------------------------------------------------------------------
*/

if ( ! function_exists('month'))
{
	function month($id = false)
	{
		$return = array(
			'01' => '????????????',
			'02' => '??????????????',
			'03' => '??????????',
			'04' => '????????????',
			'05' => '??????',
			'06' => '????????',
			'07' => '????????',
			'08' => '??????????????',
			'09' => '????????????????',
			'10' => '??????????????',
			'11' => '????????????',
			'12' => '??????????????',
		);
		
		if($id !== false)
		{
			if(array_key_exists($id, $return)) return $return[$id];
			else return '???????????? ????????????';
		} else {
			return $return;
		}
	}
}

if ( ! function_exists('weekday'))
{
	function weekday($id = false)
	{
		$return = array(
			1 => '??????????????????????', 2 => '??????????????', 3 => '??????????', 4 => '??????????????', 5 => '??????????????', 6 => '??????????????', 0 => '??????????????????????',
		);
		
		if($id !== false)
		{
			if(array_key_exists($id, $return)) return $return[$id];
			else return '???????????? ????????????';
		} else {
			return $return;
		}
	}
}

if ( ! function_exists('translate_date'))
{
	function translate_date($date)
	{
		$d = date('d', strtotime($date));
		$m = date('m', strtotime($date));
		$y = date('Y', strtotime($date));
		
		return $d.' '.month($m).' '.$y;
	}
}

if ( ! function_exists('translate_day'))
{
	function translate_day($date)
	{
		$d = date('d', strtotime($date));
		$m = date('m', strtotime($date));
		$w = date('w', strtotime($date));
		$y = date('Y', strtotime($date));
		
		return $d.' '.month($m).' '.$y.', '.weekday($w);
	}
}


/*
|--------------------------------------------------------------------------
| PHP HELPERS
|--------------------------------------------------------------------------
*/

if ( ! function_exists('translit'))
{
    function translit($str)
    {

        $translit = array(
            '??' => 'a',		'??' => 'b',		'??' => 'v',
            '??' => 'g',		'??' => 'd',		'??' => 'e',
            '??' => 'yo',	'??' => 'zh',	'??' => 'z',
            '??' => 'i',		'??' => 'j',		'??' => 'k',
            '??' => 'l',		'??' => 'm',		'??' => 'n',
            '??' => 'o',		'??' => 'p',		'??' => 'r',
            '??' => 's',		'??' => 't',		'??' => 'u',
            '??' => 'f',		'??' => 'x',		'??' => 'c',
            '??' => 'ch',	'??' => 'sh',	'??' => 'shh',
            '??' => '',		'??' => 'y',		'??' => '',
            '??' => 'e',		'??' => 'yu',	'??' => 'ya',

            '??' => 'A',		'??' => 'B',		'??' => 'V',
            '??' => 'G',		'??' => 'D',		'??' => 'E',
            '??' => 'YO',	'??' => 'Zh',	'??' => 'Z',
            '??' => 'I',		'??' => 'J',		'??' => 'K',
            '??' => 'L',		'??' => 'M',		'??' => 'N',
            '??' => 'O',		'??' => 'P',		'??' => 'R',
            '??' => 'S',		'??' => 'T',		'??' => 'U',
            '??' => 'F',		'??' => 'X',		'??' => 'C',
            '??' => 'CH',	'??' => 'SH',	'??' => 'SHH',
            '??' => '',		'??' => 'Y',		'??' => '',
            '??' => 'E',		'??' => 'YU',	'??' => 'YA',

            ' ' => '-'
        );

        $return = strtr($str, $translit);

        $return = preg_replace ('/[^a-zA-Z??-????-??0-9-]/ui', '', $return);
        $return = trim($return, '-');

        return strtolower($return);
    }
}

if ( ! function_exists('nav_link'))
{
    function nav_link($item, $params = [], $toggle = true)
    {
		if(empty($params['class']))
			$params['class'] = null;
		
		if(!empty($item['current']) && $item['current'])
			$params['class'] .= ' current';

		if(!empty($item['target']) && $item['target'] != '_self')
			$params['target'] = $item['target'];
		
		if($item['noindex'] == 1)
			$params['rel'] = 'nofollow';
		
		if(!empty($item['items']) && $toggle !== false)
		{
			if($toggle === true)
			{
				$item['title'] .= '<span class="toggle">'.fa5s('angle-down').'</span>';
			} else {
				$item['title'] .= $toggle;
			}
		}
		
		$return = anchor($item['link'], $item['title'], $params);
		
		if($item['noindex'] == 1)
			$return = '<noindex>'.$return.'</noindex>';
		
		return $return;
    }
}
