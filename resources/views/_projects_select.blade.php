<div class="mb-3">
    <label for="project_id">Проект</label>
    <select name="project_id" id="project_id">
        <option value="">Не определено</option>
        @foreach($projects as $project)
            <option value="{{ $project->id}}">{{ $project->title}}</option>
        @endforeach
    </select>
</div>