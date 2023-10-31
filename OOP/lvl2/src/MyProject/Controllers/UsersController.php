<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ActivateException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UserActivationService;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Services\EmailSender;
use MyProject\View\View;

class UsersController extends AbstractController
{
    public function signUp(): void
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);

                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }
    public function activate(int $userId, string $activationCode): void
    {
        try {
            $user = User::getById($userId);
            if ($user === null) {
                throw new ActivateException('Нет такого пользователя');
            }
            if ($user->getIsConfirmed() == 1) {
                throw new ActivateException('Пользователь уже активирован');
            }

            $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
            if ($isCodeValid) {
                $user->activate();
                $user->clearCode($user, $activationCode);
                echo 'OK!';
            } else {
                throw new ActivateException('Код активации не верен');
            }
        } catch (ActivateException $e) {
            $this->view->renderHtml('errors/noId.php', ['error' => $e->getMessage()]);
            return;
        }
    }
    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /OOP/lvl2/www');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/login.php');
    }

    public function logout(): void
    {
        setcookie('token', '', 0, '/', '', false, true);
        header('Location: /OOP/lvl2/www/');
    }
}