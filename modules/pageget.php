<?php 
//Verifica se existe um parâmetro "page" no GET, "home" é a página principal
$page = isset($_GET["page"]) ? $page = $_GET["page"] : "home";
