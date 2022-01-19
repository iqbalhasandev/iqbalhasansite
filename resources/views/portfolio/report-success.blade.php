<x-guest-layout>
    <x-box-card>
        <x-slot name="title">
            <br><br>
            <br><br>
            <div class="text-center text-capitalize" style="margin-top:15px ">
                <i class="fas fa-check-square" style="
                font-size: 60px;
            color: #32c720;
                "></i>
                <br><br>
                <h3>
                    Thank you very much for submitting your report.
                </h3>
                <p>Our team will fix this problem as soon as possible. <br>
                    Thank you so much for being with us for your valuable time.</p>
            </div>
        </x-slot>
        <div class="text-center">
            <a href="{{ back_url() }}" class="btn btn-info btn-rounded waves-effect waves-light">
                <i class="fas fa-reply"></i> Back
            </a>
        </div>
    </x-box-card>
</x-guest-layout>
