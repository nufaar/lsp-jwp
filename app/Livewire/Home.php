<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $search;
    public $perpage = 5;

    // send data to chart
    public function mount()
    {
        $this->dispatch('dataStudent', [
            Student::where('gender', 'Laki-laki')->count(),
            Student::where('gender', 'Perempuan')->count()
        ]);
    }

    // update page when search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // get students by search keyword
    public function getStudentsBySearch()
    {
        return Student::where('name', 'like', '%' . $this->search . '%')
            ->orderby('nim', 'desc')
            ->paginate($this->perpage);
    }

    public function render()
    {
        return view('livewire.home', [
            // student sort by nim desc
            'students' => $this->getStudentsBySearch(),
            'total' => Student::count(),
        ]);
    }
}
