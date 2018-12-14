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

$myform = new Gathering('template');


