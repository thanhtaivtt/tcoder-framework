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
 * @source: system/controller/controller.php
 **/
  require_once ("system/load/load.php");
  require_once ("system/Tcoder/input.class.php");
  class t_controller extends load{
    protected $input;
    public function __construct(){
        $this->input= new input();
    }
    public function stripUnicode($str){
      if(!$str) return false;
      $unicode = array(
      'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
      'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
      'd'=>'đ',
      'D'=>'Đ',
      'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
      'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
      'i'=>'í|ì|ỉ|ĩ|ị',
      'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
      'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
      'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
      'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
      'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
      'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
      'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
      );
      foreach($unicode as $khongdau=>$codau) {
        $arr=explode("|",$codau);
        $str = str_replace($arr,$khongdau,$str);
      }
    return $str;
    }
    public function slug($str){
         $str=trim($str);
        if ($str=="") return "";
         $str =str_replace('"','',$str);
         $str =str_replace("'",'',$str);
         $str =$this->stripUnicode($str);
         $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');

        // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
        $str = str_replace(' ','-',$str);
         $str = str_replace('/','-',$str);

       return $str;
  }
}

 ?>
