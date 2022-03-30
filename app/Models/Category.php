<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Computer;

class Category extends Model
{
    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->attributes['description'] - string - contains the category description
     * $this->itemsComputerCategory - ComputerCategory[] - contains the associated ComputerCategory items
     */

    protected $table = 'categories';

    public static function validate($request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required"
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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function itemsComputerCategory()
    {
        return $this->belongsToMany(Computer::class, 'computer_category');
    }

    public function getItemsComputerCategory()
    {
        return $this->itemsComputerCategory;
    }

    public function setItemsComputerCategory($itemsComputerCategory)
    {
        $this->itemsComputerCategory = $itemsComputerCategory;
    }
}
