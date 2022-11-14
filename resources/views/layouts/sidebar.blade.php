<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>@lang('messages.Dashboard')</span>
            </a>
        </li><!-- End Dashboard Nav -->


      @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'admin')

        <li class="nav-heading">@lang('messages.User')</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('user.show')}}">
                <i class="bi bi-person"></i>
                <span>@lang('messages.User')</span>
            </a>
        </li>
        <li class="nav-heading">@lang('messages.Category')</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('category.show')}}">
                <i class="bi bi-person"></i>
                <span>@lang('messages.Category')</span>
            </a>
        </li>
        @endif

        <li class="nav-heading">@lang('messages.Account')</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('account/show')}}">
                <i class="bi bi-person"></i>
                <span>@lang('messages.Account')</span>
            </a>
        </li>
        <li class="nav-heading">@lang('messages.Income')</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('income/show')}}">
                <i class="bi bi-person"></i>
                <span>@lang('messages.Income')</span>
            </a>
        </li>
        <li class="nav-heading">@lang('messages.Expenses')</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('expenses/show')}}">
                <i class="bi bi-person"></i>
                <span>@lang('messages.Expenses')</span>
            </a>
        </li>
        <li class="nav-heading">@lang('messages.Transfer')</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('transfer/show')}}">
                <i class="bi bi-person"></i>
                <span>@lang('messages.Transfer')</span>
            </a>
        </li>
        <li class="nav-heading">@lang('messages.Report')</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-person"></i>
                <span>@lang('messages.Report')</span>
            </a>
        </li>
    </ul>

</aside>


