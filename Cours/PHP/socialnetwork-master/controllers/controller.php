<?php

$action = $_GET["action"] ?? "display";

switch ($action) {

  case 'register':
    header('Location: /socialnetwork-master/views/RegisterForm.php');
    break;

  case 'logout':
    if (isset($_SESSION['userId'])) {
      unset($_SESSION['userId']);
    }
    header('Location: ?action=display');
    break;

  case 'login':
    include "../models/UserManager.php";
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $userId = GetUserIdFromUserAndPassword($_POST['username'], $_POST['password']);
      if ($userId > 0) {
        $_SESSION['userId'] = $userId;
        header('Location: ?action=display');
      } else {
        $errorMsg = "Wrong login and/or password.";
        include "../views/LoginForm.php";
      }
    } else {
      include "../views/LoginForm.php";
    }
    break;

  case 'newMsg':
    case 'newMsg':
      include "../models/PostManager.php";
      if (isset($_SESSION['userId']) && isset($_POST['msg'])) {
        CreateNewPost($_SESSION['userId'], $_POST['msg']);
      }
      header('Location: ?action=display');
      break;

  case 'newComment':
    // code...
    break;

  case 'display':
  default:
    include "../models/PostManager.php";
    if (isset($_GET['search'])) {
      $posts = SearchInPosts($_GET['search']);
    } else {
      $posts = GetAllPosts();
    }

    include "../models/CommentManager.php";
    $comments = array();

    foreach ($posts as $onePost) {
      $postId = $onePost['id'];
      $allCommentsForThisPost = GetAllCommentsFromPostId($postId);
      $comments[$postId] = $allCommentsForThisPost;
    }

    include "../views/DisplayPosts.php";
    break;
}
