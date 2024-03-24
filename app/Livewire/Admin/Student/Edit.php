<?php

namespace App\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public Student $student;

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

    public function mount()
    {
        $this->nim = $this->student->nim;
        $this->name = $this->student->name;
        $this->address = $this->student->address;
        $this->birth_date = $this->student->birth_date;
        $this->gender = $this->student->gender;
        $this->age = $this->student->age;
    }

    // calculate age when date input is changed
    public function updatedBirthDate($value)
    {
        $this->age = round((time() - strtotime($value)) / 31556926);
    }

    // store new student data
    public function edit()
    {
        $this->validate();

        $this->student->update($this->except('student'));

        session()->flash('status', 'Data mahasiswa berhasil diupdate!');

        return redirect()->route('admin.students.index');
    }

    public function render()
    {
        return view('livewire.admin.student.edit');
    }
}
