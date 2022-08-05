<script src="{{ asset('js/iziToast.js') }}"></script>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            <script type="text/javascript">
                iziToast.error({
                    title: '!',
                    message: "{{ $error }}",
                    icon: '',
                    iconText: '',
                    iconColor: '',
                    iconUrl: null,
                    position: 'topRight', // bottomRight, bottomLeft, topRight,
                });
            </script>
        @endforeach
    </div>
@endif


@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        iziToast.success({
            title: 'OK',
            message: "{{ session('success') }}",
            icon: 'fa-check-circle',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight', // bottomRight, bottomLeft, topRight,
        });
    </script>
@endif

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
    <script>
        iziToast.success({
            title: 'OK',
            message: "{{ session('info') }}",
            icon: 'fa-check-circle',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight', // bottomRight, bottomLeft, topRight,
        });
    </script>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    <script>
        iziToast.success({
            title: 'OK',
            message: "{{ session('message') }}",
            icon: 'fa-check-circle',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight', // bottomRight, bottomLeft, topRight,
        });
    </script>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    <script>
        iziToast.error({
            title: 'Error',
            message: "{{ session('error') }}",
            icon: '',
            iconText: '',
            iconColor: '',
            iconUrl: null,
            position: 'topRight', // bottomRight, bottomLeft, topRight,
        });
    </script>
@endif
