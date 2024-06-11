<?php

use Livewire\Volt\Component;

new class extends Component
{
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date']
        ]);

        auth()->user()->notes()->create([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => false,

        ]);

        redirect(route('notes'));
    }
};
?>

<div>
    <form wire:submit='submit'>
        <x-input wire:model="noteTitle" label="Title" class="space-y-4" />
        <x-textarea wire:model="noteBody" label="Body" />
        <x-input icon="user" wire:model="noteRecipient" label="Recipient" />
        <x-input icon="calendar" wire:model="noteSendDate" label="Date" class="space-y-4" />
        <div class="pt-4">
            <x-button type="submit" primary right-icon="calendar" spinner>Schedule Note</x-button>
        </div>

    </form>
    <div class="text-danger">
  <x-errors />
</div>
</div>