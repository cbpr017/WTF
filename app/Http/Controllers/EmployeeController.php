<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

use View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$employees = Employee::all();
		return View::make('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$employees = Employee::all();
		return View::make('employees.create')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// Confirm Both Fields Are Not Empty
		$this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
		]);
		
        //Add a new employee using the request data
		
		//$employee = new Employee;
		$employees = new Employee;
		$employees->first_name = request('first_name');
		$employees->last_name = request('last_name');
		$employees->position = request('position');
		$employees->salary = request('salary');
		$employees->hire_date = request('hire_date');
		//$employee->attach = request('attach');
		
		
		//Save it to the database
		
		$employees->save();
		
		//And then redirect back to the Employees page
		
		//return redirect('/employees.index');
		return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$employees = Employee::where('id', $id)->first();
		return view('employees.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
	   
	$employee = Employee::findOrFail($id);
		$employee->first_name = request('first_name');
		$employee->last_name = request('last_name');
		$employee->position = request('position');
		$employee->salary = request('salary');
		$employee->hire_date = request('hire_date');
	
    $employee->update();
    return redirect('employees')->with('message', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$employee = Employee::find($id);
		
		$destroysignal = $employee->delete();
		
		if($destroysignal) {
			return redirect('employees');
		}

    }
}
