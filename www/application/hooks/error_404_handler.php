<?php
Event::clear('system.404', FALSE);
Event::add('system.404' ,'handle_404_errors');

Event::add('system.post_routing', 'handle_static_pages');

function handle_404_errors()
{
	Router::$controller = 'home';
	Router::$method = 'error_404';
	Router::$controller_path = APPPATH.'controllers/home.php';
}

function handle_static_pages()
{
	if (Router::$controller === NULL)
	{
		if(Router::$segments[0] == 'favicon.ico')
		{
			Router::$controller = 'images';
			Router::$method = Router::$segments[0];
			Router::$controller_path = APPPATH.'controllers/images.php';
		}
		else
		{
			Router::$controller = 'home';
			Router::$method = Router::$segments[0];
			Router::$controller_path = APPPATH.'controllers/home.php';
		}
	}
}
?>