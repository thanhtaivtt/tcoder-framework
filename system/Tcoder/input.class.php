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
 * @source: system/tcoder/input_interface.class.php
 **/
/*
	element interface input class
*/
  require_once ("system/Tcoder/input_interface.class.php");
/*
___________________________________________________________________________________________________
*/
  class input implements inputs{
      public function __construct(){
      
      }
      /*
       * name : get
	   * @var : string
	   * @return : string,boolean
      */
      public function get($name=''){
      		if($name==''){
      			isset($_GET);
      			return true;
      		}
      		else{
      			if (isset($_GET[$name])) {
      				return $_GET[$name];
      			}
      			else
      				return '';
      		}
      }
      /*
       * name : post
	   * @var : string
	   * @return : string,boolean
      */
      public function post($name=''){
      		if($name==''){
      			isset($_POST);
      			return true;
      		}
      		else{
      			if (isset($_POST[$name])) {
      				return $_POST[$name];
      			}
      			else
      				return '';
      		}
      }
  }
