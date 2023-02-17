<?php

class dbo
{
	private $host = "localhost";
	private $user = "root";
	private $dbnm = "gobuddy";
	private $pass = "";

	//-- Do Not Edit Below This Line --------------------------------------

	private $link;

	function __construct()
	{
		$this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->dbnm) or die(mysqli_connect_error());
	}

	function insert($table, $data)
	{
		if (is_array($data)) {
			$tbl = 'insert into ' . $table;
			$fields = '(';
			$values = ' values(';
			foreach ($data as $key => $value) {
				$fields .= $key . ',';
				$values .= "'" . $value . "',";
			}
			$fields = rtrim($fields, ',');
			$values = rtrim($values, ',');
			$fields .= ')';
			$values .= ')';
			$sql = $tbl . $fields . $values;

			//echo $sql;exit;
			mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
			return $this->link->insert_id;
		}
	}

	function query($sql)
	{
		return mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
	}

	function get($sql)
	{
		$res = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		$result = array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($res)) {
			$result[$i] = $row;
			$i++;
		}
		return $result;
	}

	function update($table, $data, $where)
	{
		$primary = key($where);
		$key = $where[$primary];
		if (is_array($data)) {
			$tbl = 'UPDATE ' . $table . ' SET ';
			$where = ' WHERE ' . $primary . "='" . $key . "'";
			$values = '';
			foreach ($data as $key => $value) {
				$values .= $key . "='" . $value . "',";
			}
			$values = rtrim($values, ',');
			$sql = $tbl . $values . $where;
			return mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		}
	}
	function insert_id()
	{
		return $this->link->insert_id;
	}
	function check_duplicate($table, $where, $id = '')
	{
		$sql = "select iUserId from " . $table . ' where 1=1 ' . $where;
		$res = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		echo mysqli_num_rows($res);
		exit;
	}
	function delete($table, $where)
	{

		$primary = key($where);
		$key = $where[$primary];

		$sql = "delete from " . $table . ' where ' . $primary . "='" . $key . "'";
		return mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
	}
}

$db = new dbo();

?>