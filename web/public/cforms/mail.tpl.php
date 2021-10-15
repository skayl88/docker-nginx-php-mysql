<?php
// шаблон письма

if ($data['mhead']) print $data['mhead'] . "\r\n";
print '<table cellspacing="0" cellpadding="8" style="border-bottom:1px solid #ddd">';
foreach ($_POST as $n => $v) {
	if (!trim($n)) continue;
	$name = str_replace('_',' ',$n); $val = '';
	if (is_array($v)) {
		if (count($v)>0) foreach ($v as $it) $val .= ($val?', ':'') . $it;
	} else $val = trim(str_replace("\n","<br />\n",htmlspecialchars($_POST[$n])));
	if (!$val) $val = '<span style="color:#888">'.$data['empty'].'</span>';
?>
  <tr>
    <td valign="top" style="border-bottom:1px solid #ddd"><?=$name;?>:</td>
    <td valign="top" style="border-bottom:1px solid #ddd"><?=$val;?></td>
  </tr>
<?php }
print "\r\n</table>\r\n<p>&nbsp;</p>";
if ($data['mfooter']) print "\r\n" . $data['mfooter'];
else print "<p><small>Отправлено со страницы ".$_SERVER['HTTP_REFERER']." (IP: ". $_SERVER['REMOTE_ADDR'].")</small></p>";
?>