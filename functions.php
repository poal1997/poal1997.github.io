<?php 

$link = mysqli_connect('localhost','root','','my_first_blog');
if(mysqli_connect_errno())
{
    echo 'Ошибка в подключении к БД ('. mysqli_connect_errno().'): '. mysqli_connect_error();
    exit();
}


function get_categories()
{
    global $link;

    $sql = "SELECT * FROM categories";
    
    $result = mysqli_query($link, $sql);

    $categories = mysqli_fetch_all($result, 1);
    
    return $categories;

}

function get_posts()
{
    global $link;
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($link, $sql);
    $posts = mysqli_fetch_all($result, 1);
    return $posts;
}

function get_post_by_id($post_id)
{
    global $link;
    $sql = "SELECT * FROM posts WHERE id = ".$post_id;
    $result = mysqli_query($link, $sql);
    $post = mysqli_fetch_assoc ($result);
    return $post;
}