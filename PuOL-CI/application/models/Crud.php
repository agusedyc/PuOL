<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Crud extends CI_Model {
    private $table_name;
    public function __construct() {
        parent::__construct();
        //$this->table_name = 'tb_about';
    }
    function read($tabel) {
        $sql = $this->db->get($tabel);
        // return $sql;
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readSort($tabel, $kolom, $method) {
        $this->db->order_by($kolom, $method);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readLimit($tabel, $limit, $start) {
        $this->db->limit($limit, $start);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readLimitSort($tabel, $kolom, $method, $limit, $start) {
        $this->db->order_by($kolom, $method);
        $this->db->limit($limit, $start);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readLimitSortP($tabel, $kolom, $limit, $start) {
        $this->db->order_by($kolom);
        $this->db->limit($limit, $start);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readDr($tabel, $field, $id) {
        $this->db->select('*');
        $this->db->where($field, $id);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readDr2($tabel, $field1, $id1, $field2, $id2) {
        $this->db->select('*');
        $this->db->where($field1, $id1);
        $this->db->where($field2, $id2);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readDrSort($tabel, $field, $id, $kolom, $method) {
        $this->db->select('*');
        $this->db->where($field, $id);
        $this->db->order_by($kolom, $method);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readDrLimit($tabel, $field, $id, $limit, $start) {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->where($field, $id);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readDrLimitSort($tabel, $field, $id, $limit, $start, $kolom, $method) {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->db->where($field, $id);
        $this->db->order_by($kolom, $method);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readLike($tabel, $field, $string) {
        $this->db->select('*');
        $this->db->like($field, $string);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readLike2($tabel, $field, $string, $field = '', $where = '') {
        $this->db->select('*');
        if ($field && $where):
            $this->db->where($field, $where);
        endif;
        $this->db->like($field, $string);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function readRand($tabel, $field, $limit) {
        $this->db->order_by($field, 'RANDOM');
        $this->db->limit($limit);
        $sql = $this->db->get($tabel);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    function save($tabel, $data) {
        $this->db->insert($tabel, $data);
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function update($tabel, $field, $kode, $p) {
        $this->db->where($field, $kode);
        $this->db->update($tabel, $p);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function delete($tabel, $field, $kode) {
        $this->db->where($field, $kode);
        $this->db->delete($tabel);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

/*
* Model By : https://github.com/mikhaelfelian
* Edited By : https://github.com/agusedy
*/