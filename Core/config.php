<?php
/* ĐƠN VỊ THIẾT KẾ CHINHAPI.NET | ZALO 0388674883 | https://www.facebook.com/chinhapiit */
date_default_timezone_set('Asia/Ho_Chi_Minh');
class teamapiit {
    private $ketnoi;
    private $localhost = 'localhost';
    private $server = 'marketmm_mmo'; 
    private $pass_chinhapi = 'marketmm_mmo'; 
    private $user_chinhapi = 'marketmm_mmo'; 

    function ketnoi() {
        if (!$this->ketnoi) {
            $this->ketnoi = mysqli_connect($this->localhost, $this->user_chinhapi, $this->pass_chinhapi, $this->server) 
                or die('Bạn chưa kết nối database');
            mysqli_query($this->ketnoi, "set names 'utf8'");
        }
    }
    public function insert($table,$data){
        $this->ketnoi();
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value) {
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->ketnoi, $value)."'";
        }
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';

        return mysqli_query($this->ketnoi, $sql);
    }
    public function remove($table, $where)
    {
        $this->ketnoi();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->ketnoi, $sql);
    }
    public function get_list($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    public function get_row($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    public function update($table, $data, $where)
    {
        $this->ketnoi();
        $sql = '';
        foreach ($data as $key => $value) {
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
        return mysqli_query($this->ketnoi, $sql);
    }
    public function num_rows($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    public function cong($table, $data, $sotien, $where)
    {
        $this->ketnoi();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` + '$sotien' WHERE $where ");
        return $row;
    }
}

?>
