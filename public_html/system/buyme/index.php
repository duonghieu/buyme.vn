<?php
include 'dal/db.php';
$db= new DB('local');
echo 'Data access layer ';
//echo $db->insert('post',array('title'=>'Title','content'=>'content','status'=>1));
//$db->edit('post',array('title'=>'Title','content'=>'content','status'=>1),null,'id=5');
//echo $db->delete('post','id=5');
var_dump($db->get_one('post','*',4));
var_dump($db->get_all('post',null,null));
?>