@push('page_scripts')
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });
</script>
@endpush

<li>
    <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
        {{ __('Home') }}
        <i class="material-icons left">home</i>
    </a>
</li>
