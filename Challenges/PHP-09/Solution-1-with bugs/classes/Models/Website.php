<?php

namespace WebsiteBuilder\Classes\Models;

class Website
{
    private int $website_id;
    private string $coverImg;
    private string $mainTitle;
    private string $subtitle;
    private string $about;
    private string $phone;
    private string $location;
    private bool $providing;
    private int $description_id;
    private int $contact_id;


    public function __construct(int $website_id, string $coverImg, string $mainTitle, string $subtitle, string $about, string $phone, string $location, bool $providing, int $description_id, int $contact_id)
    {
        $this->website_id = $website_id;
        $this->coverImg = $coverImg;
        $this->mainTitle = $mainTitle;
        $this->subtitle = $subtitle;
        $this->about = $about;
        $this->phone = $phone;
        $this->location = $location;
        $this->providing = $providing;
        $this->description_id = $description_id;
        $this->contact_id = $contact_id;
    }

    // Setters
    public function setCoverImg(string $coverImg): void
    {
        $this->coverImg = $coverImg;
    }

    public function setMainTitle(string $mainTitle): void
    {
        $this->mainTitle = $mainTitle;
    }

    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }

    public function setAbout(string $about): void
    {
        $this->about = $about;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function setProviding(bool $providing): void
    {
        $this->providing = $providing;
    }

    // Getters
    public function getWebsiteId(): int
    {
        return $this->website_id;
    }

    public function getCoverImg(): string
    {
        return $this->coverImg;
    }

    public function getMainTitle(): string
    {
        return $this->mainTitle;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function getAbout(): string
    {
        return $this->about;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function isProviding(): bool
    {
        return $this->providing;
    }

    public function getDescriptionId(): int
    {
        return $this->description_id;
    }

    public function getContactId(): int
    {
        return $this->contact_id;
    }
}
