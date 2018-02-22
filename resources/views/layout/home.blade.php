<!--- inclui o header -->
@include('layout._includes.headerHome')

<!--- inclui o conteúdo -->
@yield('breadcrumb')

<!--- inclui o conteúdo -->
@yield('conteudo')

<!--- inclui o footer -->
@include('layout._includes.footer')

