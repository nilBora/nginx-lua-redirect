<?php

namespace Jtrw\Redirect\Domain\Service;

use Jtrw\DAO\DataAccessObjectInterface;
use Jtrw\Redirect\Domain\Repository\RedirectRepository;

class Redirect
{
    protected RedirectRepository $redirectRepository;
    
    public function __construct(RedirectRepository $redirectRepository)
    {
        $this->redirectRepository = $redirectRepository;
    }
    
    public function doRedirect(string $code)
    {
        return $this->redirectRepository->get($code);
    }
}