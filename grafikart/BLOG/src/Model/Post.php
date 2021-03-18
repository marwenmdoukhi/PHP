<?php
namespace App\Model;
use \DateTime;
use App\Helpers\Text;

class Post {

    private $id;
    private $slug;
    private $name;
    private $content;
    private $created_at;
    private $image;
    private $oldImage;
    private $pendingUpload = false;
    private $categories = [];

    public function getName(): ?string {
        return $this->name;
    }
    public function getExcerpt(): ?string {
        if($this->content === null) {
            return null;
        }
        return nl2br(htmlentities(Text::excerpt($this->content, 60)));
    }

    public function getCreatedAt(): DateTime {
        return new DateTime($this->created_at);
    }
    
    public function getSlug(): ?string {
        return $this->slug;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getID(): ?int {
        return $this->id;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->created_at = $createdAt;
        return $this;
    }

/**
 * @return Category[]
 */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): self
    {
      $this->categories = $categories;
      return $this;
    }

    public function addCategory(Category $category): void
    {
        $this->categories[] = $category;
        $category->sedtPost($this);
    }

    public function getFormattedContent(): ?string{
        return nl2br(e($this->content));
    }
    public function getCategoriesIds(): array
    {
        $ids = [];
        foreach ($this->categories as $category) {
            $ids[] = $category->getID();
        }
        return $ids;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image):self
    {
        if (is_array($image) && !empty($image['tmp_name'])) {
            if (!empty($this->image)) {
               $this->oldImage = $this->image;
            }
            $this->pendingUpload = true;
            $this->image = $image['tmp_name'];
        }
        if (is_string($image) && !empty($image)) {
              $this->image = $image;
        }
        return $this;
    }

    public function shouldUpload(): bool {
        return $this->pendingUpload;
    }
    /**
     * Get the value of image
     */ 
    public function getImage(): ?string
    {
        return $this->image;
    }
    public function getImageURL(string $format): ?string{
        if (empty($this->image)) {
           return null;
        }
        return '/uploads/posts/' . $this->image . '_' . $format . '.jpg';
    }

    /**
     * Get the value of oldImage
     */ 
    public function getOldImage(): ?string
    {
        return $this->oldImage;
    }
}