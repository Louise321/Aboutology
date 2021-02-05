<style>

    .alert {
        position: relative;
        padding: 0 10 10;
        margin-bottom: 1rem;
        border: 0 solid transparent;
        border-radius: .2rem
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb
    }

    /* .alert-dismissible {
        padding-right: 3.2125rem
    }

    .alert-dismissible .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: .95rem;
        color: inherit
    } */

    .close {
        float: right;
        font-size: 1.3125rem;
        font-weight: 600;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        opacity: .5;
        width: 20;
    }

    .close:hover {
        color: #000;
        text-decoration: none
    }

    .close:not(:disabled):not(.disabled):focus,
    .close:not(:disabled):not(.disabled):hover {
        opacity: .75
    }

    button.close {
        padding: 0;
        background-color: transparent;
        border: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none
    }

    a.close.disabled {
        pointer-events: none
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

@props(['errors'])

@if ($errors->any())

    <div {{ $attributes }}>

        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>{{ __('OOOOOOOO! Something went wrong.') }}</strong>
            </div>
        
            {{-- <div class="font-medium text-red-600">
                {{ __('Whoops! Something went wrong.') }}
            </div> --}}

            <ul style="padding: 10; margin-left:20;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    </div>
@endif
