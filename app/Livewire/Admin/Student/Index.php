<?php

namespace App\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $perpage = 5;

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

    // delete student
    public function delete(Student $student)
    {
        $student->delete();
    }

    public function render()
    {
        return view('livewire.admin.student.index', [
            // student sort by nim desc
            'students' => $this->getStudentsBySearch(),
        ]);
    }
}
