<?php

namespace App\Livewire;

use App\Http\Controllers\Api\CourseController;
use App\Models\Category;
use App\Models\CourseUser;
use Livewire\Component;
use App\Models\Ages;
use Auth;
class Dashboard extends Component
{
    public $categories, $category, $search, $ages, $age, $controller;

    public function render()
    {
        return view('livewire.dashboard', [
            'courses' => $this->getCourses()
        ]);
    }

    public function mount()
    {
        $this->categories = Category::where('type', 0)->orderBy('name', direction: 'asc')->get(); // Convert to array
        $this->ages = Ages::get();
    }

    public function getCourses()
    {
        try {
            $controller = new CourseController();

            // Pass categories and ages as array values
            $payload = [
                'categories' => $this->category ? $this->category : '', // Default to empty array if null
                'ages' => $this->age ? $this->age : '', // Default to empty array if null
                'search' => $this->search ?? '' // Default search to empty string if null
            ];

            $response = $controller->getCourses($payload);

            $data = json_decode($response->content());

            if ($data->code === 200) {
                return $data->data;
            } else {
                // Handle error message
                // $this->dispatch('info',  $data->message);
            }

        } catch (\Exception $e) {
            // Handle exception
            // $this->dispatch('info', $e->getMessage());
        }
    }
    public function register($id){
        try {
            $new = new CourseUser;
            $new->course_id = $id;
            $new->user_id = Auth::user()->id;
            $new->status  = 0;
            $new->save();
            $this->dispatch('success');
            $this->redirect('student');
        } catch (\Exception $th) {
            $this->dispatch('message', $th->getMessage());
        }


   }
}