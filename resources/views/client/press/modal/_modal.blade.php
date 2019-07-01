<div id="modal-youtube" class="press__modal">
    <div class="press__modal--content">
        <div class="press__close--container">
            <span onclick="closeModal()" class="press__close">&times;</span>
        </div>
        <div class="">
            <iframe width="560" height="315"
                id="iframe-youtube"
                src="https://www.youtube.com/embed/fM0UGjiJzKs"
                class="press__hide--element"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            <img
                id="image-content"
                class="press__hide--element"
                alt="">
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript">
        var modal = document.getElementById('modal-youtube');

        function openYoutubeModal(videoPath){
            var iframe = document.getElementById('iframe-youtube');
            iframe.src = videoPath;
            iframe.classList.remove("press__hide--element");

            modal.style.display = 'block';
        }

        function openImageModal(imagePath){
            var image = document.getElementById('image-content');
            image.src = imagePath;
            image.classList.remove("press__hide--element");

            modal.style.display = 'block';
        }

        function closeModal(){
            document.getElementById('image-content').classList.add("press__hide--element");
            document.getElementById('iframe-youtube').classList.add("press__hide--element");
            modal.style.display = 'none';
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
@endsection