<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'DESC')->paginate(10);
        return view('users.index', compact('employees'));
    }
    public function store(Request $request)
    {
        $user = new Employee();
        $user->name = $request->name;
        $user->employeeID = $request->employeeID;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->ssnit_number = $request->ssnit_number;
        $user->role = $request->role;
        $user->salary = $request->salary;
        $user->date = $request->date;

        $user->save();
        toastr()->success("Employee Added Successfully");
        return back();
    }
    public function update(Request $request, string $id)
    {
        Employee::where('id', $id)->update([
            'name' => $request->name,
            'employeeID' => $request->employeeID,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'ssnit_number' => $request->ssnit_number,
            'salary' => $request->salary,
        ]);

        toastr()->success('User updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::where('id', $id)->delete();
        if(Employee::count() < 1){
            Employee::truncate();
        }
        toastr()->success('User deleted successfully');

        return back();
    }
}
