<?php
/**
 * Created by PhpStorm.
 * User: lenovo1
 * Date: 2018/12/15
 * Time: 22:55
 */
class Basic{
    protected $valOne;
    protected $valTwo;
    public $protected;
    protected $valArray=array();
    function __construct($a=null, $b=null, $newval = null){

        if (!empty($newval)){
            $this->valArray[$newval] = 'newval';
        }
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
     * tryit
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


    function __unset($name)
    {
        if ($name == 'protected'){
            return;
        }
        unset($this->$name);
    }

    function reply(){
        echo $this->valTwo;
        echo $this->valOne;
    }
    //Reply: the most basic method to show the variables.
}


//下面我们将重点关注继承性
class example extends Basic{
    private $debug = true;
    function testify(){
        if ($this->debug ){
            echo 'Debug works well';
        }else{
            echo 'not so well';
        }
    }
    function __construct($change, $a, $b, $newval)
    {   if ($change){
        $this->debug = !$this->debug;
    }
        parent::__construct($a, $b, $newval);
    }
}

$test = new example(true,1,2,'test');
$test->reply();
$test->testify();