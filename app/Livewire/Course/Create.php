<?php

namespace App\Livewire\Course;

use LivewireUI\Modal\ModalComponent;
use App\Models\Category;
use App\Models\Course;
use App\Models\Ages;
use Auth;
class Create extends ModalComponent
{
    public $categories, $ages, $age_id, $category_id, $title, $description;
    public function render()
    {
        return view('livewire.course.create');
    }

    public function mount()
    {
        $this->categories = Category::where('type', 0)->orderBy('name', 'asc')->get();
        $this->ages = Ages::all();
    }
    public function save(array $options = [])
    {
        $this->validate();
        try {
            $new = new Course();
            $new->title = $this->title;
            $new->description = $this->description;
            $new->category_id = $this->category_id;
            $new->user_id = Auth::user()->id;
            $new->age_id = $this->age_id;
            $new->save();
            if ($new->save()) {
                $this->dispatch('success');
                $this->closeModal();
            } else {
                $this->dispatch('warnig');
            }
        } catch (\Exception $th) {
            $this->dispatch('message', $th->getMessage());
        }
    }
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'age_id' => 'required',
        ];
    }
}