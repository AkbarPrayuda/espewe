<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">SideBar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item w-100">
                <a href="{{ route('admin') }}"
                    class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                    Dashboard
                </a>
            </li>
            <li class="list-group-item w-100">
                <a href="{{ route('admin.jurusan') }}"
                    class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                    Jurusan
                </a>
            </li>
            <li class="list-group-item w-100">
                <a href="{{ route('admin.kelas') }}"
                    class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                    Kelas
                </a>
            </li>
        </ul>
    </div>
</div>
