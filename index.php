<!DOCTYPE HTML>

<title>飽寶</title>
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style='background: #EEEEEE;'>

<?php
	require("header.php");
	require('include.php');
	echo "<!--test111-->";
	echo "<!--left-->";
	echo '<div style="width: 560px; background:#EEEEEE; float:left;">';
	$query = "SELECT * FROM articles order by article_id desc";
	$queryresult = mysqli_query($link, $query);
	while($result = mysqli_fetch_array($queryresult)){
		echo '<div style="background:#DDDDDD; margin-left:20px;">';
		echo '<div style="background: #CCCCCC">';
		echo '<h2 style="margin-left:1rem; margin-top:0.5em;">';
		echo $result[2];
		echo '</h2>';
		echo '</div>';
		/*echo '<p style="margin-left:1rem; text-align:right; margin-top: -2.8rem; margin-right: 0.4rem;">';
		echo $result[4];
		echo '</p>';*/
		$s = "SELECT star FROM comments WHERE article=".$result[0];
		$s_result = mysqli_query($link,$s);
		$total=0;
		$count=0;
		while($rs = mysqli_fetch_array($s_result) )
		{
			$total+=$rs[0];
			$count++;
		}
		if($count==0)
		{
			echo '<p style="margin-top: -16px; margin-right: 8px; margin-bottom: 8px; text-align: right;">';

			echo "作者：".$result[1]." | ";
			echo "尚無評價 | ";
			echo $result[4];
			echo '</p>';
			
		}
		else
		{
			$total= $total/$count;
			echo '<p style="margin-top: -16px; margin-right: 8px; margin-bottom: 8px; text-align: right;">';
			echo "作者：".$result[1]." | ";
			echo "評價：".round($total,1)."★ | ";
			echo $result[4];
			echo '</p>';
		}
		echo '<p style=" margin-left:1.5rem; margin-right:1.5rem; margin-bottom:1rem;">';
		echo mb_substr($result[3], 0, 80, "utf-8");
		echo '……</p>';
		echo '<div style="text-align: right;">';
		echo '<span id="button" style="margin-right: 8px; margin-bottom: 8px;"><a href="article.php?id='.$result[0].'">閱讀全文…</a></span>';
		echo '</div>';
		echo '</div>';
	}
?>
	</div>
	
	
	<!--right-->
	<div style="width: 300px; background:#DDDDDD; float:right; margin-top:0.5rem; margin-right: 20px;">
		<div align="center" style="margin-top:10px;">
			<img src="https://static.wixstatic.com/media/f3932a74408c4727a7b717f927088f22.jpg/v1/fill/w_841,h_561,al_c,q_85,usm_0.66_1.00_0.01/f3932a74408c4727a7b717f927088f22.webp" style="max-width:280px; max-height:280px;">
		</div>
		<div>
			<p style="margin-left:10px; margin-right:10px;">一起來分享你對美食的喜愛吧~~~~~</p>
		</div>
	</div>
</div>

</body>
