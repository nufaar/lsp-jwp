<div>
    <div class="max-w-2xl mx-auto my-4 border rounded-md shadow-md p-6">
        <div>
            <a href="{{ route('admin.students.index') }}" class="btn btn-sm btn-outline btn-primary">Kembali</a>
        </div>
        <div>
            <h1 class="font-semibold text-center text-lg">Tambah Mahasiswa</h1>
        </div>

        <div>
            <form wire:submit='store'>
                <div class="space-y-3">
                    <div>
                        <label for="name" class="label">Nama</label>
                        <input wire:model='name' type="text" placeholder="Masukan nama"
                            class="input input-bordered w-full" />
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <label for="nim" class="label">NIM</label>
                            <input wire:model='nim' type="text" placeholder="Masukan NIM"
                                class="input input-bordered w-full" />
                            @error('nim')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="name" class="label">Jenis Kelamin</label>
                            <select wire:model='gender' class="select select-bordered w-full max-w-xs">
                                <option disabled value="">Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <label for="birth_date" class="label">Tanggal Lahir</label>
                            <input wire:model.blur='birth_date' type="date" class="input input-bordered w-full" />
                            @error('birth_date')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="age" class="label">Usia</label>
                            <input wire:model='age' type="number" class="input input-bordered w-full"
                                placeholder="Usia" />
                            @error('age')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="flex-1">
                            <label for="address" class="label">Alamat</label>
                            <textarea wire:model='address' class="textarea textarea-bordered w-full" placeholder="Alamat"></textarea>
                            @error('address')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline btn-primary w-full">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
