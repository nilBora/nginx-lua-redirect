<?php
namespace Jtrw\Redirect\Domain\Repository;

use Jtrw\DAO\DataAccessObject;
use Jtrw\DAO\DataAccessObjectInterface;
use Jtrw\DAO\ObjectPDOAdapter;

class RedirectRepository
{
    public const TABLE_NAME = "redirects";
    
    protected DataAccessObjectInterface $dataAccessObject;
    
    public function __construct(DataAccessObjectInterface $dataAccessObject)
    {
        $this->dataAccessObject = $dataAccessObject;
    }
    
    public function get(string $code): ?string
    {
        $sql = "SELECT link FROM ".static::TABLE_NAME;
        $search = [
            'code' => $code
        ];
        $result =  $this->dataAccessObject->select($sql, $search, [], ObjectPDOAdapter::FETCH_ROW);
        
        return $result['link'];
    }
}