<?php

namespace App\Livewire\Course;

use LivewireUI\Modal\ModalComponent;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\CourseUser;
use App\Models\Video;
use DB;
class Students extends ModalComponent
{
    use WithPagination, WithoutUrlPagination;
    public $item, $total;
    public function render()
    {
        return view('livewire.course.students',[
            'students' => $this->students(),
        ]);
    }
    public function mount($item){
        $this->item = $item;
        $this->total = Video::where('course_id', $this->item['id'])->count();

    }
    public function students(){
        $students = CourseUser::select('course_user.user_id', 'course_user.status', \DB::raw('COUNT(progress.id) as progress_count'))
        ->leftJoin('progress', 'course_user.user_id', '=', 'progress.user_id')
        ->where('course_user.course_id', $this->item['id'])
        ->groupBy('course_user.user_id', 'course_user.status')
        ->with('user')  ;
        return $students->paginate(10);
    }
    public function save(){
        dd($this->students());
    }
}