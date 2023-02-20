async function getData(pag) {
  const response = await axios.get("/getDatos.php", { params: { pag: pag } });
  const data = response.data;
  return Object.values(data);

}

