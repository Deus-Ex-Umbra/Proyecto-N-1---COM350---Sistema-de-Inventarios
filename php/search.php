<?php
    include("connection.php");
?>
<div class="herramientas">
    <div class="filtros">
        <div class="buscador">
            <input type="text" placeholder="¿Que inventario desea buscar?">
            <i class="fa-solid fa-search">

            </i>
        </div>
        <div class="filtrador">
            <div class="boton">
                <p>Filtros</p>
            <i class="fa-solid fa-filter">
            </i>
            </div>
        </div>
    </div>
</div>

<script>
    const search = document.querySelector(".buscador input");
    const searchIcon = document.querySelector(".buscador i");
    searchIcon.addEventListener("click", () => {
        console.log(search.value);
    });
</script>