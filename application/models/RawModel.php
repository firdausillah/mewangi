<?php
class RawModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function sqlRaw($sql)
    {
        return $this->db->query($sql);
    }
}
