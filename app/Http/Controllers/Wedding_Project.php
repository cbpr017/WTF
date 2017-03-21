<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wedding;

class Wedding_Project extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('wedding');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
	
	 public function search()
    {
				//
				  // Sets the parameters from the get request to the variables.
				$name = Request::get('project_name)');

				// Perform the query using Query Builder
				$result = DB::table('wedding_projects')
					->select(DB::raw("*"))
					->where('wedding_projects', '=', $name)
					->get();

				return $result;
		
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
        'project_name' => 'required',
        'task_name' => 'required',
		'task_description' => 'required',
		]);
		
		
		$project = new Wedding;
		$project->project_name = request('project_name');
		$project->task_name = request('task_name');
		$project->task_description = request('task_description');
		//Save it to the database
		
		$project->save();
		
		//And then redirect back to the Employees page
		
		return redirect('/wedding');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$project = Wedding::find($id);
		
		$destroysignal = $project->delete();
		
		if($destroysignal) {
			return redirect('wedding');
		}

    }
}
