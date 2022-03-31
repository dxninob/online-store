<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Computer;
use App\Models\Category;

class ComputerCategory extends Model
{
    /**
     * COMPUTERCATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['category_id'] - int - contains the referenced category id
     * $this->attributes['computer_id'] - int - contains the referenced computer id
     * $this->attributes['created_at'] - timestamp - contains the item creation date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     * $this->category - Categroy - contains the associated Category
     * $this->computer - Computer - contains the associated Computer
     */

    protected $table = 'computer_category';

    public static function validate($request)
    {
        $request->validate([
            "computer_id" => "required|exists:computers,id",
            "category_id" => "required|exists:categories,id",
        ]);
    }
    
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getCategoryId()
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId($categoryId)
    {
        $this->attributes['category_id'] = $categoryId;
    }

    public function getComputerId()
    {
        return $this->attributes['computer_id'];
    }

    public function setComputerId($computerId)
    {
        $this->attributes['computer_id'] = $computerId;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
    
    public function getComputer()
    {
        return $this->computer;
    }

    public function setComputer($computer)
    {
        $this->computer = $computer;
    }
}
