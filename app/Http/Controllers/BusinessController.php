<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Type;


class BusinessController extends Controller
{
    public function services()
    {
        $type1 = [];
        $type2 = [];
        $type3 = [];
        if (Type::all()->count()) {
            $type1 = Type::find(1);
            $type2 = Type::find(2);
            $type3 = Type::find(3);
        }
        $services = [];
        $show = [];
        if (Service::all()->count()) {
            $services = Service::paginate(6);
            $show = Service::all()->random();
        }

        $slug = "";
        return view('business.services', compact('type1', 'type2', 'type3', 'services', 'show', 'slug'));
    }

    public function services_search(Type $type)
    {
        $type1 = Type::find(1);
        $type2 = Type::find(2);
        $type3 = Type::find(3);
        $services = $type->services()->paginate(6);
        $show = $type->services->all()[0];
        $categoria = $type->title;
        $slug = $type->slug;
        return view('business.services', compact('type1', 'type2', 'type3', 'services', 'show', 'categoria', 'slug'));
    }
    public function services_show(Service $show)
    {
        $type1 = Type::find(1);
        $type2 = Type::find(2);
        $type3 = Type::find(3);
        $services = Service::paginate(6);
        $slug = "";

        return view('business.services', compact('type1', 'type2', 'type3', 'services', 'show', 'slug'));
    }
    public function newservice()
    {
        $types = Type::all();
        return view('business.newservice', compact('types'));
    }
    public $service_rules = [
        'title' => 'required|max:50',
        'slug' => 'required',
        'description' => 'required|max:225',
        'image' => 'required',
        'price' => 'required',
        'type_id' => 'required',
    ];

    public function services_store(Request $request)
    {
        $this->validate($request, $this->service_rules);
        $reg = Service::where('title', 'like', '%' . $request->title . '%');
        if ($reg->count()) {
            $request->session()->flash('error', 'Este servicio ya está registrado');
            return redirect()->route('newservice');
        } else {
            if ($request->hasFile('image')) {
                $originName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                $request->file('image')->move(public_path('images'), $fileName);
                $url = asset('images/' . $fileName);
                $values = $request->all();
                $values['image'] = $url;
                $service = new Service();
                $service->title = $values['title'];
                $service->slug = $values['slug'];
                $service->description = $values['description'];
                $service->price = $values['price'];
                $service->type_id = $values['type_id'];
                $service->image = $values['image'];
            }
            if ($service->save()) {
                return redirect() > route('services_show', ['show' => $service->slug]);
            } else {
                return redirect()->route('services');
            }
        }
    }
    public function newskill($cat_id)
    {
        $categories = Category::all();
        return view('business.newskill', compact('categories', 'cat_id'));
    }
    public $skill_rules = [
        'title' => 'required|max:40o',
        'image' => 'required',
        'category_id' => 'required',
        'level' => 'required',
    ];
    
    public function skills_store(Request $request)
    {
        $this->validate($request, $this->skill_rules);
        $reg = Skill::where('title', 'like', '%' . $request->title . '%');
        if ($reg->count()) {
            $request->session()->flash('error', 'Esta skill ya está registrada');
            return redirect()->route('newskill', ['category'=>$request->category_id]);
        } else {
            if ($request->hasFile('image')) {
                $originName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                $request->file('image')->move(public_path('images'), $fileName);
                $url = asset('images/' . $fileName);
                $values = $request->all();
                $values['image'] = $url;
                $skill = new Skill();
                $skill->title = $values['title'];
                $skill->level=$values['level'];
                $skill->category_id = $values['category_id'];
                $skill->image = $values['image'];
            }
            $skill->save();
           
        }
        $request->session()->flash('success', 'Skill registrada con éxito');
        return redirect()->route('newskill', ['category'=>$request->category_id]);

    }
}

