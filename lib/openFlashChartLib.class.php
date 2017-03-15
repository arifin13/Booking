<?php

 @subpackage
 @category

 class OpenFlashChartLib
{
    public function __construct()
	{
		include_once 'php-ofc-library/open-flash-chart.php';
	}

     * @param string $classname
     * @param array $arguments
     * @return mixed
	public function create($classname, $arguments = array())
    {
        if (class_exists($classname))
        {
            return call_user_func_array(
                    array(new ReflectionClass($classname), 'newInstance'),
                    $arguments
                   );
        }
        else
        {
            die("Sorry can't create the object, class [$classname] not defined");
        }
    }
}
