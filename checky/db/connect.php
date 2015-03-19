<?php
$db = new mysqli('localhost', 'root', 'gTHdKsxT', 'personal');

if($db->connect_errno) {
	die(' Sorry, we are having some problems.');
}