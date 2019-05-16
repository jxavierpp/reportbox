<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Panel de Administrador</h3>
    </div>

    <ul class="list-unstyled components">
        <li><a href="/adminpanel/profesores">Profesores</a></li>
        <li><a href="/adminpanel/reportes">Reportes</a></li>
        <li><a href="/adminpanel/encargados">Encargados</a></li>

        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categorias</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li><a href="/adminpanel/formulario/1" id="link1"></a></li>
                <li><a href="/adminpanel/formulario/2" id="link2"></a></li>
                <li><a href="/adminpanel/formulario/3" id="link3"></a></li>
                <li><a href="/adminpanel/formulario/4" id="link4"></a></li>
                <li><a href="/adminpanel/formulario/5" id="link5"></a></li>
                <li><a href="/adminpanel/formulario/6" id="link6"></a></li>
                <li><a href="/adminpanel/formulario/7" id="link7"></a></li>
                <li><a href="/adminpanel/formulario/8" id="link8"></a></li>
                <li><a href="/adminpanel/formulario/9" id="link9"></a></li>
                <li><a href="/adminpanel/formulario/10" id="link10"></a></li>
            </ul>
        </li>
    </ul>
</nav>

<script>
    fetch('http://127.0.0.1:8000/api/categorias')
    .then(response => response.json())
    .then(data => {
        console.log(data) // Prints result from `response.json()` in getRequest
        document.getElementById("link1").innerHTML = data[0].name;
        document.getElementById("link2").innerHTML = data[1].name;
        document.getElementById("link3").innerHTML = data[2].name;
        document.getElementById("link4").innerHTML = data[3].name;
        document.getElementById("link5").innerHTML = data[4].name;
        document.getElementById("link6").innerHTML = data[5].name;
        document.getElementById("link7").innerHTML = data[6].name;
        document.getElementById("link8").innerHTML = data[7].name;
        document.getElementById("link9").innerHTML = data[8].name;
        document.getElementById("link10").innerHTML = data[9].name;
    })
    .catch(error => {})

</script>