@extends('layouts.admin')

@section('content')

<div class="main-content">

    <div class="admin-topbar">
        <h2>📸 Church Gallery</h2>

        <a href="/gallery/create" class="btn">
            ➕ Upload Image
        </a>
    </div>

    <div class="gallery-grid">

        @forelse($galleries as $gallery)

        <div class="gallery-item">

        <img src="{{ asset('storage/'.$gallery->image) }}"
     onclick="openImage(this.src)">

            <form action="/gallery/{{ $gallery->id }}" method="POST">

                @csrf
                @method('DELETE')

                <button class="delete-image"
                    onclick="return confirm('Delete this image?')">

                    ✖

                </button>

            </form>

        </div>

        @empty

        <p>No images uploaded.</p>

        @endforelse

    </div>

</div>
<div id="lightbox"
     style="display:none;
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,.9);
            z-index:9999;
            justify-content:center;
            align-items:center;">

    <span onclick="closeImage()"
          style="position:absolute;
                 top:20px;
                 right:35px;
                 color:white;
                 font-size:40px;
                 cursor:pointer;">
        &times;
    </span>

    <img id="lightbox-img"
         style="max-width:90%;
                max-height:90%;
                border-radius:10px;">
</div>

<script>
function openImage(src){
    document.getElementById('lightbox').style.display='flex';
    document.getElementById('lightbox-img').src=src;
}

function closeImage(){
    document.getElementById('lightbox').style.display='none';
}
</script>
@endsection