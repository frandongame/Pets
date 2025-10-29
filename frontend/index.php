<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Mascotas</title>
</head>
<body>
    <h1>🐾 Gestión de Mascotas</h1>
    <div id="loading">Cargando mascotas...</div>
    <div id="error" style="display: none; color: red;"></div>
    <div id="petList"></div>

    <script>
        const loadingDiv = document.getElementById('loading');
        const errorDiv = document.getElementById('error');
        const petList = document.getElementById('petList');

        function getAnimalEmoji(category) {
            return category.toLowerCase().includes('perro') ? '🐕' : '🐱';
        }

        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('es-ES', options);
        }

        function getCategoryClass(category) {
            return category.toLowerCase().includes('perro') ? 'category-perro' : 'category-gato';
        }

        fetch('http://localhost:8080/pet/List')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(pets => {
                loadingDiv.style.display = 'none';
                if (pets.length === 0) {
                    errorDiv.textContent = 'No hay mascotas registradas.';
                    errorDiv.style.display = 'block';
                    return;
                }

                pets.forEach(pet => {
                    const div = document.createElement('div');
                    div.style.marginBottom = '20px';
                    div.innerHTML = `
                        <div>
                            ${getAnimalEmoji(pet.category)} ${pet.name} | Chip: ${pet.chip} | Nacimiento: ${formatDate(pet.born)} | Categoría: ${pet.category}
                        </div>
                        <hr>
                    `;
                    petList.appendChild(div);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                loadingDiv.style.display = 'none';
                errorDiv.textContent = 'Error al cargar las mascotas: ' + error.message;
                errorDiv.style.display = 'block';
            });
    </script>

</body>
</html>