<div class="float-right p-4 font-lexend">
    <x-tabler-square-x class="inline-block md:hidden cursor-pointer mr-4" @click="open = ! open" />
</div>
<!-- Logo -->
<div class="shrink-0 flex items-center px-4 py-2">
    <a href="{{ route('dashboard') }}">
        <x-jet-application-mark class="block h-6 w-auto" />
    </a>
</div>

<div class="pt-2 pb-3 space-y-1">
    <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <x-tabler-dashboard class="inline text-sm mr-2 -mt-1" />
        {{ __('Dashboard') }}
    </x-jet-responsive-nav-link>
    @can('View Company')
    <x-jet-responsive-nav-link href="{{ route('company.index') }}" :active="request()->routeIs('company.index')">
        <x-tabler-layers-linked class="inline text-sm mr-2 -mt-1" />
        {{ __('Companies') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('View Item')
    <x-jet-responsive-nav-link href="{{ route('item.index') }}" :active="request()->routeIs('item.index')">
        <x-tabler-box class="inline text-sm mr-2 -mt-1" />
        {{ __('Items') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('View Purchase Order')
    <x-jet-responsive-nav-link href="{{ route('document.index',['type'=>'purchase-order']) }}" :active="request()->is('document/purchase-order')">
        <x-tabler-file-invoice class="inline text-sm mr-2 -mt-1" />
        {{ __('Purchase Order') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('View Sales Quotation')
    <x-jet-responsive-nav-link href="{{ route('document.index',['type'=>'sales-quotation']) }}" :active="request()->is('document/sales-quotation')">
        <x-tabler-file-invoice class="inline text-sm mr-2 -mt-1" />
        {{ __('Sales Quotation') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('View Sales Order')
    <x-jet-responsive-nav-link href="{{ route('document.index',['type'=>'sales-order']) }}" :active="request()->is('document/sales-order')">
        <x-tabler-file-invoice class="inline text-sm mr-2 -mt-1" />
        {{ __('Sales Order') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('View Customer Invoice')
    <x-jet-responsive-nav-link href="{{ route('document.index',['type'=>'customer-invoice']) }}" :active="request()->is('document/customer-invoice')">
        <x-tabler-file-invoice class="inline text-sm mr-2 -mt-1" />
        {{ __('Customer Invoice') }}
    </x-jet-responsive-nav-link>
    @endcan
    @can('View Manifest')
    <!-- <x-jet-responsive-nav-link href="{{ route('manifest.index') }}" :active="request()->routeIs('manifest.index')">
        {{ __('Manifests') }}
    </x-jet-responsive-nav-link> -->
    @endcan
    @can('View User')
    <x-jet-responsive-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
        <x-tabler-user class="inline text-sm mr-2 -mt-1" />
        {{ __('Users') }}
    </x-jet-responsive-nav-link>
    @endcan

    @can('View Role')
    <x-jet-responsive-nav-link href="{{ route('role.index') }}" :active="request()->routeIs('role.index')">
        <x-tabler-user-check class="inline text-sm mr-2 -mt-1" />
        {{ __('Roles') }}
    </x-jet-responsive-nav-link>
    @endcan
</div>

<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">

    <div class="mt-3 space-y-1">
        <!-- Account Management -->
        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
            <x-tabler-user-circle class="inline text-sm mr-2 -mt-1" />
            {{ __('Profile') }}
        </x-jet-responsive-nav-link>

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                {{ __('API Tokens') }}
            </x-jet-responsive-nav-link>
        @endif

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                        @click.prevent="$root.submit();">
                <x-tabler-logout class="inline text-sm mr-2 -mt-1" />
                {{ __('Log Out') }}
            </x-jet-responsive-nav-link>
        </form>

        <!-- Team Management -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
            <div class="border-t border-gray-200"></div>

            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Team') }}
            </div>

            <!-- Team Settings -->
            <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                {{ __('Team Settings') }}
            </x-jet-responsive-nav-link>

            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-jet-responsive-nav-link>
            @endcan

            <div class="border-t border-gray-200"></div>

            <!-- Team Switcher -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Switch Teams') }}
            </div>

            @foreach (Auth::user()->allTeams() as $team)
                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
            @endforeach
        @endif
    </div>
</div>
