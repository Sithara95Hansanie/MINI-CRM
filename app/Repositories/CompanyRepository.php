<?php

namespace App\Repositories;

use App\Base\BaseRepository;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends BaseRepository
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }
}
