<?php

namespace App\Http\Controllers\Admin;

use App\Models\Computer;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminComputerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('admin.computer.index.title');
        $viewData["computers"] = Computer::all();
        $viewData["categories"] = Category::all();
        return view('admin.computer.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Computer::validate($request);

        $newComputer = new Computer();
        $newComputer->setName($request->input('name'));
        $newComputer->setCpu($request->input('cpu'));
        $newComputer->setRam($request->input('ram'));
        $newComputer->setGpu($request->input('gpu'));
        $newComputer->setStorage($request->input('storage'));
        $newComputer->setPrice($request->input('price'));
        $newComputer->setImage("game.png");
        $newComputer->save();

        if ($request->has('image')) {
            $imageName = $newComputer->getId() . "." . $request->file('image')->extension();
            $newComputer->setImage($imageName);
            $request->image->move(public_path('images'), $imageName);
        }
        $newComputer->save();

        $categories = $request->input('categories');
        foreach ($categories as $category) {
            $categoryObj = Category::where('name', $category);
            $newComputer->categories()->attach($categoryObj->get('id'));
            // $categoryObj->computers()->attach($computer->get('id'));
        }
        $newComputer->save();

        return back();
    }

    public function delete($id)
    {
        Computer::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = __('admin.computer.edit.title');
        $viewData["computer"] = Computer::findOrFail($id);
        $viewData["categories"] = Category::all();

        return view('admin.computer.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Computer::validate($request);

        $computer = Computer::findOrFail($id);
        $computer->setName($request->input('name'));
        $computer->setCpu($request->input('cpu'));
        $computer->setRam($request->input('ram'));
        $computer->setGpu($request->input('gpu'));
        $computer->setStorage($request->input('storage'));
        $computer->setPrice($request->input('price'));
        $computer->save();

        if ($request->has('image')) {
            $imageName = $computer->getId() . "." . $request->file('image')->extension();
            $computer->setImage($imageName);
            $request->image->move(public_path('images'), $imageName);
        }
        $computer->save();

        $categories = $request->input('categories');
        foreach ($categories as $category) {
            $categoryObj = Category::where('name', $category);
            $computer->categories()->attach($categoryObj->get('id'));
            // $categoryObj->computers()->attach($computer->get('id'));
        }
        $computer->save();

        return redirect()->route('admin.computer.index');
    }
}
