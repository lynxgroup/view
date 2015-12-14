<?php namespace LynxGroup\Component\View;

use LynxGroup\Contracts\View\View as ViewInterface;

class View implements ViewInterface
{
	protected $path;

	protected $data;

	public function __construct($path, array $data = [])
	{
		$this->path = $path;

		$this->data = $data;
	}

	public function render($path, array $data)
	{
		ob_start();

		extract($this->data);

		extract($data);

		include $this->path.$path.'.php';

		return ob_get_clean();
	}
}
