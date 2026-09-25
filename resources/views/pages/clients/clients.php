<?php

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Our Clients & Corporate Partners - FacilityPro')] class extends Component
{
    /**
     * @return Collection<int, Client>
     */
    #[Computed]
    public function clients(): Collection
    {
        return Client::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }
};
