@foreach ($roles as $role)
<div class="checkbox">
    <label for="">
        <input name="roles[]" type="checkbox" value="{{ $role->name }}"
            {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
        {{ $role->name }}
        <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
    </label>
</div>
@endforeach
