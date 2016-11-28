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
 * @source: system/database/database.php
 **/
// nhúng thông tin config
require_once "database/config.php";
  class DB extends config{
    private $__con;
    public function connect()
    {
        if (!$this->__con){
            $this->__con = mysqli_connect($this->hostname,$this->username,$this->password,$this->databasename) or die ('Lỗi kết nối');
            mysqli_query($this->__con, "SET NAMES".$this->charset);
        }
    }
    public function dis_connect(){
        if ($this->__con){
            mysqli_close($this->__con);
        }
        else {
            echo "chưa kết nối";
        }
    }
    public function insert($table, $data)
    {
        $this->connect();
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".@mysql_escape_string($value)."'";
        }
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';

        return mysqli_query($this->__con, $sql);
    }
    public function update($table, $data, $where)
    {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value){
            $sql .= "$key = '".@mysql_escape_string($value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;

        return mysqli_query($this->__con, $sql);
    }
    public function remove($table, $where){
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__con, $sql);
    }
    public function get_list($sql)
    {
        $this->connect();

        $result = mysqli_query($this->__con, $sql);

        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_array($result)){
            $return[] = $row;
        }
        mysqli_free_result($result);

        return $return;
    }
	 public function num_rows($sql){
		 $this->connect();

        $result = mysqli_query($this->__con, $sql);

        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        $row = mysqli_num_rows($result);

        mysqli_free_result($result);

        if ($row){
            return $row;
        }

        return false;
    }
    public function get_row($sql)
    {
        $this->connect();

        $result = mysqli_query($this->__con, $sql);

        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        $row = mysqli_fetch_array($result);

        mysqli_free_result($result);

        if ($row){
            return $row;
        }
        return false;
    }

}

$DB= new DB();
 ?>
