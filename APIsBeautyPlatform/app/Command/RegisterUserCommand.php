<?php

namespace App\Command;

class RegisterUserCommand
{
    public function __construct(
        private int $userId,
        private \DateTime $dateTime,
        private int $therapistId
    ){}

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    /**
     * @return int
     */
    public function getTherapistId(): int
    {
        return $this->therapistId;
    }




}
