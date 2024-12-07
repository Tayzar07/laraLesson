<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // validation
        $this->vali($request);
        $data = $this->dataArrange($request);

        if ($request->hasFile('image')) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/studentImage', $imageName);
            $data['image'] = $imageName;
        }

        Register::create($data);

        return redirect()->route('login')->with(['success' => 'Registeration success..']);
    }

    public function list()
    {
        $list = Register::paginate(5);
        return view('list', compact('list'));
    }

    public function edit($id)
    {
        $editdata = Register::where('id', $id)->first();
        return view('edit', compact('editdata'));
    }


    public function update(Request $request)
    {
        // validation
        $this->vali($request);
        $data = $this->dataArrange($request);
        if ($request->hasFile('image')) {

            $dbImage = Register::where('id', $request->id)->value('image');
            if ($dbImage != Null) {
                Storage::delete('public/studentImage/' . $dbImage);
            }
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/studentImage', $imageName);
            $data['image'] = $imageName;
        }
        Register::where('id', $request->id)->update($data);
        return back()->with(['success' => 'student profile is updated successfully..']);
    }

    public function delete($id)
    {
        $dbImage = Register::where('id', $id)->value('image');
        if ($dbImage != Null) {
            Storage::delete('public/studentImage/' . $dbImage);
        }
        Register::where('id', $id)->delete();
        return back()->with(['delete' => 'student profile is deleted...']);
    }

    public function deleteall()
    {
        Storage::deleteDirectory('public/studentImage');
        Register::truncate();
        return redirect()->route('admin.stu.list')->with(['deleteall' => 'All Data are deleted...']);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $list = Register::where(function ($query) use ($search) {
            $query->where('name','like', "%$search%")
                ->orWhere('age','like', "%$search%")
                ->orWhere('address','like', "%$search%");
        })->paginate(5);
        return view('list',compact('list','search'));
    }

    private function dataArrange($request)
    {
        return [
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'address' => $request->address
        ];
    }

    private function vali($request)
    {
        $rules = [
            'name' => 'required | string',
            'age' => 'required | integer',
            'email' => 'required | email',
            'image' => 'mimes:jpeg,jpg,png'
        ];
        $messages = [
            'name.required' => 'Please enter your name..',
            'age.required' => 'Please enter your age..',
            'age.integer' => 'Please enter number only..',
            'email.required' => 'Please enter your email..',
            'email.email' => 'Please enter correct email format..',
            'image.mimes' => 'Only jpeg, jpg and png formats are allowed..'
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
    }
}
