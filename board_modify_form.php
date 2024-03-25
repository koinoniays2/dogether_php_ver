<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link href="css/header.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script>
 function update_board() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
  }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 쓰기
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "admin", "admin", "dogether");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
    $id = $row["id"];
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
?>

	    <form  name="board_form" method="post" action="board_modify.php?num=<?=$number?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1"><b>이름 :</b> </span>
					<span class="col2" id="testname"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1"><b>제목 :</b></span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1"><b>내용 :</b> </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="update_board()">수정하기</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<script>
function update_board() {
    var subject = document.board_form.subject.value;
    var content = document.board_form.content.value;
	var name = document.getElementById("testname").value;

    if (!subject) {
        alert("제목을 입력하세요!");
        document.board_form.subject.focus();
        return;
    }
    if (!content) {
        alert("내용을 입력하세요!");    
        document.board_form.content.focus();
        return;
    }

    // 수정된 내용을 서버로 전송
    fetch('http://localhost/dogether_php_ver/board_modify.php?num=<?=$num?>&page=<?=$page?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'subject=' + encodeURIComponent(subject) + '&content=' + encodeURIComponent(content) 
    })
    .then(response => response.text())
    .then(data => {
        // 서버에서 반환한 데이터 처리 (필요한 경우)
        // console.log(data);
        // 수정이 완료되면 목록 페이지로 이동
        location.href = 'board_list.php?page=<?=$page?>';
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>

</body>
</html>
