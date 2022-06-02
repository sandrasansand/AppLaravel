<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class LessonResources extends Component
{
    use WithFileUploads;

    public $lesson, $file;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }
    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required'
        ]);

        $url = $this->file->store('resources');
        $this->lesson->resource()->create([
            'url' => $url
        ]);
        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function destroy()
    {
        Storage::delete($this->lesson->resource->url); //carpeta /resources
        $this->lesson->resource->delete(); //bd

        $this->lesson = Lesson::find($this->lesson->id); //refresh info
    }

    public function download()
    {
        return response()->download(storage_path('app/' . $this->lesson->resource->url));
    }
}
