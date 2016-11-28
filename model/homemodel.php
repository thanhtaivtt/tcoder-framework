<?php
  class homemodel extends t_model{

    public function get_all(){
      $result=  $this->get_list("SELECT * FROM `ci_sessions` WHERE 1");
      return $result;
    }
  }
