function setDOMData(data) {
  //Obtener lista del DOM
  const mainList = document.getElementById("mainList");
  mainList.replaceChildren();
  data.forEach((book) => {
    //creamos el elemento en el html
    const listItem = document.createElement("li");
    //agregamos clase de CSS
    listItem.classList.add("list-item");
    //agregar el valor del elemento
    listItem.innerText = book;
    //agregamos el item de lista a la lista
    mainList.appendChild(listItem);
  });
}
