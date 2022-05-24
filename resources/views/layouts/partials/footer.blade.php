<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> {{ config('settings.version') }}
    </div>
    <strong>Copyright &copy; {{ Carbon\Carbon::now()->format('Y') }} <a href="#">{{ config('settings.app_name') }}</a>.</strong>
    All rights reserved.
  </footer>
