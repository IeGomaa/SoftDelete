@csrf
<div class="form-group mb-4">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control">
    <label>Email</label>
    <input type="text" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control">
    <label>Password</label>
    <input type="text" name="password" value="{{ old('password', $user->password ?? '') }}" class="form-control">
</div>
