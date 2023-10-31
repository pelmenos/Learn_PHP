<?php

return [
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayBye'],

    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/create$~' => [\MyProject\Controllers\ArticlesController::class, 'create'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'del'],

    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\CommentsController::class, 'create'],
    '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\CommentsController::class, 'edit'],

    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/logout$~' => [\MyProject\Controllers\UsersController::class, 'logout'],

    '~^admin/articles$~' => [\MyProject\Controllers\AdminsController::class, 'lastArticles'],
    '~^admin/comments$~' => [\MyProject\Controllers\AdminsController::class, 'lastComments'],
    '~^admin/articles/edit/(\d+)$~' => [\MyProject\Controllers\AdminsController::class, 'editArticles'],
    '~^admin/comments/edit/(\d+)$~' => [\MyProject\Controllers\AdminsController::class, 'editComments'],
    '~^admin$~' => [\MyProject\Controllers\AdminsController::class, 'view'],

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];