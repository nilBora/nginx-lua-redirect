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
        $redirectLink = $this->redirectRepository->get($code);
        if (!$redirectLink) {
            throw new \Exception("Code not found");
        }
        
        $this->addStatistics();
        
        $this->redirect($redirectLink);
    }
    
    protected function redirect(string $redirectLink)
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$redirectLink);
        exit();
    }
    
    protected function addStatistics()
    {
        //..
    }
}