<?php
	require_once('./php/secureFunc.php');
	require_once('./php/Follow.class.php');
	require_once('./php/FollowDao.class.php');
	require_once('./php/DaoFactory.class.php');
	require_logined_session();
	
	$userId = "guest";
	$avatorImage = "guest.png";
	$loginFlg = false;
	if(isset($_SESSION['userId'])){
		$userId = h($_SESSION['userId']);
		$loginFlg = true;
	}
	if(file_exists("./Images/Avator/" . $userId . ".png")){
		$avatorImage = $userId . ".png";
	}
	$daoFactory = DaoFactory::getDaoFactory();
	$dao = $daoFactory->createFollowDao();
	$followCount = $dao->followRows($userId);
	$followerCount = $dao->followerRows($userId);
?>
<!DOCTYPE html>
<html lang="jp">
<head>
<meta charset="UTF-8">
<title>インスタグルメ</title>
<!-- Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Import materialize.css-->
<link type="text/css" rel="stylesheet" href="Stylesheet/materialize.css"  media="screen,projection">
<link type="text/css" rel="stylesheet" href="Stylesheet/lity.css"  media="screen,projection">
<link type="text/css" rel="stylesheet" href="Stylesheet/Style.css" media="screen,projection">
<link type="text/css" rel="stylesheet" href="Stylesheet/jquery-confirm.css"/>
<!-- Import JavaScript -->
<script src="JavaScript/core.js"></script>
<script src="JavaScript/jquery.js"></script>
<script src="JavaScript/jquery-confirm.js"></script>
<script src="JavaScript/materialize.js"></script>
<script src="JavaScript/lity.js"></script>
<script src="JavaScript/favorite.js"></script>
<script type="text/javascript"><!--
	function deletefunc(obj) {
		$.confirm({
			title: '確認',
			content: '画像を削除してもよろしいですか？',
			boxWidth: '30%',
			opacity: 0.5,
			buttons: {
				deleteimage: {
					text: 'OK',
					btnClass: 'btn-orange',
					action: function () {
						location.href = "./php/deletefunc.php?imageName=" + obj.getAttribute('data-imagename');
					}
				},
				cancel: {
					text: 'キャンセル',
					action: function () {
					}
				}
			}
		});
	}
	
	function logoutfunc() {
		$.confirm({
			title: '確認',
			content: 'ログアウトしてよろしいですか？',
			boxWidth: '30%',
			opacity: 0.5,
			buttons: {
				deleteimage: {
					text: 'OK',
					btnClass: 'btn-orange',
					action: function () {
						location.href = "./php/logout.php";
					}
				},
				cancel: {
					text: 'キャンセル',
					action: function () {
					}
				}
			}
		});
	}
	
	function avatorfunc() {
		$.confirm({
			title: false,
			content: 'url:avator.html',
			buttons: {
				cancel: {
					text: 'キャンセル',
					action: function() {
					}
				}
			}
		});
	}
 --></script>
 <!--Let browser know website is optimized for mobile-->
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 </head>
 <body>

<!-- navbar start -->
<div class="navbar-fixed">
	<nav class="navigation orange darken-2" role="navigation">
		<div class="nav-wrapper container"> <a href="./" class="brand-logo white-text left brand-logo-font hide-on-med-and-down">Instagourmet</a> <a href="./" class="brand-logo white-text center brand-logo-font hide-on-large-only">Instagourmet</a> 
			
			<!-- slide-nav mobile-only --> 
			<a href="#" data-activates="slide-nav" class="button-collapse-slidenav hide-on-large-only left"><i class="material-icons white-text">menu</i></a>
			<ul id="slide-nav" class="side-nav">
				<a class="right"><i class="material-icons">clear</i></a>
				<li>
					<div class="userView"> 
						<!--<div class="background">
              <img src="Images/office.jpg">
            </div>--> 
						<img class="circle" src="./Images/Avator/<?=$avatorImage?>"> <span class="black-text name">User Name :
						<?=$userId?>
						</span> </div>
				</li>
				<li>
					<div class="divider"></div>
				</li>
				<li class="nav-position"> <a href="./" class="navigation-link"><i class="material-icons">home</i>ホーム</a> </li>
				<li class="nav-position"> <a href="upload.php" class="navigation-link"><i class="material-icons">photo_camera</i>アップロード</a> </li>
				<li class="nav-position"> <a href="myprofile.php" class="navigation-link"><i class="material-icons">account_circle</i>プロフィール</a> </li>
				<?php if($loginFlg){ ?>
				<li class="nav-position"> <a href="favorite.php" class="navigation-link"><i class="material-icons">favorite</i>お気に入り</a> </li>
				<li class="nav-position"> <a href="follow.php" class="navigation-link"><i class="material-icons">group</i>フォロー</a> </li>
				<?php } ?>
			</ul>
			
			<!-- navigation desktop-only -->
			<ul class="hide-on-med-and-down right">
				<li> <a href="./" class="hide-on-med-and-down"><i class="material-icons">home</i></a> </li>
				<li> <a href="upload.php" class="hide-on-med-and-down"><i class="material-icons">photo_camera</i></a> </li>
				<li> <a href="myprofile.php" class="hide-on-med-and-down"><i class="material-icons">account_circle</i></a> </li>
				<?php if($loginFlg){ ?>
				<li> <a href="favorite.php" class="hide-on-med-and-down"><i class="material-icons">favorite</i></a> </li>
				<li> <a href="follow.php" class="hide-on-med-and-down"><i class="material-icons">group</i></a> </li>
				<?php } ?>
			</ul>
		</div>
	</nav>
	<script>
    // Mobile
    $('.button-collapse-slidenav').sideNav({
          menuWidth: 305, // Default is 240
          edge: 'left', // Choose the horizontal origin
          closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens
        }
    );
  </script> 
</div>
<!-- navbar end -->

<main> <br>
	<div class="container">
		<div class="row">
			<div class="col s12 m12 l6 center"> <img onclick="avatorfunc()" class="circle pointer" src="./Images/Avator/<?=$avatorImage?>" alt=""> </div>
			<div class="col s12 m12 l6">
				<div class="card small white">
					<div class="card-content"> <span class="card-title">ユーザID :
						<?=$userId?>
						</span><br>
						<!--
            <button class="waves-effect waves-light btn-flat dropdown-button right" data-activates='dropdown-desktop'>
              詳細を表示する
            </button>
            <ul id='dropdown-desktop' class='dropdown-content'>
              <li><a class="grey-text" href="#!">ユーザ情報変更</a></li>
            </ul>
            --> 
						<span class="text-darken-2"><a href="./follow.php"> フォロー : <?=$followCount?>人</a><br>
						<a href="./follow.php?flg=false">フォロワー : <?=$followerCount?>人</a><br>
						<br>
						</span>
						<button type="button" class="waves-effect waves-light btn-large orange darken-2" onclick="logoutfunc()">ログアウト</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 今までの投稿 開始 -->
		<div class="row">
			<?php
            require_once('./php/Image.class.php');
            require_once('./php/ImageDao.class.php');
            require_once('./php/Comment.class.php');
            require_once('./php/CommentDao.class.php');
			require_once('./php/Favorite.class.php');
            require_once('./php/FavoriteDao.class.php');
            
            $pageNum = 0;
            if(isset($_GET['pageNum'])){
                $pageNum = $_GET['pageNum'];
            }
            $daoFactory = DaoFactory::getDaoFactory();
            $dao = $daoFactory->createImageDao();
            if (isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
                $imageArray = $dao->userSelect($userId, $pageNum);
                $rowCount = $dao->userRows($userId);
				if(isset($_GET['result'])){
					$res = "";
					if($_GET['result'] == "success"){
						$res .= "<p class='err_text'>画像を削除しました</p>";
					}else if($_GET['result'] == "fail"){
						$res .= "<p class='err_text'>画像の削除に失敗しました</p>";
					}
	                echo "<div class='center'>" . $res . "</div>";
				}
                echo "<div class='center'><p>あなたの投稿 : " . $rowCount . "件</p></div>";
                $dao = $daoFactory->createCommentDao();
                $commentArray = $dao->select();
				$dao = $daoFactory->createFavoriteDao();
				$favoriteArray = $dao->select($userId);
            
                $cnt = 1;
                foreach($imageArray as $imageRow){
					$imageName = $imageRow->getImageName();
					$uploadUser = $imageRow->getUserId();
					$uploadAvator = "guest.png";
					if(file_exists("./Images/Avator/" . $uploadUser . ".png")){
						$uploadAvator = $uploadUser . ".png";
					}
        ?>
			<div class="col s12 m6 l6">
				<div class="card sticky-action hoverable z-depth-1">
					<div class="card-image"> <a href="./Images/Upload/<?=$imageName?>" data-lity="data-lity"><img src="./Images/Thumbnail/<?=$imageName?>"></a> </div>
					<div class="card-content">
						<span class="card-title activator"><i class="material-icons right">keyboard_arrow_up</i></span>
						<a href="./profile.php?profId=<?=$uploadUser?>">
							<img class="upload_avator left" src="./Images/Avator/<?=$uploadAvator?>">
							<div class="upload_user left">
								<span class="black-text"><?=$uploadUser?></span>
							</div>
						</a>
						<div class="clearfix"></div>
					</div>
					<div class="card-reveal"><span class="card-title"><i class="material-icons right">keyboard_arrow_down</i></span>
						<a href="./profile.php?profId=<?=$uploadUser?>">
							<img class="upload_avator left" src="./Images/Avator/<?=$uploadAvator?>">
							<div class="upload_user left">
								<span class="black-text"><?=$uploadUser?></span>
							</div>
						</a>
						<div class="clearfix"></div>
						<p><?=$imageRow->getUploadDate()?></p>
						<p>カテゴリ:
							<?php
			  	$categories = preg_split("/#|、+/", $imageRow->getCategory(), -1, PREG_SPLIT_NO_EMPTY);
				$cnt2 = 1;
              	foreach($categories as $category){
					echo "<a href='./?word=" . $category . "'>#" . $category . "</a>";
					if($cnt2 < count($categories)){
						echo ", ";
					}
					$cnt2++;
				}
			  ?>
						</p>
						<?php
                if(isset($commentArray[$imageName])){
                    echo "<p>コメント<br>";
                    $oneImageComment = $commentArray[$imageName];
                    foreach($oneImageComment as $commentRow){
                            echo "<b>". $commentRow->getUserId(). "</b> ". $commentRow->getComment(). "<br>";
                    }
                }else{
                    echo "<p>コメントなし";
                }
            ?>
						<form method="get" action="./php/commentfunc.php">
							<div class="input-field"> <i class="material-icons prefix">mode_edit</i>
								<label for="comment<?=$cnt?>">コメント</label>
								<input id="comment<?=$cnt?>" type="text" class="validate" name="comment" value="">
							</div>
							<input type="hidden" name="imageName" value="<?=$imageName?>">
							<button class="waves-effect waves-light btn orange accent-4" type="submit" name="action">コメント追加</button>
							<?php
					if(isset($favoriteArray[$imageName])){
						$condition = 'true';
					}else{
						$condition = 'false';
					}
				?>
							<img class="right pointer" onclick="favoritefunc(this)" data-condition=<?=$condition?> data-imagename=<?=$imageName?> src="Images/favorite_<?=$condition?>.png"> <img class="right pointer" onclick="deletefunc(this)" data-imagename=<?=$imageName?> src="./Images/trash.png">
						</form>
					</div>
				</div>
			</div>
			<?php
        $cnt++;
        }
        ?>
			
			<!-- 今までの投稿 終了 --> 
		</div>
		<!-- div.row end -->
		
		<div class="center">
			<ul class="pagination">
				<?php
                if($pageNum == 0){
                    echo "<li class='disabled'><i class='material-icons'>chevron_left</i></li>";
                }else{
                    echo "<li class='waves-effect'><a href='./profile.php?pageNum=" . ($pageNum - 1) . "'><i class='material-icons'>chevron_left</i></a></li>";
                }
                for($count = 0; $count < ceil($rowCount / 12); $count++){
                    if($count == $pageNum){
                        echo "<li class='active orange'>";
                    }else{
                        echo "<li class='waves-effect'>";
                    }
                    echo "<a href='./profile.php?pageNum=" . $count . "'>" . ($count + 1) . "</a></li>";
                }
                if($pageNum >= ceil($rowCount / 12) - 1){
                    echo "<li class='disabled'><i class='material-icons'>chevron_right</i></li>
                ";
                }else{
                    echo "<li class='waves-effect'><a href='./profile.php?pageNum=" . ($pageNum + 1). "'><i class='material-icons'>chevron_right</i></a></li>
                ";
                }
                }
            ?>
			</ul>
		</div>
	</div>
	<!-- div.container end --> 
</main>
<div class="fixed-action-btn hide-on-large-only">
	<a href="./upload.php" class="btn-floating btn-large orange"><i class="large material-icons">photo_camera</i></a>
</div>

<!--
<footer class="page-footer orange darken-2">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="white-text">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="white-text" href="#!">Link 1</a></li>
          <li><a class="white-text" href="#!">Link 2</a></li>
          <li><a class="white-text" href="#!">Link 3</a></li>
          <li><a class="white-text" href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container center">
      <span class="white-text">Made by PI12A S.OOTO</span>
    </div>
  </div>
</footer>
-->

</body>
</html>