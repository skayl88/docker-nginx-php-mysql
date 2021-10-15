<?php

include 'config.php';
if (!empty($config->logkey)) if ($_SERVER["QUERY_STRING"] != $config->logkey && @$_GET['key']!=$config->logkey) exit;

$files = scandir('log');
$logFiles = array();
foreach ($files as $f) {
	if ($f == '.' || $f == '..' || $f == 'span') continue;
	if (substr($f,-4) == '.xml') $logFiles[str_replace('.xml','',$f)] = array('log/'.$f,'');
	if (is_dir('log/'.$f)) {
		$_files = scandir('log/'.$f);
		foreach ($_files as $_f) {
			if (substr($_f,-4) == '.xml') 
			$logFiles[str_replace('.xml','',$_f)] = array('log/'.$f.'/'.$_f,$f);
		}
	}
}
krsort($logFiles);
reset($logFiles);

$limit  = (int)@$_GET['limit'] ? (int)@$_GET['limit'] : 20;
$offset = (int)@$_GET['offset'] ? (int)@$_GET['offset'] : 0;
$count = count($logFiles); $page = 1;
$pages = ceil($count / $limit);
$pageSelect = '';
if ($offset > $limit-1) $page = ceil(($offset+1) / $limit);
if ($offset > $count) $offset = 0;
if ($offset > 0 || $count > $limit) $logFiles = array_slice($logFiles, $offset, $limit);
$rcount = count($logFiles);
$enditem = ($offset+$limit <= $count) ? $offset+$limit : $count;
if ($pages > 1) {
	$pageSelect = '<select name="offset" onchange="this.form.submit()">';
	for ($p = 1; $p <= $pages; $p++) {
		$_offset = ($p - 1) * $limit;
		$selected = ($p == $page) ? ' selected' : '';
		$pageSelect .= '<option data-pg="'.$p.'" value="'.$_offset.'"'.$selected.'>'.$p.'</option>';
	}
	$pageSelect .= '</select>';
}
//print '<pre>'.print_r($logFiles,true).'</pre>';

?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Формы обратной связи: журнал</title>
  <style>
    html, body { background:#f1f1f1; margin:0px; font:11px Verdana; color:#404040; }
	#top { position:fixed; top:0px; left:0px; width:100%; height:40px; background:#f6f6f6;
      background: -ms-linear-gradient(top,#f6f6f6 0%,#e0e0e0 100%);
      background: linear-gradient(to bottom,#f6f6f6 0%,#e0e0e0 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6',endColorstr='#e0e0e0',GradientType=0);
      border-bottom: 1px solid #a0a0a0;  color:#0C192E; box-shadow: 0 1px 10px rgba(0,0,0,.3); z-index: 10000000;
	}
	#top h2 { color: #707070; margin:10px; font-size:18px; position:relative; }
	#top .count.nopg { display:inline-block; padding:6px 0px; }
	#top #pages { position:absolute; top:8px; right:15px; }
	#top #pages > select, #top #pages > a.pg { padding:3px; margin-right:1px; background:#fff; border:1px solid #ccc; }
	#top #pages > a.pg { display:inline-block; text-decoration:none; line-height:16px; width:12px; text-align:center; }
	#top #pages > a.pg:hover { color:red; background:#f6f6f6; }
	#log { width:100%; border-spacing:0px; margin-top:40px; }
	#log tr.log-row > td { padding:4px; border-bottom:1px solid #ddd; background:#f1f1f1; vertical-align:top; }
	#log tr.log-row.odd > td { background:#f9f9f9; }
	#log tr.log-row:hover > td { background:#e6e6e6; }
	#log tr.log-row > td.first { width:12%; color:#808080; }
	#log tr.log-row > td .report { margin-left:15px; }
	#log tr.log-row > td .report > table td { padding:2px; border-bottom:1px solid #eee !important; }
	#log tr.log-row > td .after { color:#808080; }
  </style>
  <script type="text/javascript">
  </script>
</head>
<body>
<div id="top">
  <h2>Формы обратной связи: журнал</h2>
  <form id="pages" action="index.php" method="get">
  <?php if (!empty($config->logkey)):?>
    <input type="hidden" name="key" value="<?=$config->logkey?>" />
  <? endif; ?>
    <input type="hidden" name="limit" value="<?=$limit?>" />
    <span class="count<?=($pages>1)?'':' nopg'?>">Записи: <strong><?=($offset+1).'-'.$enditem.(($count>$rcount)?'</strong> из '.$count.'<strong>':'')?></strong></span>
  <? if ($pages > 1):?>
    | Страницы:
	<?if ($page > 1):?>
	  <a href="index.php?<?=$config->logkey?'key='.$config->logkey.'&':''?>limit=<?=$limit?>&offset=<?=($offset-$limit)?>" class="pg"> < </a>
    <? endif; ?>
	<?=$pageSelect;?>
	<?if ($page < $pages):?>
	  <a href="index.php?<?=$config->logkey?'key='.$config->logkey.'&':''?>limit=<?=$limit?>&offset=<?=($offset+$limit)?>" class="pg"> > </a>
    <? endif; ?>
  <? endif; ?>
  </form>
</div>
<div style="padding:10px;">
<table id="log">
<?php 
$i = 0;
foreach($logFiles as $d):
	$i++;
	$xml = simplexml_load_file($d[0]);
	$a = (array)$xml->attributes();
	$params = $a['@attributes'];
	$report = (string)$xml->report;
	$reportStrip = strip_tags($report);
	$after = (strpos($report,$params['referer'])===false) ? '<div class="after">отправлено с '.$params['referer'].'</div>' : '';
	?>
	<tr class="log-row <?=(($i%2)>0)?'odd':'ev'?>">
	  <td class="first"><div class="date"><?=$params['send'].($params['id']?'<br>#'.$params['id']:'')?></div></td>
	  <td class="two"><div class="report"><?=$report;?></div><?=$after?></td></tr>
	<?php
	//print '<pre>'.print_r($report,true).'</pre>';
endforeach; 
?>
</table></div>
</body>
</html>