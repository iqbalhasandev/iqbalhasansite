<span {{ $attributes->merge(['class'=>'text-muted']) }} >
    Visitor: {{App\Models\Admin\VisitorCounter::visitors() }}
</span>
