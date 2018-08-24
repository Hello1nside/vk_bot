<?php
/**
 * Created by PhpStorm.
 * User: ivzhenko.volodymyr
 * Date: 27.07.2018
 * Time: 16:29
 */

namespace app\model;

use core\DB;

class Model
{
    protected $db;
    protected $table;

    public function select($columns = '*', $where = [])
    {
        return DB::mysql($this->db)->select($this->table, $columns, $where);
    }
    public function query($query = '*', $map = [])
    {
        return DB::mysql($this->db)->query($query, $map);
    }

    public function get($columns = '*', $where = [])
    {
        return DB::mysql($this->db)->get($this->table, $columns, $where);
    }

    public function create($data)
    {
        DB::mysql($this->db)->insert($this->table, $data);
        return DB::mysql($this->db)->id();
    }

    public function update($data = [], $where = [])
    {
        $data = DB::mysql($this->db)->update($this->table, $data, $where);
        return $data->rowCount();
    }

    public function delete($where = [])
    {
        DB::mysql($this->db)->delete($this->table, $where);
    }

    public function count($where = [])
    {
        return DB::mysql($this->db)->count($this->table, $where);
    }

    public function has($where = [])
    {
        return DB::mysql($this->db)->has($this->table, $where);
    }
}
