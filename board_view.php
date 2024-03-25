<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/header.css" type="text/css" />
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "admin", "admin", "dogether");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	// $new_hit = $hit + 1;
	// $sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col2">제목 :</span>
				<span class="col2"><?=$subject?></span>
				
				
			</li>
			<li>
			<span class="col2">내용 :</span>
				<span class="col2"><?=$content?></span>
				<span class="col2"><b>제목 :</b> <?=$subject?></span>
				
			</li>
			<li>
			<span class="col2">글쓴이 :</span>
				<span class="col2"><?=$name?></span>
				
			</li>
			<li>
				<span class="col2">><?=$regist_day?></span>
				
				
			</li>

	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
				<?php if($userid == $id) { ?>
				<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<?php } ?>
				<li><button onclick="location.href='board_write.php'">글쓰기</button></li>
		</ul>
	</div> <!-- board_box -->
</section> 

</body>
</html>
