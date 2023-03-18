@csrf
<div class="form-group mb-4">

    <div class="form-group mb-4">
        <label>User</label>
        <select class="@error('user_id') is-invalid @enderror form-control" name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group mb-4">
        <label>Post</label>
        <select class="@error('post_id') is-invalid @enderror form-control" name="post_id">
            @foreach($posts as $post)
                <option value="{{ $post->id }}">{{ $post->title }}</option>
            @endforeach
        </select>
    </div>

    @error('post_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Comment</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Comment</span>
        </div>
        <textarea class="@error('comment') is-invalid @enderror form-control" name="comment" aria-label="With textarea">{{ old('comment', $comment->comment ?? '') }}</textarea>
    </div>

    @error('comment')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <label>Date</label>
    <input type="date" name="date" value="{{ old('date', $comment->date ?? '') }}" class="@error('date') is-invalid @enderror form-control mb-3">

    @error('date ')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>
