<?php

function h($s){
	return htmlspecialchars($s, ENT_QUOTES|ENT_HTML5, 'UTF-8');
}