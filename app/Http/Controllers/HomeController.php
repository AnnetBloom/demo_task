<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Project, ProjectArticle, ProjectUser};
use App\Http\Resources\ProjectResource;

class HomeController extends Controller
{

    public function project(Request $request, $id)
    {
        $project = Project::with('projectArticles', 'projectUsers')->find($id);
        return new ProjectResource($project);
    }
    public function article()
    {
        return view('article', ['projects' => $this->getProjects()]);
    }

    public function storeArticle(Request $request)
    {
        $validated = $this->validate($request,[
            'title' => 'required|string',
            'content' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'image' => 'nullable|file',
        ]);        
        $article = ProjectArticle::create($request->except(['image']));
        $article->save();       
        $project = Project::find($request->project_id);
        $project->projectArticles()->save($article);
        $this->saveMedia($request, $article);

        return redirect()->route('article.create')->with('status', 'Статья добавлена!');
    }

    public function user()
    {
        return view('user', ['projects' => $this->getProjects()]);
    }

    public function storeUser(Request $request)
    {
        $validated = $this->validate($request,[
            'headline' => 'required|string',
            'first_name' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'image' => 'nullable|file',
        ]); 
         
        $user = ProjectUser::create($request->except(['image']));
        $user->save();
        $project = Project::find($request->project_id);
        $project->projectUsers()->save($user);
        $this->saveMedia($request, $user);

        return redirect()->route('user.create')->with('status', 'Пользователь добавлен!');
    }

    public function saveMedia($request, $model)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $model->addMedia($request->file('image'))->toMediaCollection();
        }
    }

    public function getProjects()
    {
        return Project::all();
    }


}
