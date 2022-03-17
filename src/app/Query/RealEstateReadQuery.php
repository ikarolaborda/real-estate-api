<?php

declare(strict_types=1);

namespace App\Query;

class RealEstateReadQuery
{
    private int $user_id;
    private int $property_id;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getPropertyId(): int
    {
        return $this->property_id;
    }

    /**
     * @param int $property_id
     */
    public function setPropertyId(int $property_id): void
    {
        $this->property_id = $property_id;
    }
}
