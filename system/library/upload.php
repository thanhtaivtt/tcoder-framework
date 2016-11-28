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
 class upload{
 	public function doupload($name='',$config=''){
 		if(!is_array($config))
 			return false;
 		else{
 			extract($config);
 			if($type=='image'){
 				if($_FILES[$name]['type']=='image/png'||$_FILES[$name]['type']=='image/jpg'||$_FILES[$name]['type']=='image/jpeg'||$_FILES[$name]['type']=='image/gif'&&$_FILES[$name]['size']<=$size){
	 				move_uploaded_file($_FILES[$name]['tmp_name'],$move.$_FILES[$name]['name']);
	 				$data=array();
	 				$data['save']=$move.$_FILES[$name]['name'];
	 				foreach($_FILES[$name] as $key=> $a){
	 					$data[$key]=$a;
	 				}	
	 				return $data;
 				}	
 				else
 					return ["error"=>"file bị cấm hoặc dung lượng quá lớn"];

 			}
 			
 		}
 	}
 }