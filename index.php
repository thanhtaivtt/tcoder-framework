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
 * @source: index.php
 **/
// creat define PATHSYS  validation request
    define('PATHSYS',__DIR__."/system");
    // embed system model
    require_once("system/model/t_model.php");
    //embed system controller
    require_once("system/controller/t_controller.php");
    // embed router
    require_once("router/router.php");
    $url=isset($_SERVER['PATH_INFO'])?explode('/',trim($_SERVER['PATH_INFO'],'/')):'';
    if(isset($router[$url])){
      if(file_exists('controller/'.$router[$url]))
        require_once('controller/'.$router[$url]);
      else {
        require_once("errors/error.php");
        require_once($error['404']);
      }
    }
    elseif(is_array($url)){
        if(file_exists('controller/'.$url[0].'.php')) {
            require_once ('controller/'.$url[0].'.php');
            $url[0]= new $url[0]();
            if(isset($url[1])){
              if(method_exists($url[0],$url[1]))
              $url[0]->$url[1]();
              else{
                require_once("errors/error.php");
                require_once($error['404']);
              }
            }
            else
              $url[0]->index();
        }
      else {
        require_once("errors/error.php");
        require_once($error['404']);
      }
    }
    else{
          if(file_exists('controller/'.$router['default'].'.php')){
            require_once ('controller/'.$router['default'].'.php');
            $home= new home();
            $home->index();

          }
          else{
            require_once("errors/error.php");
            require_once($error['404']);
          }

        }

 ?>
