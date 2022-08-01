﻿<?php
$id = (int)htmlspecialchars($_POST['id']);
require('modele/app/ckeditor.class.php');
$message = ckeditor::verif($_POST['message']);

require_once('modele/support/postCommentaire.class.php');
$post = new PostCommentaireTicket($bddConnection);
$req_infosTicket = $post->GetInfosTicket($id);
$infosTicket = $req_infosTicket->fetch(PDO::FETCH_ASSOC);

if ($infosTicket['auteur'] == $_Joueur_['pseudo'] and $infosTicket['ticketDisplay'] == 1 or Permission::getInstance()->verifPerm('PermsDefault', 'support', 'displayTicket')) {
    $post->AddCommentaireTicket($id, $message, $_Joueur_['pseudo']);
} elseif ($ticketDisplay == 0) {
    $post->AddCommentaireTicket($id, $message, $_Joueur_['pseudo']);
}
?>