<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" required>
    <label>Jabatan:</label>
    <input type="text" name="position" required>
    <label>Gaji:</label>
    <input type="number" name="salary" required>
    <button type="submit">Simpan</button>
</form>
