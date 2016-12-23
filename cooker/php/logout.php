<?php
require_once('secureFunc.php');
require_logined_session();

// セッション用Cookieの破棄
setcookie(session_name(), '', 1);
// セッションファイルの破棄
session_destroy();
// ログアウト完了後にトップに遷移
header('Location: ../');
?>