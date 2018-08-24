<?php
/**
 * Created by PhpStorm.
 * User: ivzhenko.volodymyr
 * Date: 12.04.2018
 * Time: 11:28
 */

namespace core;

class Controller
{
	public function render($view, $data = [])
	{
		if (is_object($view) || is_array($view)) {
			header('Content-Type: application/json');
			echo json_encode($view);
		} else {
			if (strpos('.', $view)) {
				return 'Error';
			}
			extract($data);
		}
	}
}