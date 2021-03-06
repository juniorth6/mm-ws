<?php

namespace MMWS\Entity;

use MMWS\Model\Post;

/**
 * This is a default entity class
 * @ignore
 */
class PostEntity
{
    /**
     * @var Post $post post instance
     */
    private $post;

    function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Saves a post into the database
     * @return Bool
     */
    function save()
    {
        global $conn;
        
        $query = 'INSERT INTO `post` (name, content) values (?, ?)';

        $q = $conn->prepare($query);
        $q->bindParam(1, $this->post->name);
        $q->bindParam(1, $this->post->content);

        return !!perform_query_pdo($q);
    }
}
