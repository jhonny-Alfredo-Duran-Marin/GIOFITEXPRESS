@php($oldPerms = old('permissions', $selected ?? []))

<div class="form-group">
  <label>Nombre del rol</label>
  <input name="name" value="{{ old('name', $role->name ?? '') }}" class="form-control" required>
  @error('name') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<hr><h5>Permisos</h5>

@foreach($grouped as $group => $perms)
  <div class="mb-2 p-2 border rounded">
    <div class="d-flex justify-content-between align-items-center">
      <strong class="text-uppercase">{{ $group ?: 'otros' }}</strong>
      <label class="mb-0">
        <input type="checkbox" class="js-check-group" data-group="{{ $group }}"> Marcar todo
      </label>
    </div>
    <div class="row mt-2">
      @foreach($perms as $p)
        <div class="col-md-4">
          <div class="form-check">
            <input class="form-check-input js-perm-{{ $group }}" type="checkbox" name="permissions[]"
              value="{{ $p->name }}" id="perm_{{ $p->id }}"
              {{ in_array($p->name,$oldPerms) ? 'checked' : '' }}>
            <label class="form-check-label" for="perm_{{ $p->id }}">{{ $p->name }}</label>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endforeach

<div class="mt-3">
  <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
  <button class="btn btn-primary">Guardar</button>
</div>

@push('js')
<script>
document.querySelectorAll('.js-check-group').forEach(cb => {
  cb.addEventListener('change', e => {
    const group = e.target.dataset.group || '';
    document.querySelectorAll('.js-perm-' + group).forEach(p => p.checked = e.target.checked);
  });
});
</script>
@endpush
