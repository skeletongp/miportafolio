<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProjectController extends Controller
{
   use WithFileUploads;
   use WithPagination;
   public function index()
   {

      $projects = [];
      $show = [];
      if (Project::all()->count()) {

         $projects = Project::where('is_active',1)->paginate(8);
      }
      $skills =Skill::whereIn('category_id', [1,2])->get();
      $slug = "";
      return view('project.index', compact('projects',  'slug', 'skills'));
   }
   public function project_show(Project $project)
   {

      $skills = Category::find(2)->skills;
      $slug = "";
      return view('project.show', compact('project', 'slug', 'skills'));
   }
   public function project_insert()
   {
      return view('project.insert');
   }

   public function project_update(Project $project)
   {
      return view('project.update', compact("project"));
   }

   public $rules = [
      "shortname" => 'required|max:100',
      "longname" => 'required|max:255',
      "description" => 'required',
      "slug" => 'required|max:85',
      "link" => 'required|url',
      "image" => "required"
   ];
   public $rules2 = [
      "shortname" => 'required|max:100',
      "longname" => 'required|max:255',
      "description" => 'required',
      "slug" => 'required|max:85',
      "link" => 'required|url',
   ];
   /* Permite ingresar un nuevo proyecto */
   public function project_store(Request $request)
   {

      $this->validate($request, $this->rules);
      if ($request->hasFile('image')) {
         $originName = $request->file('image')->getClientOriginalName();
         $fileName = pathinfo($originName, PATHINFO_FILENAME);
         $extension = $request->file('image')->getClientOriginalExtension();
         $fileName = $fileName . '_' . time() . '.' . $extension;
         $request->file('image')->move(public_path('images'), $fileName);
         $url = asset('images/' . $fileName);
         $values = $request->all();
         $values['image'] = $url;
      }
      $project = new Project();
      $project->shortname = $values['shortname'];
      $project->longname = $values['longname'];
      $project->slug = $values['slug'];
      $project->description = $values['description'];
      $project->is_active = 1;
      $project->image = $values['image'];
      $project->link = $values['link'];

      if ($project->save()) {

         if ($request->hasFile('extra')) {
            $cant = count($request->file('extra'));
            for ($i = 0; $i < $cant; $i++) {
               $originName = $request->file('extra')[$i]->getClientOriginalName();
               $fileName = pathinfo($originName, PATHINFO_FILENAME);
               $extension = $request->file('extra')[$i]->getClientOriginalExtension();
               $fileName = $fileName . '_' . time() . '.' . $extension;
               $request->file('extra')[$i]->move(public_path('images'), $fileName);
               $url = asset('images/' . $fileName);
               $image = new Image();
               $image->url = $url;
               $image->alt = $originName;
               $image->project_id = $project->id;
               $image->save();
            }
         }
      }

      return redirect()->route('projects');
   }
   /* Permite ingresar un nuevo proyecto */
   public function project_edit(Project $project, Request $request)
   {

      $this->validate($request, $this->rules2);
      
      $values = $request->all();
      $project->shortname = $values['shortname'];
      $project->longname = $values['longname'];
      $project->slug = $values['slug'];
      $project->description = $values['description'];
      $project->is_active = 1;
      $project->link = $values['link'];
      $project->save();
      

      return redirect()->route('projects');
   }
}
