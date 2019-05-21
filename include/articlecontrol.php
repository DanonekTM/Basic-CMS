<?php

class Article
{
	public function fetch_all()
	{
		global $connection;
		
		$query = $connection->prepare("SELECT * FROM articles ORDER BY id DESC;");
		$query->execute();
	
		$resultSet = $query->get_result();
		
		return $resultSet;
	}
	
	public function fetch_data($id)
	{
		global $connection;
		
		$query = $connection->prepare('SELECT * FROM articles WHERE id = ?;');
		$query->bind_param('i', $id);
		$query->execute();
		
		$result = $query->get_result();

		while($row = $result->fetch_assoc())
		{
			$data[] = $row;
		}
		
		return $data;
	}
	
	public function fetch_credentials($username, $password)
	{
		global $connection;
		
		$query = $connection->prepare("SELECT * FROM cp WHERE login = ? AND password = ?;");
		$query->bind_param('ss', $username, $password);
		$query->execute();
		
		$result = $query->get_result();
		
		$credentials = [];
		
		while($row = $result->fetch_assoc())
		{
			$credentials[] = $row;
		}
		
		return $credentials;
	}
	
	public function add_article($title, $content, $timestamp)
	{
		global $connection;
		
		$query = $connection->prepare("INSERT INTO articles (title, content, timestamp) VALUES (?, ?, ?);");
		$query->bind_param('ssi', $title, $content, $timestamp);
		$query->execute();
		
		$result = $query->get_result();
		
		return $result;
	}
	
	public function update_article($title, $content, $timestamp, $id)
	{
		global $connection;
		
		$query = $connection->prepare("UPDATE articles SET title = ?, content = ?, timestamp = ? WHERE id = ?;");
		$query->bind_param('ssii', $title, $content, $timestamp, $id);
		$query->execute();
		
		$result = $query->get_result();
		
		return $result;
	}
		
	public function delete_article($id)
	{
		global $connection;
		
		$query = $connection->prepare("DELETE FROM articles WHERE id = ?;");
		$query->bind_param('i', $id);
		$query->execute();
		
		$result = $query->get_result();
		
		return $result;
	}
}

?>