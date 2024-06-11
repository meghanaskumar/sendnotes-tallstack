<?php
use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Chat\Index;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('notes', 'notes.index')
    ->middleware(['auth'])
    ->name('notes');

Route::view('notes/create', 'notes.create')
    ->middleware(['auth'])
    ->name('notes.create');

Route::view('notes/view', 'notes.view')
    ->middleware(['auth'])
    ->name('notes.view');

Volt::route('note/{note}edit', 'notes.edit-note')
    ->middleware(['auth'])
    ->name('notes.edit');

    Route::get('notes/{note}', function(Note $note){
        if(! $note->is_published){
            abort(404);
        }
        $user = $note->user;
        return view ('notes.view', ['note' => $note, 'user' => $user]);
        
    })->name('notes.view');

Route::get('/chat',Index::class)->name('chat.index');


require __DIR__ . '/auth.php';
