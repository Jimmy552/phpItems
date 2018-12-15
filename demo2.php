<?php
/**
 * Created by PhpStorm.
 * User: lenovo1
 * Date: 2018/12/14
 * Time: 9:55
 */
class Gathering{
    private $localvar;
    private $globalvar;
    private $debug_mode;
    function __construct($debug_mode = 'page')
    {
        if (is_string($debug_mode)){
            $this->debug_mode = $debug_mode;
            echo $debug_mode;
        }

        function furtherMove($mode){
//            $self ->show();
            switch ($mode){
                case 'page':
                    echo 'page is initialized';
                    break;
                case 'form':
                    echo 'form is initialized';
                    break;
                case 'label':
                    echo 'label is ready';
                    break;
                case 'template':
                    echo 'template is ready';
                    break;
                default:
                    echo 'no valid debug_mode is prepared.';
            }
        }
        if (!empty($this->debug_mode)){
            furtherMove($this->debug_mode);
            $this->show();
        }
    }
    private function show(){
        echo $this->globalvar;
        echo '---localvar next---';
        echo $this->localvar;
        echo '---finished---';
    }
}

//$myform = new Gathering('template');

//The Gathering Class is meant to say

//下面是一些魔术方法
class Test{
    private $valOne;
    private $valTwo;
    function __construct($a, $b)
    {
        if (isset($a) && isset($b)){
            $this->valOne = $a;
            $this->valTwo = $b;
            return true;
        }else{
            return false;
        }
    }
    /*
     * 声明魔术方法需要两个参数，直接为私有属性赋值时自动调用，并可以屏蔽一些非法赋值
     * @param string $propertyName
     * @param mixed $propertyValue
     */
    function __set($name, $value)
    {
        // TODO: Implement __set() method.
        if (isset($name)){
            if ($name == 'valOne'){
                $this->valOne = strval($value).'suffix';
            }
            if ($name == 'valTwo'){
                $this->valTwo ='prefix'. strval($value);
            }
//            $this->$name = $value;
            return true;
        }else{
            return false;
        }
    }

    //关于magicmethod要注意:
    //Warning: The magic method __get() must have public visibility and cannot be static
    function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

    function __isset($name)
    {
        // TODO: Implement __isset() method.
        if ($name == 'valTwo'){
            return !isset($this->$name);
        }else{
            return isset($this->$name);
        }
    }

    function reply(){
        echo $this->valTwo;
        echo $this->valOne;
    }
}

$myTest = new Test(1,1);
$myTest->valOne =23333;
echo $myTest->valOne;
//当不存在get魔术方法时，会有报错:Cannot access private property Test::$valOne
//当引用了set或者get魔术方法时，会看上去像没有封装过一样
//set有一点好处，它可以屏蔽非法值
var_dump(isset($myTest->valTwo));
$myTest->reply();


