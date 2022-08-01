<?php

if (isset($_GET['id']) and Permission::getInstance()->verifPerm('PermsForum', 'moderation', 'seeSignalement')) {
    $id = htmlspecialchars($_GET['id']);
    $update = $bddConnection->prepare('UPDATE cmw_forum_report SET vu = 1 WHERE id_topic_answer = :id AND type = 0');
    $update->execute(array(
        'id' => $id
    ));
    header('Location: index.php?page=post&id=' . $id);
    exit();
} else {
    header('Location: index.php?page=erreur&erreur=0');
    exit();
}


?>