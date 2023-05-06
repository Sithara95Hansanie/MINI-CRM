<?php

namespace App\Repositories;

use App\Base\BaseRepository;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository extends BaseRepository
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }
}
