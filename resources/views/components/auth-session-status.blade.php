<style>
    .alert {
        position: relative;
        padding: 0 10 10;
        margin-bottom: 1rem;
        border: 0 solid transparent;
        border-radius: .2rem
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb
    }

    .alert-message {
        padding: .95rem;
        width: 100%;
        box-sizing: border-box
    }

    .alert-outline-coloured.alert-danger .alert-message {
        border-color: #dc3545
    }

    .alert-outline-coloured .alert-message,
    .alert-outline .alert-message {
        border-top-right-radius: .2rem;
        border-bottom-right-radius: .2rem;
        border-top-left-radius: .2rem;
        border-bottom-left-radius: .2rem;
        border: 1px solid #ced4da
    }

    .alert-outline-coloured .alert-message:not(:nth-child(2)),
    .alert-outline .alert-message:not(:nth-child(2)) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-left: 0
    }

</style>

@props(['status'])

@if ($status)

    <div {{ $attributes }}>
        <div class="alert alert-success alert-dismissible" role="alert">
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
            <div class="alert-message" style="text-align: center">
                {{ $status }}
            </div>
        </div>
    </div>
@endif
