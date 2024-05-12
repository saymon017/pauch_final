<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Reset Password')]
class ResetPasswordPage extends Component{

    public $token;
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token){
        $this->token = $token;
    }

    public function save(){
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function render(){
        return view('livewire.auth.reset-password-page');
    }
}
