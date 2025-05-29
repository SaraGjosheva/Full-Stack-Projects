<?php

namespace WebsiteBuilder\Classes\Models;

class Contact
{
    private int $contact_id;
    private string $description;
    private string $linkedin;
    private string $facebook;
    private string $twitter;
    private string $google;


    public function __construct(int $contact_id, string $description, string $linkedin, string $facebook, string $twitter, string $google)
    {
        $this->contact_id = $contact_id;
        $this->description = $description;
        $this->linkedin = $linkedin;
        $this->facebook = $facebook;
        $this->twitter = $twitter;
        $this->google = $google;
    }

    // Setters
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setLinkedin(string $linkedin): void
    {
        $this->linkedin = $linkedin;
    }

    public function setFacebook(string $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    public function setGoogle(string $google): void
    {
        $this->google = $google;
    }

    // Getters
    public function getContactId(): int
    {
        return $this->contact_id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLinkedin(): string
    {
        return $this->linkedin;
    }

    public function getFacebook(): string
    {
        return $this->facebook;
    }

    public function getTwitter(): string
    {
        return $this->twitter;
    }

    public function getGoogle(): string
    {
        return $this->google;
    }
}
