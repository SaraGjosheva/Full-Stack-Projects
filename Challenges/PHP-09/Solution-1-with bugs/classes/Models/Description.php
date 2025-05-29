<?php

namespace WebsiteBuilder\Classes\Models;

class Description
{
    private int $description_id;
    private string $img1;
    private string $description1;
    private string $img2;
    private string $description2;
    private string $img3;
    private string $description3;

    public function __construct(int $description_id, string $img1, string $description1, string $img2, string $description2, string $img3, string $description3)
    {
        $this->description_id = $description_id;
        $this->img1 = $img1;
        $this->description1 = $description1;
        $this->img2 = $img2;
        $this->description2 = $description2;
        $this->img3 = $img3;
        $this->description3 = $description3;
    }

    // Setters
    public function setImg1(string $img1): void
    {
        $this->img1 = $img1;
    }

    public function setDescription1(string $description1): void
    {
        $this->description1 = $description1;
    }

    public function setImg2(string $img2): void
    {
        $this->img2 = $img2;
    }

    public function setDescription2(string $description2): void
    {
        $this->description2 = $description2;
    }

    public function setImg3(string $img3): void
    {
        $this->img3 = $img3;
    }

    public function setDescription3(string $description3): void
    {
        $this->description3 = $description3;
    }

    // Getters
    public function getDescriptionId(): int
    {
        return $this->description_id;
    }

    public function getImg1(): string
    {
        return $this->img1;
    }

    public function getDescription1(): string
    {
        return $this->description1;
    }

    public function getImg2(): string
    {
        return $this->img2;
    }

    public function getDescription2(): string
    {
        return $this->description2;
    }

    public function getImg3(): string
    {
        return $this->img3;
    }

    public function getDescription3(): string
    {
        return $this->description3;
    }
}
