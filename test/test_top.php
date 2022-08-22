<?php
require_once('../config_1.php');
$user = new User($_SESSION['user_id']);
if (isset($_GET['page_id']) && $_GET['page_id'] != 'current_user') {
    $user = new User($_GET['page_id']);
    $current_user = $user->get_user();
} else {
    $user = new User($_SESSION['user_id']);
    $current_user = $user->get_user();
}
$i = 0;
?>
<div class="row">
    <div class="col-3 center">
        <img src="data:image/jpeg;base64,<?= $current_user['image']; ?>" class="mypage">
        <h2><?= $current_user['name']; ?></h2>
    </div>
    <div class="col-9">
        <?php
        $post = new Post(0);
        $posts = $post->get_posts($current_user['id'], 'my_post', 0);
        ?>
        <h2><?= $current_user['name'] ?>さんの投稿</h2>
        <?php
        require('../test/test_list.php');
        ?>
        <?php
        $post = new Post(0);
        $posts = $post->get_posts($current_user['id'], 'testcase', 0);
        if ($current_user['id'] == $_SESSION['user_id']) :
        ?>
        <h2>テストケースを記載した投稿</h2>
        <?php
            require('../test/test_list_testcase.php');
            ?>
    </div>
    <?php endif; ?>
</div>
<?php
require('../footer.php');
?>