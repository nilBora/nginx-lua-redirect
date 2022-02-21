<?php

namespace Jtrw\Redirect\Domain\Service;


use Jtrw\Redirect\Domain\Repository\RedirectRepository;
use Psr\SimpleCache\CacheInterface;

class Redirect
{
    protected RedirectRepository $redirectRepository;
    protected CacheInterface $cache;
    
    public function __construct(CacheInterface $cache, RedirectRepository $redirectRepository)
    {
        $this->cache = $cache;
        $this->redirectRepository = $redirectRepository;
    }
    
    public function doRedirect(string $code)
    {
        $redirectLink = $this->redirectRepository->get($code);
        if (!$redirectLink) {
            $this->redirect('/');
        }
        
        $this->addToCache($code, $redirectLink);
        
        $this->addStatistics();
        
        $this->redirect($redirectLink);
    }
    
    protected function redirect(string $redirectLink)
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$redirectLink);
        exit();
    }
    
    protected function addToCache(string $code, string $redirectLink)
    {
        $this->cache->set('redirect:'.$code, $redirectLink);
    }
    
    protected function addStatistics()
    {
        //..
    }
}