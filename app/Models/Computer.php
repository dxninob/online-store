<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Computer extends Model
{
    /**
     * COMPUTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the computer primary key (id)
     * $this->attributes['name'] - string - contains the computer name
     * $this->attributes['cpu'] - string - contains the computer procesor
     * $this->attributes['ram'] - int - contains the computer RAM
     * $this->attributes['gpu'] - string - contains the computer graphics card
     * $this->attributes['storage'] - int - contains the computer storage
     * $this->attributes['image'] - string - contains the computer image
     * $this->attributes['price'] - int - contains the computer price
     * $this->attributes['created_at'] - timestamp - contains the computer creation date
     * $this->attributes['updated_at'] - timestamp - contains the computer update date
     * $this->items - Item[] - contains the associated items
     * $this->attributes['categories'] - Category[] - contains the associated categories
     */

    protected $table = 'computers';

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "cpu" => "required",
            "ram" => "required|numeric",
            "gpu" => "required",
            "storage" => "required|numeric",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);
    }

    public static function sumPricesByQuantities($computers, $computersInSession)
    {
        $total = 0;
        foreach ($computers as $computer) {
            $total = $total + ($computer->getPrice() * $computersInSession[$computer->getId()]);
        }

        return $total;
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

    public function getCpu()
    {
        return $this->attributes['cpu'];
    }

    public function setCpu($cpu)
    {
        $this->attributes['cpu'] = $cpu;
    }

    public function getRam()
    {
        return $this->attributes['ram'];
    }

    public function setRam($ram)
    {
        $this->attributes['ram'] = $ram;
    }

    public function getGpu()
    {
        return $this->attributes['gpu'];
    }

    public function setGpu($gpu)
    {
        $this->attributes['gpu'] = $gpu;
    }

    public function getStorage()
    {
        return $this->attributes['storage'];
    }

    public function setStorage($storage)
    {
        $this->attributes['storage'] = $storage;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
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

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'computer_category');
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
}
