<div>
    <div class="max-w-4xl mx-auto mt-4">
        <div>
            <div>
                <div>
                    <h1 class="font-semibold text-lg text-center mb-4">Daftar Mahasiswa</h1>
                </div>
            </div>
            <div>
                @if (session()->has('status'))
                    <div role="alert" class="alert alert-success my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif
            </div>
            @if ($students->isNotEmpty())
                <div class="mb-3">
                    <a href="{{ route('admin.students.create') }}" class="btn btn-sm btn-outline btn-primary">Tambah</a>
                </div>
                <div class="flex justify-between mb-2">
                    <input wire:model.live.debounce='search' type="text" placeholder="Cari mahasiswa..."
                        class="input input-bordered w-full max-w-xs" />
                    <select wire:model.live.debounce='perpage' class="select select-bordered w-full max-w-20">
                        <option value="2">2</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Usia</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->nim }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>
                                        <a href="{{ route('admin.students.edit', $student) }}"
                                            class="btn btn-sm btn-outline btn-primary">Edit</a>
                                        <button wire:click='delete({{ $student }})' wire:confirm="Apa anda yakin?"
                                            class="btn btn-sm btn-outline">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4    ">
                    {{ $students->links() }}
                </div>
            @else
                <div role="alert" class="alert my-4 max-w-xl mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-info shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Belum ada data mahasiswa.</span>
                    <div>
                        <a href="{{ route('admin.students.create') }}"
                            class="btn btn-outline btn-sm btn-primary">Tambah</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
