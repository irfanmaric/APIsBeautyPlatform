<?php

namespace App\Service;

use App\Command\RegisterUserCommand;
use App\Models\Employees;
use App\Models\Reservation;
use App\Query\GetCompanyEmployeesQuery;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function registerUser(RegisterUserCommand $command)
    {
        Reservation::create([
            'DateTime' => $command->getDateTime(),
            'UserID' => $command->getUserId(),
            'treatmenttherapistID' => $command->getTherapistId()
        ]);
    }

    public function getCompanyEmployees(GetCompanyEmployeesQuery $query): Collection
    {
        return Employees::where('companyID', $query->getCompanyId())->get();
    }
}
