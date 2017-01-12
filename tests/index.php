<?php
    use \WPEloquent\Core\Laravel;
    use \WPEloquent\Model\Post;
    use \WPEloquent\Model\Comment;
    use \WPEloquent\Model\User;
    use \WPEloquent\Model\Options;

    require_once('./../vendor/autoload.php');

    \WPEloquent\Core\Laravel::connect([
        'config' => [
            'database' => [
                'user'     => 'root',
                'password' => 'password',
                'name'     => 'trek',
                'host'     => '127.0.0.1'
            ],

            'prefix' => 'wp_'
        ],
    ]);
?>

<?php


    $user = User::find(2);

    echo '<pre>';

    echo '<h1>Users</h1>';

    print_r($user->getMeta('facebook'));

    echo '<hr />';

    print_r($user->toArray());

    echo '<hr />';

    echo '<h1>Posts</h1>';

    $post = Post::find(73240);

    print_r($post->terms->toArray());

    print_r($post->categories->toArray());

    print_r($post->tags->toArray());

    print_r($post->author->toArray());

    print_r(Laravel::queryLog());

    print_r($post->toArray());

    print_r($post->getMeta('post_background'));

    echo '<hr />';

    echo '<h1>Comments</h1>';

    print_r($post->comments()->with('meta')->get()->toArray());
    //
    $comment = Comment::find(21671);
    //
    print_r($comment->user);
    //

    echo '<hr />';

    echo '<h1>Options</h1>';

    print_r(Options::getValue('siteurl'));

    $testPost = Test\TestPost::find(73106);



    print_r($testPost->trails);
    echo '</pre>';

?>
