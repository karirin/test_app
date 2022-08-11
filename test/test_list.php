<?php
$block = array();
$block = pagination_block($posts);

if (isset($block[0])) :
    foreach ($block[$_SESSION['page']] as $post) :
        $user = new User($post['user_id']);
        $post_user = $user->get_user();
?>
<div class="post">
    <a href="../test/test_disp.php?post_id=<?= $post['id'] ?>&user_id=<?= $current_user['id'] ?>" class="post_link">
        <div class="post_list">
            <div class="post_user">
                <object><a
                        href="../user/user_disp.php?user_id=<?= $current_user['id'] ?>&page_id=<?= $post_user['id'] ?>&type=main">
                        <img src="data:image/jpeg;base64,<?= $post_user['image'] ?>">
                        <?php print '' . $post_user['name'] . ''; ?>
                    </a></object>
            </div>
            <?php
                    if (!empty($post['image'])) :
                        print '<img src="data:image/jpeg;base64,' . $post['image'] . '" class="post_img" >';
                    endif;
                    ?>
            <div class="post_text ellipsis" id="post_text"><?php print '' . $post['text'] . ''; ?></div>
    </a>
    <p class="post_created_at"><?php print '' . convert_to_fuzzy_time($post['created_at']) . ''; ?></p>
</div>
</div>

<?php endforeach ?>
<?php endif ?>
<?php require('../pagination.php'); ?>