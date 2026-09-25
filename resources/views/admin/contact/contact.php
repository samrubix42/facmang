<?php

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Contact Inquiries - Admin Console')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filterStatus = 'all';

    public bool $showViewModal = false;

    public ?Contact $selectedContact = null;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedFilterStatus(): void
    {
        $this->resetPage();
    }

    public function viewDetails(int $id): void
    {
        $contact = Contact::findOrFail($id);
        if (! $contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        $this->selectedContact = $contact;
        $this->showViewModal = true;
    }

    public function closeViewModal(): void
    {
        $this->showViewModal = false;
        $this->selectedContact = null;
    }

    public function toggleRead(int $id): void
    {
        $contact = Contact::findOrFail($id);
        $contact->update([
            'is_read' => ! $contact->is_read,
        ]);

        $this->dispatch('toast-show', [
            'message' => 'Inquiry status updated.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->deletingId = null;
    }

    public function delete(): void
    {
        if ($this->deletingId) {
            $contact = Contact::find($this->deletingId);
            if ($contact) {
                $name = $contact->name;
                $contact->delete();
                $this->dispatch('toast-show', [
                    'message' => 'Contact inquiry from "'.$name.'" deleted.',
                    'type' => 'success',
                    'position' => 'top-right',
                ]);
            }
        }

        $this->cancelDelete();
    }

    /**
     * @return mixed
     */
    public function getContactsProperty()
    {
        return Contact::query()
            ->when($this->search !== '', function ($q) {
                $term = '%'.trim($this->search).'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('name', 'like', $term)
                        ->orWhere('email', 'like', $term)
                        ->orWhere('phone', 'like', $term)
                        ->orWhere('property_type', 'like', $term)
                        ->orWhere('message', 'like', $term);
                });
            })
            ->when($this->filterStatus === 'unread', fn ($q) => $q->where('is_read', false))
            ->when($this->filterStatus === 'read', fn ($q) => $q->where('is_read', true))
            ->latest('id')
            ->paginate(10);
    }
};
