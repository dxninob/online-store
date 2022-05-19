<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use App\Models\Computer;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class ComputerCategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_user_order()
    {
        $user = new User();
        $order = new Order();

        $user->orders[] = $order;
        $this->assertInstanceOf(Collection::class, $user->orders);
        $this->assertInstanceOf(Order::class, $user->orders[0]);

        $order->user = $user;
        $this->assertInstanceOf(User::class, $order->user);
    }

    public function test_order_item()
    {
        $order = new Order();
        $item = new Item();
      
        $order->items[] = $item;
        $this->assertInstanceOf(Collection::class, $order->items);
        $this->assertInstanceOf(Item::class, $order->items[0]);

        $item->order = $order;
        $this->assertInstanceOf(Order::class, $item->order);
    }

    public function test_item_computer()
    {
        $item = new Item();
        $computer = new Computer();

        $item->computer = $computer;
        $this->assertInstanceOf(Computer::class, $item->computer);

        $computer->items[] = $item;
        $this->assertInstanceOf(Collection::class, $computer->items);
        $this->assertInstanceOf(Item::class, $computer->items[0]);
    }

    public function test_computer_category()
    {
        $computer = new Computer();
        $category = new Category();

        $computer->categories[] = $category;
        $this->assertInstanceOf(Collection::class, $computer->categories);
        $this->assertInstanceOf(Category::class, $computer->categories[0]);

        $category->computers[] = $computer;
        $this->assertInstanceOf(Collection::class, $category->computers);
        $this->assertInstanceOf(Computer::class, $category->computers[0]);
    }
}