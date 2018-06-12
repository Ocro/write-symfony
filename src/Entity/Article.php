<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Utils\DataBaseDate;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @ORM\Table(name="article")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", name="posted_at")
     */
    private $postedAt;


    /**
     * ACCESSORS
     */

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getPostedAt()
    {
        return $this->postedAt;
    }

    public function setPostedAt($date)
    {
        $this->postedAt = new \DateTime("now");
    }
}
