<?php

namespace App;

use App\Exception\ForbiddenException;
use PDO;

class Auth
{

    private $pdo;
    private $loginPath;
    private $session;

    public function __construct(PDO $pdo, string $loginPath, array &$session)
    {
        $this->pdo = $pdo;
        $this->loginPath = $loginPath;
        $this->session = &$session;
    }

    public function user(): ?User
    {

        $id =  $this->session['auth'] ?? null;
        if ($id === null) {
            return null;
        }
        $query = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);
        //$query->setFetchMode(PDO::FETCH_CLASS, User::class);
        //$user = $query->fetch();
        $user = $query->fetchObject(User::class);
        return $user ?: null;
    }

    public function requireRole(string ...$roles): void
    {
        $user = $this->user();
        if ($user === null || !in_array($user->role, $roles)) {
            //throw new ForbiddenException("Vous devez etre connecté pour voir cette page");
            header("Location: {$this->loginPath}?forbid=1");
            exit();
        }
        /*
        if(!in_array($user->role, $roles))  {
            $roles = implode(',', $roles);
            $role = $user->role;
            throw new ForbiddenException("Vous avez pas le role suffisant \"$role\" (attendu: $roles)");

        }
        */
    }

    public function login(string $username, string $password): ?User
    {
        //trouver l'utilisateur correspndant au username
        $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute(['username' => $username]);
        //$query->setFetchMode(PDO::FETCH_CLASS, User::class);
        //$user = $query->fetch();
        $user = $query->fetchObject(User::class);

        if ($user === false) {
            return null;
        }

        //verifier que l'utilisateur correspond
        if (password_verify($password, $user->password)) {

            $this->session['auth'] = $user->id;
            return $user;
        }
        return null;
    }
}
