<?php

namespace App\Service;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class UserService {

    private $tokenStorage;

    private $currentUser;

    /**
    * @required
    */
    public function setSecurityContext(TokenStorageInterface $tokenStorage) {
        $token = $tokenStorage->getToken();
        if ($token) {
            $this->currentUser = $token->getUser();
        }
    }

    public function getCurrentUser() {
        return $this->currentUser;
    }
}

?>