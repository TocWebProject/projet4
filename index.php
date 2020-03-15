<?php
require('src/Models/model.php');

$posts = getPosts();

require('src/Views/viewAllArticles.php');