<?php
namespace Jtrw\Redirect\Domain\Repository;

use Jtrw\DAO\DataAccessObjectInterface;

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
        $result =  $this->dataAccessObject->select($sql, $search, [], DataAccessObjectInterface::FETCH_ROW)->toNative();
        
        return $result['link'] ?? null;
    }
}