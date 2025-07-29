<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mt-4">
        <div class="flex flex-col gap-4">
            @livewire(\App\Filament\Widgets\systemwidget::class)
        </div>
        @livewire(\App\Filament\Widgets\DiskUsage::class)
        @livewire(\App\Filament\Widgets\MemUsage::class)
        @livewire(\App\Filament\Widgets\ServerLoadChart::class)
        <form action="POST">
            <a href="{{ route('sync.cron') }}">Sync Cronjob</a>
        </form>
    </div>
</x-filament::page>
