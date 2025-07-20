<x-filament-widgets::widget>
    <x-filament::section>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Hostname --}}
            <div class="bg-white dark:bg-gray-950 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <h2
                            class="text-base font-semibold tracking-wide capitalize text-gray-800 dark:text-gray-100 leading-tight">
                            Hostname
                        </h2>
                    </div>
                </div>
                <div class="mt-4 text-xl text-gray-600 dark:text-gray-400">
                    {{ $hostname }}
                </div>
            </div>

            {{-- Uptime --}}
            <div class="bg-white dark:bg-gray-950 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <h2
                            class="text-base font-semibold tracking-wide capitalize text-gray-800 dark:text-gray-100 leading-tight">
                            Uptime
                        </h2>
                    </div>
                </div>
                <div class="mt-4 text-l text-gray-600 dark:text-gray-400">
                    {{ $uptime }}
                </div>
            </div>

            {{-- Total Cronjob --}}
            <div
                class="bg-white dark:bg-gray-950 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <h2
                            class="text-base font-semibold tracking-wide capitalize text-gray-800 dark:text-gray-100 leading-tight">
                            Cronjob
                        </h2>
                    </div>
                </div>
                <div class="mt-4 text-xl text-gray-600 dark:text-gray-400">
                    {{ $cronjobCount }}
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
