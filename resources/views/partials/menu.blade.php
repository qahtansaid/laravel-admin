@if(Admin::user()->visible(\Illuminate\Support\Arr::get($item, 'roles', [])) && Admin::user()->can(\Illuminate\Support\Arr::get($item, 'permission')))
    @if(!isset($item['children']))
        <li class="nav-item">
            @if(url()->isValidUrl($item['uri']))
                <a class="nav-link collapsed" href="{{ $item['uri'] }}" target="_blank">
            @else
                 <a class="nav-link collapsed" href="{{ admin_url($item['uri']) }}">
            @endif
                <i class="fa {{$item['icon']}}"></i>
                @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                    <span>{{ __($titleTranslation) }}</span>
                @else
                    <span>{{ admin_trans($item['title']) }}</span>
                @endif
            </a>
        </li>
    @else
        <li class="nav-item">
              @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                  <a class="nav-link collapsed" data-bs-target="#{{ __($titleTranslation) }}-nav" data-bs-toggle="collapse" href="#">
              @else
                  <a class="nav-link collapsed" data-bs-target="#{{ admin_trans($item['title']) }}-nav" data-bs-toggle="collapse" href="#">
              @endif
              <i class="fa {{ $item['icon'] }}"></i>
              @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                  <span>{{ __($titleTranslation) }}</span>
              @else
                  <span>{{ admin_trans($item['title']) }}</span>
              @endif
              <i class="bi bi-chevron-down ms-auto"></i>
            </a>
                @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                    <ul id="{{ __($titleTranslation) }}-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @else
                    <ul id="{{ admin_trans($item['title']) }}-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @endif

                @foreach($item['children'] as $item)
                        @include('admin::partials.menu', $item)
                @endforeach
                </ul>
          </li>
    @endif
@endif