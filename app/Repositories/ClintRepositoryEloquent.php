<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClintRepository;
use App\Models\Clint;
use App\Validators\ClintValidator;

/**
 * Class ClintRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ClintRepositoryEloquent extends BaseRepository implements ClintRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Clint::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
