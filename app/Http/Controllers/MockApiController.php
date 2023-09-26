<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MockApiController extends Controller
{
    //data List
    public function index()
    {
        $response = Http::get('https://64a6189d00c3559aa9c057fa.mockapi.io/user');
        // You can convert the JSON response to an array using $response->json()
        $dataList = $response->json();
        return view('Mock_Api.data_list', ['dataList' => $dataList, 'userData' => $dataList]);
    }

    // createForm
    public function createForm()
    {
        return view('Mock_Api.create_data');
    }
    // createData
    public function createData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        // $response = Http::Post('https://64a6189d00c3559aa9c057fa.mockapi.io/user');

        $response = Http::post('https://64a6189d00c3559aa9c057fa.mockapi.io/user', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        if ($response->successful()) {
            return back()->with('success', 'User data created successfully');
        } else {
            return back()->with('error', 'Failed to create user data');
        }
    }

    // editForm
    public function editForm($id)
    {
        $response = Http::get('https://64a6189d00c3559aa9c057fa.mockapi.io/user/' . $id);
        // You can convert the JSON response to an array using $response->json()
        $dataList = $response->json();

        return view('Mock_Api.edit_data', ['dataList' => $dataList]);
    }
    //editData
    public function editData(Request $request, $id)
    {   // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            // Add validation rules for other fields as needed
        ]);

        // Retrieve the updated data from the form
        $updatedData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            // Retrieve and update other fields as needed
        ];

        // Make a PUT request to update the user data in the Mock API
        $response = Http::put('https://64a6189d00c3559aa9c057fa.mockapi.io/user/' . $id, $updatedData);

        if ($response->successful()) {
            return redirect('/user-datas')->with('success', 'User data updated successfully');
        } else {
            return back()->with('error', 'Failed to update user data');
        }
    }

    // // delete
    // public function delete($id)
    // {
    //     // Make a PUT request to update the user data in the Mock API
    //     $response = Http::delete('https://64a6189d00c3559aa9c057fa.mockapi.io/user/' . $id);

    //     if ($response->successful()) {
    //         return redirect('/user-datas')->with('success', 'User data Deleted successfully');
    //     } else {
    //         return back()->with('error', 'Failed to update user data');
    //     }
    // }



    public function delete($id)
    {
        // Make a DELETE request to remove the user data in the Mock API
        $response = Http::delete('https://64a6189d00c3559aa9c057fa.mockapi.io/user/' . $id);

        if ($response->successful()) {
            return redirect('/user-datas')->with('success', 'User data deleted successfully');
        } else {
            // Handle the case where the request fails (e.g., user not found)
            return redirect('/user-datas')->with('error', 'Failed to delete user data');
        }
    }
}
