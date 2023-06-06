<?php

namespace App\Query;

class GetCompanyEmployeesQuery
{
    public function __construct(
        private int $companyId
    )
    {

    }

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }


}
