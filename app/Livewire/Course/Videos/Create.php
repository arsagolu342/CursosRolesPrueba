<?php

namespace App\Livewire\Course\Videos;

use LivewireUI\Modal\ModalComponent;
use App\models\Category;
use App\Models\Course;
use App\Models\Video;
class Create extends ModalComponent
{
    public $item,
        $videos = [],
        $category,
        $title,
        $description,
        $newVideo = ['url' => '', 'title' => '', 'description' => '', 'category_id' => ''];

    public function render()
    {
        return view('livewire.course.videos.create');
    }
    public function mount($item)
    {
        $this->item = $item;
        $this->title = $item['title'];
        $this->description = $item['description'];
        $this->category = Category::where('type', 1)->orderBy('name', 'asc')->get();
        $videos = Video::where('course_id',$item['id'])->get();
        if (!is_null($videos)) {
            foreach ($videos as $video) {
                $this->videos[] = [
                    'url' => $video->url,
                    'title' => $video->title,
                    'description' => $video->description,
                    'category_id' => $video->category_id,
                ];
            }
        }

    }
    public function addvideo()
    {
        $this->videos[] = $this->newVideo;
        $this->newVideo = ['url' => '', 'title' => '', 'description' => '', 'category_id' => ''];
    }
    public function removeVideo($index)
    {
        unset($this->videos[$index]);
        $this->videos = array_values($this->videos);
    }
    public function save()
    {
        try {
            if (!is_null($this->title) || !is_null($this->description)) {
                Course::where('id', $this->item['id'])->update([
                    'title' => $this->title,
                    'description' => $this->description
                ]);
            }

            $existingVideos = Video::where('course_id', $this->item['id'])->get();

            $existingVideosCollection = $existingVideos->keyBy('url');
            $newVideosCollection = collect($this->videos)->keyBy('url');

            $videosToDelete = $existingVideosCollection->keys()->diff($newVideosCollection->keys());
            Video::whereIn('url', values: $videosToDelete)->where('course_id', $this->item['id'])->delete();
            foreach ($this->videos as $video) {
                Video::updateOrCreate(
                    [
                        'url' => $video['url'],
                        'course_id' => $this->item['id'],
                    ],
                    [
                        'title' => $video['title'],
                        'description' => $video['description'],
                        'category_id' => $video['category_id'],
                        'user_id' => $this->item['user_id'],
                        'course_id' => $this->item['id'],
                    ]
                );
            }

            $this->dispatch('success');
            $this->closeModal();
        } catch (\Exception $th) {
            $this->dispatch('message', $th->getMessage());
        }
    }
}