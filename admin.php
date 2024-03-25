<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- CSS -->
<link rel="stylesheet" href="css/index.css" type="text/css" />
<link rel="stylesheet" href="css/header.css" type="text/css" />
<link rel="stylesheet" href="css/footer.css" type="text/css" />
<link rel="stylesheet" href="css/admin.css" type="text/css" />
<title>관리자 페이지</title>
</head>
<body> 
<header id="header">
	<?php include "header.php";?>
</header>
<section id="admin_section">
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
			<li>
				<span class="col1">번호</span>
				<!-- <span class="col2">아이디</span> -->
				<span class="col3">이름</span>
				<span class="col4">레벨</span>
				<!-- <span class="col6">가입일</span>
				<span class="col7">주소</span>
				<span class="col8">수정</span>
				<span class="col9">삭제</span> -->
			</li>
	<?php
	$con = mysqli_connect("localhost", "admin", "admin", "dogether");
	$sql = "SELECT * FROM users ORDER BY num DESC";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $level       = $row["level"];
      $regist_day  = $row["regist_day"];
	  $regist_day = substr($row["regist_day"], 0, 10);
	  $address = $row["address"];
	  $address_detail = $row["address_detail"];
	?>
			
		<li>
		<form id="admin_member_update" method="post" action="admin_member_update.php?num=<?=$num?>">
			<span class="col1"><?=$number?></span>
			<!-- <span class="col2"><?=$id?></a></span> -->
			<span class="col3"><?=$name?></span>
			<span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
			<!-- <span class="col6"><?=$regist_day?></span>
			<span class="col7"><?=$address?></span>
			<span class="col8"><?=$address_detail?></span> -->
			<div>
				<span class="col9"><button type="submit">수정</button></span>
				<span class="col10"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
			</div>
		</form>
		</li>	
			
	<?php
   	   $number--;
   	}
	?>
	    </ul>
	    <h3 id="member_title">
	    	관리자 모드 > 게시판 관리
		</h3>
	    <ul id="board_list">
		<li class="title">
			<span class="col1">선택</span>
			<span class="col2">번호</span>
			<span class="col3">이름</span>
			<span class="col4">제목</span>
			<span class="col6">작성일</span>
		</li>
		<form method="post" action="admin_board_delete.php">
				<?php
					$sql = "SELECT * FROM board ORDER BY num DESC";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result); // 전체 글의 수

					$number = $total_record;

				while ($row = mysqli_fetch_array($result))
				{
					$num         = $row["num"];
					$name        = $row["name"];
					$subject     = $row["subject"];
					$regist_day  = $row["regist_day"];
					$regist_day  = substr($regist_day, 5, 5);
				?>
						<li id="board_info">
							<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
							<span class="col2"><?=$number?></span>
							<span class="col3"><?=$name?></span>
							<span class="col4"><?=$subject?></span>
							<span class="col6"><?=$regist_day?></span>
						</li>	
				<?php
					$number--;
				}
				mysqli_close($con);
				?>
				<button type="submit">선택된 글 삭제</button>
			</form>
	    </ul>
	</div>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
