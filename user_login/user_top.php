<?php 
require_once('../config.php');
require_once('../head.php'); 
require_once('../header.php');
?>
<body>
<?php if (isset($flash_messages)): ?>
      <?php foreach ((array)$flash_messages as $message): ?>
        <p class ="flash_message"><?= $message?></p>
      <?php endforeach ?>
<?php endif ?>
<?php

if (isset($_SESSION['id'])) {
  $current_user = get_user($_SESSION['id']);
}else{
  $current_user = 'guest';
}

if(isset($_SESSION['login'])==false)
{
print '<br />';
print 'ようこそ、coffeeappへ';
}
else
{
 require_once("../user/user_mypage.php");
}
?>

</body>
<?php require_once('../footer.php'); ?>
</html>
