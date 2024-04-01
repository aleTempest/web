/**
* Esta función toma como parámetros un array de elementos de un
* select y un elemento seleccionado. Compara cada elemento del array
* con el elemento seleccionado y escoende los elementos que no 
* coinciden. El resto se resetean.
*/

// TODO Ipmlementarla en tutorías/asesorías
function hideElements(elements, selectedValue) {
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].id !== selectedValue) {
      // esconder ele elemento
      elements[i].style.display = 'none';
    } else {
      // resetear el elemento
      elements[i].style.display = '';
    }
  }
}


