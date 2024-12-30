<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\Course;
use Auth;
class Init extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.course.init',[
            'courses' => $this->getCourses()
        ]);
    }

    public function getCourses(){
        $courses = Course::where('user_id', Auth::user()->id)->orderBy('created_at','desc');
        if(!is_null($this->search)){
            $courses->where('title', 'LIKE', '%' . $this->search . '%');
        }
        return $courses->get();
    }
}