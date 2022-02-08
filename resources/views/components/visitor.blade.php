<span {{ $attributes->merge(['class'=>'text-muted']) }} >
    Total Unique Visitor: {{App\Models\Admin\VisitorCounter::visitors() }}
</span>
