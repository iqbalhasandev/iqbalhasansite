<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                {{ date('Y') }}
                © {{ config('app.name') }}.
                <x-visitor class="text-end d-block" />
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://iqbalhasan.dev"
                        target="_blank">IQBAL
                        HASAN</a>
                </div>
            </div>
        </div>
    </div>
</footer>
