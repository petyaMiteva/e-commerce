<?php

function db_connect()
{
	$host = 'localhost';
	$user = 'shop_user';
	$pawd = 'admin123';
	$db = 'shop';
	
	
	$connection = mysqli_connect($host, $user, $pawd);
	mysqli_query($connection, "SET NAMES utf8");
	if(!$connection || !mysqli_select_db($connection, $db))
	{
		return false;
		}
		
		return $connection;
	}


function db_result_to_array($result)
{
	$res_array = array();
	$count = 0;
	
	while($row = mysqli_fetch_array($result))
	{
		$res_array[$count] = $row;
		$count ++;
		}
	return $res_array;
	}

function get_products()
{
	$connection = db_connect();
	$query = "SELECT * FROM products ORDER BY id DESC";
	
	$result = mysqli_query($connection, $query);
	
	$result = db_result_to_array($result);
	
	return $result;
	}

function get_cat()
{
	$connection = db_connect();
	$query = "SELECT * FROM categories ORDER BY id DESC";
	
	$result = mysqli_query($connection, $query);
	
	$result = db_result_to_array($result);
	return $result;
	}
	
function get_product($id)
{
	$connection = db_connect();
    
	$query = ("SELECT * FROM products WHERE id = '$id'");
	
	$result = mysqli_query($connection, $query);
	
	$row = mysqli_fetch_array($result);
	
	return $row;
	
	}

	function get_cat_products($cat)
{
	$connection = db_connect();
    
	$query = "SELECT * FROM products WHERE cat='$cat' ORDER BY id DESC";
	
	$result = mysqli_query($connection, $query);
	
	$result = db_result_to_array($result);
	
	return $result;
	}


    ?> 
 