<?php

namespace App\Livewire\Course\Videos;

use LivewireUI\Modal\ModalComponent;
use App\Models\Comment;
use App\Models\Progress;
use App\Models\Like;
use Auth;
class View extends ModalComponent
{
    public $item, $likes, $comment, $comments;
    public function render()
    {
        $this->likes = Like::where('video_id', $this->item['id'])->count();
        $this->comments = Comment::where('video_id', $this->item['id'])
            ->orderBy('created_at', 'desc')
            ->get();
        $this->progress();
        return view('livewire.course.videos.view', [
            'likes' => $this->likes,
            'comments' => $this->comment,
        ]);

    }
    public function mount($item)
    {
        $this->item = $item;
    }
    public function like()
    {
        try {
            $new = new Like();
            $new->video_id = $this->item['id'];
            $new->user_id = Auth::user()->id;
            $new->save();
            $this->dispatch('success');
        } catch (\Exception $th) {
            $this->dispatch('message', $th->getMessage());
        }
    }

    public function progress()
    {
        try {
            Progress::updateOrCreate(
                [
                    'video_id' => $this->item['id'], // Condiciones para buscar el registro
                    'user_id' => Auth::id(),
                ]
            );
        } catch (\Exception $th) {
            $this->dispatch('message', $th->getMessage());
        }
    }

    public function comm()
    {
        try {
            if (!is_null($this->comment)) {
                $new = new Comment;
                $new->comment = $this->comment;
                $new->date = now()->format('Y-m-d');
                $new->video_id = $this->item['id'];
                $new->course_id = $this->item['course_id'];
                $new->user_id = Auth::user()->id;
                $new->save();
                $this->dispatch('success');
                $this->comment = null;
            }
        } catch (\Exception $th) {
            $this->dispatch('message', $th->getMessage());
        }
    }
}