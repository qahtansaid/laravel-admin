<footer id="footer" class="footer">
    <div class="copyright">
        {{-- @if(config('admin.show_environment'))
                            <strong>Env</strong>&nbsp;&nbsp; {!! config('app.env') !!}
                        @endif
                        <br> --}}
        <strong>Powered by <a href="https://github.com/z-song/laravel-admin" target="_blank">DATIN RSUD CENGKARENG</a></strong>
    </div>
    <div class="credits">
        @if(config('admin.show_version'))
        <strong>Version</strong>&nbsp;&nbsp; {!! \Encore\Admin\Admin::VERSION !!}
        @endif
    </div>
  </footer>