<?php

namespace App\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate('required|unique:students,nim')]
    public $nim;
    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $address;
    #[Validate('required')]
    public $birth_date;
    #[Validate('required')]
    public $gender = '';
    #[Validate('required')]
    public $age;

    // calculate age when date input is changed
    public function updatedBirthDate($value)
    {
        $this->age = round((time() - strtotime($value)) / 31556926); // 31556926 = 1 year in seconds
    }

    // store new student data
    public function store()
    {
        // validate inputed data
        $this->validate();

        // create new student data
        Student::create($this->all());

        session()->flash('status', 'Data mahasiswa berhasil ditambahkan!');

        return redirect()->route('admin.students.index');
    }


    public function render()
    {
        return view('livewire.admin.student.create');
    }
}
