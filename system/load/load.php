<?php
/**
 * 
 * Tcoder
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) ThanhTai
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package Tcoder
 * @author  Thanhtai
 * @copyright Copyright (c) 2016 ThanhTai(http://toidicode.com/)
 * @copyright Copyright (c) 2016 ThanhTai(http://toidicode.com/)
 * @license http://opensource.org/licenses/MIT  MIT License
 * @link  https://toidicode.com/framework
 * @since Version 1.0
 * @source: system/load/load.php
 **/
 class load{
/*
 * @methodname library
 * @function call library in system or application
 * @return object
*/
  public function library($name){
    if(file_exists('system/library/'.$name.'.php')){
      require_once "system/library/".$name.".php";
      $this->$name= new $name();
    }
    else if(file_exists('library/'.$name.'.php')){
      require_once 'library/'.$name.'.php';
      $this->$name= new $name();
    }
    else
      echo "Không thấy libary";
  }
/*
 * @methodname helper
 * @function call helper in system or application
 * @return object
*/
  public function helper($name){
    if(file_exists('system/helper/'.$name.'.php')){
      require_once ('system/helper/'.$name.'.php');
    }
    elseif(file_exists('system/helper/'.$name.'.php')){
      require_once ('system/helper/'.$name.'.php');
    }
    else
      echo ("Không tìm thấy helper");
  }
/*
 * @methodname model
 * @function call model in system
 * @return object
*/
  public function model($name){
    if (file_exists("model/".$name.".php")) {
      require_once ("model/".$name.".php");
      $this->$name= new $name();
    }
    else
      echo "không tìm thấy model";
  }
/*
 * @methodname database
 * @function call database
 * @return all
*/
  public function database(){
    require_once ("system/database/database.php");
  }
/*
 *@methodname: view
 *@function call view
 *@return all
*/
  public function view($files,$data=''){
    if(file_exists("view/".$files.".php")){
      ob_start();
      if(is_array($data)) extract($data);
        require_once ("view/".$files.".php");
      $content= ob_get_contents();
      ob_end_clean();
      echo $content;
    }
    else
    echo "không tìm thấy view";
  }
}
