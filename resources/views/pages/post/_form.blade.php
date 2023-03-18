@csrf
<div class="form-group mb-4">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="@error('title') is-invalid @enderror form-control mb-3">

    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <label>Author</label>
    <input type="text" name="author" value="{{ old('author', $post->author ?? '') }}" class="@error('author') is-invalid @enderror form-control mb-3">

    @error('author')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Content</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Content</span>
        </div>
        <textarea class="@error('body') is-invalid @enderror form-control" name="body" aria-label="With textarea">{{ old('body', $post->content ?? '') }}</textarea>
    </div>

    @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="row layout-top-spacing">

        <div id="fuSingleFile" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>
                            Post Image
                            <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a>
                        </label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" name="image" class="@error('image') is-invalid @enderror custom-file-container__custom-file__custom-file-input" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label>Date</label>
    <input type="date" name="date" value="{{ old('date', $post->date ?? '') }}" class="@error('date') is-invalid @enderror form-control mb-3">

    @error('date ')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>
