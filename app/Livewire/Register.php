<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use App\Models\User;
use Auth;
class Register extends Component
{
    public $name, $email, $password, $type;
    public function render()
    {
        return view('livewire.register');
    }

    public function register()
    {
        // Validación de los datos del formulario (asegúrate de definir las reglas en el método validate)
        $this->validate();

        try {
            // Crear el nuevo usuario
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password), // Usar Hash::make para mayor seguridad
                'type' => $this->type,
            ]);

            // Asignar el rol correspondiente
            if ($this->type === '0') {
                $user->assignRole('admin');
            } else {
                $user->assignRole('user');
            }

            // Loguear al usuario automáticamente después de la creación
            Auth::login($user);

            // Redirigir según el rol del usuario
            if ($user->hasRole('admin')) {
                return redirect()->route('courses'); // Redirigir a la página de cursos si es admin
            } else {
                return redirect()->route('dashboard'); // Redirigir al dashboard si es usuario
            }

        } catch (\Exception $th) { 
             $this->dispatch('message', $th->getMessage());
        }
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required',
        ];
    }
}