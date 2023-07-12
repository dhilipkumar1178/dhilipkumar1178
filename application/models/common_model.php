<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model
{
public function __update_table($table_name, $data, $id)
    {
        $this
            ->db
            ->where($table_name . '_id', $id);
        $this
            ->db
            ->update($table_name, $data);
        if ($this
            ->db
            ->_error_message())
        {
            return false;
        }
        return true;
    }
}