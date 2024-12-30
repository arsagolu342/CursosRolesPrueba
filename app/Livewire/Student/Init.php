<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\User;
use Auth;

class Init extends Component
{
    public function render()
    {
        return view('livewire.student.init',[
            'courses' => $this->getCourses(),
        ]);
    }
    public function getCourses(){
        $courses = Auth::user()->courses()->get();
        return $courses;
    }
}