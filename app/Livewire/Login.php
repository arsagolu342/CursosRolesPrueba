<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
use Auth;
class Login extends Component
{
    public $email, $password;
    public function render()
    {
        return view('livewire.login');
    }
    public function login()
    {
        try {

            $user = User::where('email', $this->email)->first();
            if ($user) {
                if (!Hash::check($this->password, $user->password)) {
                        $this->dispatch('message', 'Credenciales incorrectas');
                }else{
                    Auth::login($user);
                    if ($user->hasRole('admin')) {
                        return redirect()->route('courses');
                    } else {
                        return redirect()->route('dashboard');
                    }
                }
            } else {
                $this->dispatch('message', 'Usuario no encontrado');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}