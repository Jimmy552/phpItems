<?php
/**
 * Created by PhpStorm.
 * User: lenovo1
 * Date: 2018/12/14
 * Time: 8:53
 */

class Editor{
    private $page;
    private $id;
    private $class;
    public $publicInfo;
    function __construct($item)
    {
        if (empty($item) && empty($this->publicInfo)){
             $this ->publicInfo = '';
        }else{
            $this ->publicInfo =$this->publicInfo? $this->publicInfo:$item;
            $this ->page = 'defaultPage';
        }
        return 'initialize';
    }

    function initialize($id='', $class=''){
        if (!empty($id) && !empty($class)){
            $this->class = $class;
            $this ->id = $id;
            return true;
        }else{
            return false;
        }
    }
    function getId(){
        return $this->id;
    }
    function getClass(){
        return $this->class;
    }
    function setClass($class= ''){
        $this->class = $class;
    }
    function setId($id=''){
        $this->id= $id;
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        //实施destruct方法
        echo "This instance is destoryed.";
    }
}

$editor = new Editor('homePage');
$fun_name= $editor->__construct('');
$editor->$fun_name('id','class');
echo "<hr>";

echo $editor->getId();
echo $editor->getClass();
echo "<hr>";
unset($editor);

echo "<hr>";



