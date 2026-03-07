<x-dynamic-component :component="auth()->user()->is_admin ? 'admin-layout' : 'app-layout'">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="p-4 mx-auto max-w-7xl md:p-6">
        <div x-data="{ pageName: `Profile` }">
            <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between lg:mb-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                {{ __('Profile') }}
                </h2>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6 mb-6">
            <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
                <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
                    <div class="flex flex-col items-center w-full gap-6 xl:flex-row">
                        <div class="w-20 h-20 flex items-center justify-center overflow-hidden border border-gray-200 rounded-full dark:border-gray-800 bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 text-3xl font-bold uppercase">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="order-3 xl:order-2">
                            <h4 class="mb-2 text-lg font-semibold text-center text-gray-800 dark:text-white/90 xl:text-left">
                                {{ auth()->user()->name }}
                            </h4>
                            <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">
                                <p class="text-sm text-gray-500 dark:text-gray-400 capitalize">
                                    {{ auth()->user()->is_admin ? 'Admin' : 'Student' }}
                                </p>
                                <div class="hidden h-3.5 w-px bg-gray-300 dark:bg-gray-700 xl:block"></div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
                <div class="max-w-3xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
                <div class="max-w-3xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-5 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
                <div class="max-w-3xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>
