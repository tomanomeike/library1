<?php
namespace App\Repositories;
use App\Author;
class AuthorRepository
{
    public function paginate($pageSize)
    {
        return Author::orderBy('id', 'desc')->paginate($pageSize);
    }
}
