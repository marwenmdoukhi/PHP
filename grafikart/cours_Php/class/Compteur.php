<?php
namespace App;
class Compteur
{
    protected $path;
    public function __construct(string $path)
    {
        $this->path = $path;
    }

   
    function incrementer(): void
    {
        $compteur = 1;
        if (file_exists($this->path)) {
            $compteur = (int) file_get_contents($this->path);
            $compteur++;
        }
        file_put_contents($this->path, $compteur);
    }

    function recuperer(): int
    {
        if (!file_exists($this->path)) {
           return 0;
        }
        return file_get_contents($this->path);
    }
}
