<!-- Sidebar -->
<nav id="sidebar">
    <div class="p-4">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{ asset('backend') }}/images/logo.png);"></a>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My Courses</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('learn.maths') }}">Math</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Questions</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('questions.index') }}">Questions</a>
                    </li>
                    <li>
                        <a href="{{ route('options.index') }}">Options</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
<!-- /#sidebar-wrapper -->