<?php

declare(strict_types=1);

namespace App\Query;

class RealEstateCreateQuery
{
    private int $user_id;
    private string $property_title;
    private string $property_description;
    private ?string $content;
    private float $property_price;
    private int $property_bathrooms;
    private int $property_rooms;
    private int $property_area;
    private int $property_total_area;
    private string $slug;

    public function __construct()
    {
    }


    /**
     * @return string
     */
    public function getPropertyDescription(): string
    {
        return $this->property_description;
    }

    /**
     * @param string $property_description
     */
    public function setPropertyDescription(string $property_description): void
    {
        $this->property_description = $property_description;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getPropertyTitle(): string
    {
        return $this->property_title;
    }

    /**
     * @param string $property_title
     */
    public function setPropertyTitle(string $property_title): void
    {
        $this->property_title = $property_title;
    }

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
    public function getPropertyBathrooms(): int
    {
        return $this->property_bathrooms;
    }

    /**
     * @param int $property_bathrooms
     */
    public function setPropertyBathrooms(int $property_bathrooms): void
    {
        $this->property_bathrooms = $property_bathrooms;
    }

    /**
     * @return int
     */
    public function getPropertyRooms(): int
    {
        return $this->property_rooms;
    }

    /**
     * @param int $property_rooms
     */
    public function setPropertyRooms(int $property_rooms): void
    {
        $this->property_rooms = $property_rooms;
    }

    /**
     * @return int
     */
    public function getPropertyArea(): int
    {
        return $this->property_area;
    }

    /**
     * @param int $property_area
     */
    public function setPropertyArea(int $property_area): void
    {
        $this->property_area = $property_area;
    }

    /**
     * @return int
     */
    public function getPropertyTotalArea(): int
    {
        return $this->property_total_area;
    }

    /**
     * @param int $property_total_area
     */
    public function setPropertyTotalArea(int $property_total_area): void
    {
        $this->property_total_area = $property_total_area;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return float
     */
    public function getPropertyPrice(): float
    {
        return $this->property_price;
    }

    /**
     * @param float $property_price
     */
    public function setPropertyPrice(float $property_price): void
    {
        $this->property_price = $property_price;
    }

}
