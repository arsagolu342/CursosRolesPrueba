<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\Course;
use App\Models\Video;
use Auth;
class View extends Component
{
    public $videos, $course;
    public function render()
    {
        // dd($this->videos);
        return view('livewire.course.view');
    }
    public function mount($id){
        $this->videos = Video::where('course_id',$id)->get();
        $this->course = Course::find($id);
    }
}