<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with('technologies', 'user', 'type')->paginate(10);

        return response()->json($projects);
    }

    public function show($id){
        $project = Project::with('technologies', 'user', 'type')->findOrFail($id);

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
