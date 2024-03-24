<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function listCategories(Request $request)
    {
        $pagi = true;
        $data = Category::paginate(10);

        if ($request->has('view_deleted')) {
            $data = Category::onlyTrashed()->get();
            $pagi = false;
        }

        return view('backend.category.list-categories', compact('data','pagi'));
    }

    public function addCategory()
    {
        return view('backend.category.add-category');
    }

    public function insertCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name field is required.',
        ]);

        // dd($request->all());
        $name = $request->name;

        $ctr = new Category();
        $ctr->name = $name;
        $insert = $ctr->save();

        if ($insert) {
            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-categories')->with($notification);
        }
    }

    public function editCategory($id)
    {
        $fetch = Category::where('id', '=', $id)->first();
        return view('backend.category.edit-category', compact('fetch'));
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name field is required.',
        ]);

        $id = $request->id;
        $name = $request->name;

        $update = Category::where('id', '=', $id)->update([
            'name' => $name
        ]);

        if ($update) {
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-categories')->with($notification);
        }
    }

    public function deleteCategory($id)
    {
        $del = Category::where('id', '=', $id)->delete();

        if ($del) {
            $notification = array(
                'message' => 'Category moved to Trash',
                'alert-type' => 'success'
            );
            return redirect()->route('list-categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-categories')->with($notification);
        }
    }

    public function restoreCategory($id)
    {
        $restore = Category::withTrashed()->find($id)->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Category restored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        }
    }

    public function restoreAllCategory()
    {
        $restore = Category::onlyTrashed()->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Restored All Trashed Categories',
                'alert-type' => 'success'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        }
    }

    public function forceDeleteCategory($id)
    {
        $fdelete = Category::where('id', '=', $id)->withTrashed()->forceDelete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        }
    }

    public function deleteAllCategory()
    {
        $delete_all = Category::onlyTrashed()->forceDelete();

        if ($delete_all) {
            $notification = array(
                'message' => 'Deleted All Trashed Categories',
                'alert-type' => 'success'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-categories', ['view_deleted' => 'DeletedCategories'])->with($notification);
        }
    }
}
